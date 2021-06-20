<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPayeRequest;
use App\Http\Requests\StorePayeRequest;
use App\Http\Requests\UpdatePayeRequest;
use App\Models\Paye;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PayeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('paye_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payes = Paye::all();

        return view('admin.payes.index', compact('payes'));
    }

    public function create()
    {
        abort_if(Gate::denies('paye_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payes.create');
    }

    public function store(StorePayeRequest $request)
    {
        $paye = Paye::create($request->all());

        return redirect()->route('admin.payes.index');
    }

    public function edit(Paye $paye)
    {
        abort_if(Gate::denies('paye_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payes.edit', compact('paye'));
    }

    public function update(UpdatePayeRequest $request, Paye $paye)
    {
        $paye->update($request->all());

        return redirect()->route('admin.payes.index');
    }

    public function show(Paye $paye)
    {
        abort_if(Gate::denies('paye_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payes.show', compact('paye'));
    }

    public function destroy(Paye $paye)
    {
        abort_if(Gate::denies('paye_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paye->delete();

        return back();
    }

    public function massDestroy(MassDestroyPayeRequest $request)
    {
        Paye::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
