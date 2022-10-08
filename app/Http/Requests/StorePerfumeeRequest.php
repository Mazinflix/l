<?php

namespace App\Http\Requests;

use App\Models\Perfumee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePerfumeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('perfumee_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'size' => [
                'string',
                'nullable',
            ],
            'price' => [
                'numeric',
                'required',
            ],
        ];
    }
}
