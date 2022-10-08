<?php

namespace App\Http\Requests;

use App\Models\SlipperOption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySlipperOptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('slipper_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:slipper_options,id',
        ];
    }
}
