<?php

namespace App\Http\Requests\Category;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return Auth::user()->hasRole('admin');
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
            'title' => ['required', Rule::unique('categories', 'title')->ignore($this->title, 'title')],
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($this->slug, 'slug')],
            'meta_title' => 'sometimes|max:60',
        ];
    }

    public function getValidRequest()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
        ];
    }

}
