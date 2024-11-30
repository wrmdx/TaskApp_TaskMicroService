<?php


namespace App\Http\Requests;

use App\Rules\ValidProject;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'name' => 'required|string|max:255', // Name is required and must be a string
            'description' => 'nullable|string', // Description is optional but must be a string
            'status' => 'required|string|in:open,closed', // Must be "open" or "closed"
            'priority' => 'required|string|in:low,medium,high', // Must be "low", "medium", or "high"
            'due_date' => 'required|date', // Must be a valid date
            'assigned_user_id' => 'required|integer', // Must exist in the users table
            'created_by' => 'required|integer', // Must exist in the users table
            'updated_by' => 'nullable|integer', // Optional but must exist in the users table if provided
            'project_id' => 'required|integer', // Must exist in the projects table
        ];
    }
}
