<?php

namespace App\Http\Requests;

use App\Models\SlipperOption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSlipperOptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('slipper_option_edit');
    }

    public function rules()
    {
        return [
            'slipper_id' => [
                'required',
                'integer',
            ],
            'option' => [
                'string',
                'required',
            ],
            'quantity' => [
                'string',
                'required',
            ],
            'price' => [
                'numeric',
                'required',
            ],
        ];
    }
}
