<?php

namespace App\Http\Requests\Admin\Department;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class DepartmentUpdateRequest extends FormRequest
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
       $id = $this->route('college');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:departments,name,'.$id],
            'campus_id' => ['required', 'exists:campuses,id']
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'College name is required.',
            'name.string' => 'College name must be a valid string.',
            'name.max' => 'College name cannot exceed 255 characters.',
            'name.unique' => 'This college name is already taken.',
            'campus_id.required' => 'Campus selection is required.',
            'campus_id.exists' => 'Selected campus does not exist.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @return void
     *
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => 422,
            'errors' => $validator->errors()->toArray(),
        ], 422);

        throw new ValidationException($validator, $response);
    }
}
