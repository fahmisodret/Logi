<?php

namespace App\Http\Requests\Fasilitas;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Input;

class FasilitasCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'project_id' => 'required',
            'name' => 'required|unique:fasilitas,name',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:3000', // max 3MB,
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
            'project_id' => 'Project is required!',
            'name' => 'Name is required!',
            'image.required' => 'Image is required!', 
            'image.file' => 'Image is not file!', 
            'image.max' => 'Image max is 3mb!', 
            'image.mimes' => 'Image type valid is "jpeg,png,jpg,gif,svg"!', 
        ];
    }

    public function getValidRequest()
    {
        return [
            'project_id' => $this->input('project_id'),
            'name' => $this->input('name'),
            'image' =>$this->file('image'),
            'keterangan' => $this->input('keterangan'),
        ];
    }

}
