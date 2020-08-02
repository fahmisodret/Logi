<?php

namespace App\Http\Requests\Progres;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Input;
use Str;

class ProgresUpdateRequest extends FormRequest
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
            // 'project_id' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
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
            // 'project_id' => 'Project is required!',
            'title' => 'title is required!',
            'subtitle' => 'subtitle is required!',
            'keterangan' => 'keterangan is required!',
        ];
    }

    public function getValidRequest()
    {
        return [
            'project_id' => $this->input('project_id'),
            'is_progres' => 1,
            'title' => $this->input('title'),
            'slug' => Str::slug($this->input('title')),
            'subtitle' => $this->input('subtitle'),
            'image' =>$this->file('image'),
            'keterangan' => $this->input('keterangan'),
        ];
    }
}
