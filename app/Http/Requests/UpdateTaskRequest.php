<?php


namespace App\Http\Requests;

use App\Rules\ValidProject;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You can add logic to check user permissions here
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|required|in:pending,completed,in-progress',
            'due_date' => 'nullable|date',
            'priority' => 'required|in:low,medium,high',
            'project_id' => ['sometimes', 'integer', new ValidProject],
        ];
    }
}
