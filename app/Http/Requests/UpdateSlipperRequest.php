<?php

namespace App\Http\Requests;

use App\Models\Slipper;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSlipperRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('slipper_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
