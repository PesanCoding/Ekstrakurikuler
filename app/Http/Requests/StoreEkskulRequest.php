<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEkskulRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_ekskul' => 'required|unique:ekskuls,nama_ekskul,' . $this->ekskul,
            'deskripsi' => 'required',
            'gambar' => 'required',
            'penanggung_jawab' => 'required',
            'kuota' => 'required'
        ];
    }
}
