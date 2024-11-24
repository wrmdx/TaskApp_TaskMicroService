<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class ValidProject implements Rule
{
    protected $errorMessage;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $response = Http::get('https://localhost:8000/api/projects/' . $value);

            if ($response->successful() && $response->json('success') === true) {
                return true; // The project exists
            }

            $this->errorMessage = 'The specified project does not exist.';
            return false;
        } catch (\Exception $e) {
            $this->errorMessage = 'Unable to verify the project.';
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->errorMessage;
    }
}
