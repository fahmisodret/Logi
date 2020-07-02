<?php

namespace App\Http\Requests\Article;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Input;

class ArticleCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return Auth::user()->hasRole('editor');
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:articles,title',
            'slug' => 'required|unique:articles,slug',
            'author_id' => 'required',
            'content' => 'required',
            'meta_title' => 'sometimes|max:60',
            'meta_description' => 'sometimes|max:160',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    // public function messages()
    // {
    //     return [
    //         'name' => 'Name is required!',
    //         'title' => 'Judul is required!',
    //         // 'image.required' => 'Image is required!', 
    //         'image.file' => 'Image is not file!', 
    //         'image.max' => 'Image max is 3mb!', 
    //         'image.mimes' => 'Image type valid is "jpeg,png,jpg,gif,svg"!', 
    //         'fb' => 'Facebook is required!',
    //         'twitter' => 'Twitter is required!',
    //         'in' => 'LinkedIn is required!',
    //     ];
    // }

    public function getValidRequest()
    {
        return [
            'author_id' => $this->input('author_id'),
            'parent_id' => $this->input('parent_id'),
            'title' => $this->input('title'),
            'slug' => $this->input('slug'),
            'subtitle' => $this->input('subtitle'),
            'content' => $this->input('content'),
            'html_content' => $this->input('html_content'),
            'article_image' => $this->input('article_image'),
            'meta_title' => $this->input('meta_title'),
            'meta_keywords' => $this->input('meta_keywords'),
            'meta_description' => $this->input('meta_description'),
            'is_published' => $this->input('is_published') ?? false,
            'published_at' => $this->input('published_at'),
        ];
    }

}
