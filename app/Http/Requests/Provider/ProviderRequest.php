<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class ProviderRequest extends FormRequest
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
            "name" => "required|string|max:255",
            "email" => "nullable|email|max:255|unique:providers,email," . $this->provider?->id,
            "address" => "nullable|string|max:255",
            "phone" => "nullable|string|max:20",
            "description" => "nullable|string|max:500",
        ];
    }
}
