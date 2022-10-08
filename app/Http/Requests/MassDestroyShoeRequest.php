<?php

namespace App\Http\Requests;

use App\Models\Shoe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyShoeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('shoe_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:shoes,id',
        ];
    }
}
