<?php

namespace App\Http\Requests;

use App\Models\WearableOption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWearableOptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('wearable_option_edit');
    }

    public function rules()
    {
        return [
            'wearable_id' => [
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
