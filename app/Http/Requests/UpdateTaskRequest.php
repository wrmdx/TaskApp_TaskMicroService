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
            'name' => 'sometimes|required|string|max:255', // Optional but must be valid if provided
            'description' => 'nullable|string', // Optional and must be a string if provided
            'status' => 'sometimes|required|string|in:open,closed', // Optional but must be "open" or "closed"
            'priority' => 'sometimes|required|string|in:low,medium,high', // Optional but must be valid if provided
            'due_date' => 'sometimes|required|date', // Optional but must be a valid date
            'assigned_user_id' => 'sometimes|required|integer', // Optional but must exist in users table
            'created_by' => 'sometimes|required|integer', // Optional but must exist in users table
            'updated_by' => 'nullable|integer', // Optional and must exist in users table if provided
            'project_id' => 'sometimes|required|integer', // Optional but must exist in projects table
        ];
    }
}
