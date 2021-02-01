<?php

namespace App\Models;

use App\Models\Traits\HasEditableBody;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, HasEditableBody;

    protected $guarded = [];

    public function hasThumbnail()
    {
        return $this->thumbnail_path !== null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($id)
    {
        return $this->tags->pluck('id')->contains($id);
    }

}
