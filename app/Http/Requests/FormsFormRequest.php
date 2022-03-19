<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class FormsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'content' => 'string|min:1',
        ];

        return $rules;
    }
}