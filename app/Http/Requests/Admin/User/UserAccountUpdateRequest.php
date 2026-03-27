<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator; // make sure this is at the top
use Illuminate\Validation\ValidationException;

class UserAccountUpdateRequest extends FormRequest
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
            'name'       => 'required|string|max:255',
            // 'email'      => 'required|email|unique:users,email,' . $id,
             'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->id),
            ],
            'role'       => 'required|array',
            'phone'      => 'required|string|max:20',
            'address'    => 'required|string|max:255',
            'campus_id'  => 'required|exists:campuses,id',
            'department_id' => 'nullable|exists:departments,id',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&).',
            'password.min' => 'The password must be at least 8 characters.',
            'password.max' => 'The password may not be greater than 20 characters.',
        ];
    }
     /**
     * Override failed validation to return custom response.
     *
     * @param Validator $validator
     * @throws ValidationException
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
