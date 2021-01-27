<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
        $post = Post::find($this->route('post'))->first();
        return [
            'title' => ['required', 'max:255', Rule::unique('posts')->ignore($post)],
            'body' => ['required', 'min:5'],
            'slug' => ['required'],
            'thumbnail' => ['nullable','file']
        ];
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

    public function update(Post $post)
    {
        $attributes = $this->validated();

        if ($this->has('thumbnail') && $post->hasThumbnail() ) {
            Storage::delete($post->thumbnail_path);
        }
        if ($this->has('thumbnail')) {
            $attributes['thumbnail_path'] = request()->file('thumbnail')->store('thumbnails');
            unset($attributes['thumbnail']);
        }

        $post->tags()->sync(request('tags'));

        return $post->update($attributes);
    }
}
