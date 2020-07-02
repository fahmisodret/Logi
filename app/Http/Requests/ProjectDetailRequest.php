<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectDetailRequest extends FormRequest
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
            'title' => 'required',
            // 'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:3000', // max 3MB,
            'keterangan' => 'required',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Judul is required!',
            // 'image.required' => 'Image is required!', 
            // 'image.file' => 'Image is not file!', 
            // 'image.max' => 'Image max is 3mb!', 
            // 'image.mimes' => 'Image type valid is "jpeg,png,jpg,gif,svg"!', 
            'keterangan.required' => 'Keterangan is required!',
        ];
    }
}
