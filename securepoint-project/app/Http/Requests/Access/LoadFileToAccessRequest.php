<?php

namespace App\Http\Requests\Access;

use Illuminate\Foundation\Http\FormRequest;

class LoadFileToAccessRequest extends FormRequest
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
            'file_id' => ['string'],
            'file_name' => ['string'],
            'original_name' => ['string'],
            'file_path' => ['string'],
        ];
    }
}
