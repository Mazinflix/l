<?php

namespace App\Http\Requests;

use App\Models\ShoesOption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyShoesOptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('shoes_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:shoes_options,id',
        ];
    }
}
