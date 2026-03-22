<?php

namespace App\Http\Requests\Admin\Research;

use App\Models\Campus;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ResearchUpdateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'adviser' => 'required|string|max:255',
            'campus_id' => ['required', 'exists:campuses,id'],
             'department_id' => ['nullable', 'exists:departments,id'],
            // Department required unless campus is Graduate Studies
             // Department required only if campus is NOT Graduate Studies

            'course' => 'required|string|max:255',
            'major' => 'nullable|string|max:255',
            'academic_year' => 'required|string|max:255',
            'publication_status' => 'required|in:published,unpublished',
            'publication' => 'required|string|max:255',
            'description' => 'required|string',
            'abstract_document' => 'nullable|file|mimes:pdf|max:10240',
            'full_paper_file' => 'nullable|file|mimes:pdf|max:10240',
        ];
    }

     public function withValidator($validator)
    {
        $validator->sometimes('department_id', 'required', function ($input) {
            $campus = Campus::find($input->campus_id);
            return $campus && $campus->name !== 'Sorsogon State University - Graduate Studies Campus';
        });

        $validator->after(function ($validator) {
            $campus = Campus::find($this->campus_id);
            if ($campus && $campus->name === 'Sorsogon State University - Graduate Studies Campus') {
                $validator->errors()->forget('department_id');
            }
        });
    }

    /**
     * Override failed validation to return custom response
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
