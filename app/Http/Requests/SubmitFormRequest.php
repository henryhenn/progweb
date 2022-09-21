<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => 'required|max:20',
            'kelas' => 'required|max:20',
            'jurusan' => 'required|min:3|max:50',
            'handphone' => 'required|max:13',
            'alamat' => 'required|max:255',
            'hobi' => 'required',
            'citacita' => 'required|max:50',
            'bahasa' => 'required|max:30',
        ];
    }
}
