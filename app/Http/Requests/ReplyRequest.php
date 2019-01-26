<?php

namespace App\Http\Requests;

use App\Rules\EndsWithDot;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ReplyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_unless($thread = $this->route('thread'), 404, 'Thread not found');
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
            'content'   => ['required']
        ];
    }
}
