<?php

namespace App\Http\Requests;

use App\Models\SlipperOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSlipperOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('slipper_order_create');
    }

    public function rules()
    {
        return [
            'customer_id' => [
                'required',
                'integer',
            ],
            'slipper_id' => [
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
            ],
        ];
    }
}
