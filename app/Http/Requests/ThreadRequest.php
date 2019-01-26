<?php

namespace App\Http\Requests;

use App\Rules\EndsWithDot;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ThreadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'     => ['required', 'unique:threads', 'min:3'],
            'content'   => ['max:255', new EndsWithDot]
        ];
    }
}
