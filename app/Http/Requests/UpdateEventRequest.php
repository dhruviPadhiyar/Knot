<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'name' => ['sometimes','string'],
            'description'=> ['string'],
            'start' => ['sometimes'],
            'end' => ['sometimes'],
            'category'=> ['sometimes'],
            'status'=> ['sometimes'],
            'host' => ['sometimes'],
            'venue'=> ['sometimes'],
            'thumbnail'=>['sometimes'],

        ];
    }
}
