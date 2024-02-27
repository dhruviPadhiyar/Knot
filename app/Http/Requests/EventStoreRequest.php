<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required',
            'description' => 'string|nullable',
            'start_date'=> 'required',
            'end_date'=> 'required|after:start_date',
            'thumbnail'=> 'required',
            'category_id' => 'required',
            'host_id' => 'required',
            'venue' => 'required',
            'status' => 'required'
        ];
    }
}
