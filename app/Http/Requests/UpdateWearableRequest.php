<?php

namespace App\Http\Requests;

use App\Models\Wearable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWearableRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('wearable_edit');
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
            'type' => [
                'required',
            ],
        ];
    }
}
