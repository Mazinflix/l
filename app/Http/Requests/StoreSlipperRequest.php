<?php

namespace App\Http\Requests;

use App\Models\Slipper;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSlipperRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('slipper_create');
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
