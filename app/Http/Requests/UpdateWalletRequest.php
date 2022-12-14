<?php

namespace App\Http\Requests;

use App\Models\Wallet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWalletRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('wallet_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
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
