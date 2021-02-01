<?php

namespace App\Models\Traits;

use App\Models\Role;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasProfilePhoto
{
    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo_path
                    ? Storage::disk('public')->url($this->profile_photo_path)
                    : $this->defaultProfilePhotoUrl();
    }

    public function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4FF';
    }

    public function updateProfilePhoto(UploadedFile $photo)
    {
        tap($this->profile_photo_path, function($previous) use ($photo) {

            $this->forceFill([
                'profile_photo_path' => $photo->storePublicly('profile-photos')
            ])->save();

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });
    }

    public function deleteProfilePhoto()
    {
        Storage::disk('public')->delete($this->profile_photo_path);

        $this->forceFill([
            'profile_photo_path' => null
        ])->save();
    }
}