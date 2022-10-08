<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShoeRequest;
use App\Http\Requests\StoreShoeRequest;
use App\Http\Requests\UpdateShoeRequest;
use App\Models\Shoe;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShoeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shoe_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shoes = Shoe::all();

        return view('admin.shoes.index', compact('shoes'));
    }

    public function create()
    {
        abort_if(Gate::denies('shoe_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shoes.create');
    }

    public function store(StoreShoeRequest $request)
    {
        $shoe = Shoe::create($request->all());

        return redirect()->route('admin.shoes.index');
    }

    public function edit(Shoe $shoe)
    {
        abort_if(Gate::denies('shoe_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shoes.edit', compact('shoe'));
    }

    public function update(UpdateShoeRequest $request, Shoe $shoe)
    {
        $shoe->update($request->all());

        return redirect()->route('admin.shoes.index');
    }

    public function show(Shoe $shoe)
    {
        abort_if(Gate::denies('shoe_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shoe->load('shoeShoesOptions', 'shoeOrders');

        return view('admin.shoes.show', compact('shoe'));
    }

    public function destroy(Shoe $shoe)
    {
        abort_if(Gate::denies('shoe_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shoe->delete();

        return back();
    }

    public function massDestroy(MassDestroyShoeRequest $request)
    {
        Shoe::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
