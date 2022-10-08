<?php

namespace App\Http\Requests;

use App\Models\WearableOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWearableOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('wearable_order_create');
    }

    public function rules()
    {
        return [
            'wearable_id' => [
                'required',
                'integer',
            ],
            'option_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
                'numeric',
                'required',
            ],
        ];
    }
}
