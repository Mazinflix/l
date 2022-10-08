<?php

namespace App\Http\Requests;

use App\Models\WalletOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWalletOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('wallet_order_edit');
    }

    public function rules()
    {
        return [
            'wallet_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
