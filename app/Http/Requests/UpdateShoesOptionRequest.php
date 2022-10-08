<?php

namespace App\Http\Requests;

use App\Models\ShoesOption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShoesOptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shoes_option_edit');
    }

    public function rules()
    {
        return [
            'shoe_id' => [
                'required',
                'integer',
            ],
            'color' => [
                'string',
                'nullable',
            ],
            'type' => [
                'string',
                'nullable',
            ],
            'size' => [
                'integer',
                'nullable',
            ],
            'quantity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
                'numeric',
            ],
        ];
    }
}
