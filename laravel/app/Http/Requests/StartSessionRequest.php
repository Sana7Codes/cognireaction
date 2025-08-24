<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StartSessionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id'=>['nullable','exists:users,id'],
            'label'=>['nullable','string','max:120'],
            'meta'=>['nullable','array'],
        ];
    }

    public function bodyParameters(): array
{
    return [
        'user_id' => ['description' => 'ID of the user owning the session.', 'example' => 1],
        'label'   => ['description' => 'Label for this session.', 'example' => 'baseline'],
        'meta'    => ['description' => 'Optional metadata.', 'example' => ['device' => 'mac']],
    ];
}
}



