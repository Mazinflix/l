<?php

namespace App\Http\Requests;

use App\Models\PerfumeOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePerfumeOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('perfume_order_edit');
    }

    public function rules()
    {
        return [
            'customer_id' => [
                'required',
                'integer',
            ],
            'perfume_id' => [
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
