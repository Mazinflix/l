<?php

namespace App\Http\Requests;

use App\Models\WearableOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyWearableOrderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('wearable_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:wearable_orders,id',
        ];
    }
}
