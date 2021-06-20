<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddbBijouxRequest;
use App\Http\Requests\StoreAddbBijouxRequest;
use App\Http\Requests\UpdateAddbBijouxRequest;
use App\Models\AddbBijoux;
use App\Models\Bijoutier;
use App\Models\Categorie;
use App\Models\Currency;
use App\Models\Type;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddbBijouxController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('addb_bijoux_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addbBijouxes = AddbBijoux::with(['types', 'categories', 'bijoutier', 'currency'])->get();

        return view('admin.addbBijouxes.index', compact('addbBijouxes'));
    }

    public function create()
    {
        abort_if(Gate::denies('addb_bijoux_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = Type::all()->pluck('name', 'id');

        $categories = Categorie::all()->pluck('name', 'id');

        $bijoutiers = Bijoutier::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addbBijouxes.create', compact('types', 'categories', 'bijoutiers', 'currencies'));
    }
    private function photoHandler($file){
        if($file == null)
            return null;
        $ext = $file->getClientOriginalExtension();
        $photo1 = uniqid() . rand(0,100).".".$ext;
        $file -> move ("addBijouxPhoto/",$photo1);
        return $photo1;
    }
    public function store(StoreAddbBijouxRequest $request)
    {
        $addbBijoux = new AddbBijoux() ;
        $addbBijoux->photo1  = $this->photoHandler($request->hasFile('photo1') ? $request->file('photo1') : null);
        $addbBijoux->photo2  = $this->photoHandler($request->hasFile('photo2') ? $request->file('photo2') : null);
        $addbBijoux->photo3  = $this->photoHandler($request->hasFile('photo3') ? $request->file('photo3') : null);

        $addbBijoux->name = $request->name;
        $addbBijoux->description = $request->description;
        $addbBijoux->bijoutier_id = $request->bijoutier_id;
        $addbBijoux->currency_id = $request->currency_id;
        $addbBijoux->prix = $request->prix;
        $addbBijoux->quantity = $request->quantity;
        //dd($request->all());
        $addbBijoux ->save();
        $addbBijoux->types()->sync($request->input('types', []));
        $addbBijoux->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.addb-bijouxes.index');
    }

    public function edit(AddbBijoux $addbBijoux)
    {
        abort_if(Gate::denies('addb_bijoux_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = Type::all()->pluck('name', 'id');

        $categories = Categorie::all()->pluck('name', 'id');

        $bijoutiers = Bijoutier::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addbBijoux->load('types', 'categories', 'bijoutier', 'currency');

        return view('admin.addbBijouxes.edit', compact('types', 'categories', 'bijoutiers', 'currencies', 'addbBijoux'));
    }

    public function update(UpdateAddbBijouxRequest $request, AddbBijoux $addbBijoux)
    {
        $addbBijoux->name = $request->name;
        $addbBijoux->photo1  = $this->photoHandler($request->hasFile('photo1') ? $request->file('photo1') : null);
        $addbBijoux->photo2  = $this->photoHandler($request->hasFile('photo2') ? $request->file('photo2') : null);
        $addbBijoux->photo3  = $this->photoHandler($request->hasFile('photo3') ? $request->file('photo3') : null);

        $addbBijoux->name = $request->name;
        $addbBijoux->bijoutier_id = $request->bijoutier_id;
        $addbBijoux->currency_id = $request->currency_id;
        $addbBijoux ->update();
        $addbBijoux->types()->sync($request->input('types', []));
        $addbBijoux->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.addb-bijouxes.index');
    }

    public function show(AddbBijoux $addbBijoux)
    {
        abort_if(Gate::denies('addb_bijoux_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addbBijoux->load('types', 'categories', 'bijoutier', 'currency');

        return view('admin.addbBijouxes.show', compact('addbBijoux'));
    }

    public function destroy(AddbBijoux $addbBijoux)
    {
        abort_if(Gate::denies('addb_bijoux_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addbBijoux->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddbBijouxRequest $request)
    {
        AddbBijoux::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
