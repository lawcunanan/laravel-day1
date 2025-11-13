<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'TaskTitle' => 'required|max:255',
            'TaskDescription' => 'required|max:1000',
        ];
    }
}
