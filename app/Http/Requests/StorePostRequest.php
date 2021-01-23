<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255', 'unique:posts'],
            'body' => ['required', 'min:5'],
            'slug' => ['required'],
            'thumbnail' => ['nullable','file']
        ];
    }

    public function store()
    {
        $validated = $this->validated();
        $thumbnail_path = $this->storeThumbnail();
        $validated['user_id'] = Auth::id();

        if ($thumbnail_path !== false) {
            $validated['thumbnail_path'] = $thumbnail_path;
            unset($validated['thumbnail']);
        }

        $post = Post::create($validated);
        $post->tags()->attach(request('tags'));

        return $post;
    }

    private function storeThumbnail()
    {
        if (request('thumbnail')) {
            return request()->file('thumbnail')->store('thumbnails');
        }
        return false;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
    }
}
