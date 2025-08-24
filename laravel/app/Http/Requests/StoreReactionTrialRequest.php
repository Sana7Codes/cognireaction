<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReactionTrialRequest extends FormRequest
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
            'stimulus_ms'=>['required','integer','min:0'],
            'response_ms'=>['required','integer','gte:stimulus_ms'],
            'latency_ms'=>['nullable','integer','min:0'],
            'correct'=>['required','boolean'],
            'meta'=>['nullable','array'],
        ];
    }

    public function bodyParameters(): array
{
    return [
        'stimulus_ms' => ['description' => 'When stimulus was shown (ms).', 'example' => 1000],
        'response_ms' => ['description' => 'When user responded (ms).', 'example' => 1140],
        'correct'     => ['description' => 'Whether the response was correct.', 'example' => true],
        'meta'        => ['description' => 'Optional trial metadata.', 'example' => ['block' => 1]],
    ];
}
}
