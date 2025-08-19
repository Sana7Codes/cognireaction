<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemoryTrialRequest extends FormRequest
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
            'trial_number'=>['required','integer','min:1'],
            'items_count'=>['required','integer','min:1'],
            'correct_count'=>['required','integer','min:0','lte:items_count'],
            'accuracy'=>['required','numeric','between:0,1'],
            'meta'=>['nullable','array'],
        ];
    }
}
