<?php

namespace App\Http\Requests\Admin\Campus;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
class CampusStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:campuses,name'],
        ];
    }

     /**
     * Custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Campus name is required.',
            'name.string'   => 'Campus name must be a valid string.',
            'name.max'      => 'Campus name cannot exceed 255 characters.',
            'name.unique'   => 'This campus name is already taken.',
        ];
    }



    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => 422,
            'error' => $validator->errors()->toArray()
        ]);

        throw new ValidationException($validator, $response);
    }
}
