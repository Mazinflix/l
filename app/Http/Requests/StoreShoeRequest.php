<?php

namespace App\Http\Requests;

use App\Models\Shoe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShoeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shoe_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'country' => [
                'string',
                'nullable',
            ],
        ];
    }
}
