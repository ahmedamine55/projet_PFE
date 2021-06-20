<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBijoutierRequest;
use App\Http\Requests\StoreBijoutierRequest;
use App\Http\Requests\UpdateBijoutierRequest;
use App\Models\Bijoutier;
use App\Models\Paye;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BijoutierController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bijoutier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bijoutiers = Bijoutier::with(['paye'])->get();

        return view('admin.bijoutiers.index', compact('bijoutiers'));
    }

    public function create()
    {
        abort_if(Gate::denies('bijoutier_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payes = Paye::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bijoutiers.create', compact('payes'));
    }

    private function photoHandler($file){
        if($file == null)
            return null;
        $ext = $file->getClientOriginalExtension();
        $photo1 = uniqid() . rand(0,100).".".$ext;
        $file -> move ("bijoutierPhoto/",$photo1);
        return $photo1;
    }
    public function store(StoreBijoutierRequest $request)
    {
        $bijoutier = new Bijoutier() ;

        $bijoutier->photo1  = $this->photoHandler($request->hasFile('photo1') ? $request->file('photo1') : null);
        $bijoutier->photo2  = $this->photoHandler($request->hasFile('photo2') ? $request->file('photo2') : null);
        $bijoutier->photo3  = $this->photoHandler($request->hasFile('photo3') ? $request->file('photo3') : null);


        $bijoutier->nom = $request->nom;
        $bijoutier->prenom = $request->prenom;
        $bijoutier->mobile = $request->mobile;
        $bijoutier->description = $request->description;
        $bijoutier->facebook = $request->facebook;
        $bijoutier->instagram = $request->instagram;
        $bijoutier->twitter = $request->twitter;
        $bijoutier->web = $request->web;
        $bijoutier->email = $request->email;
        $bijoutier->password = $request->password;
        $bijoutier->type_payement = $request->type_payement;
        $bijoutier->paye_id = $request->paye_id;
        $bijoutier -> save();

        return redirect()->route('admin.bijoutiers.index');
    }

    public function edit(Bijoutier $bijoutier)
    {
        abort_if(Gate::denies('bijoutier_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payes = Paye::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bijoutier->load('paye');

        return view('admin.bijoutiers.edit', compact('payes', 'bijoutier'));
    }

    public function update(UpdateBijoutierRequest $request, Bijoutier $bijoutier)
    {

        $bijoutier->photo1  = $this->photoHandler($request->hasFile('photo1') ? $request->file('photo1') : null);
        $bijoutier->photo2  = $this->photoHandler($request->hasFile('photo2') ? $request->file('photo2') : null);
        $bijoutier->photo3  = $this->photoHandler($request->hasFile('photo3') ? $request->file('photo3') : null);


        $bijoutier->nom = $request->nom;
        $bijoutier->prenom = $request->prenom;
        $bijoutier->mobile = $request->mobile;
        $bijoutier->description = $request->description;
        $bijoutier->facebook = $request->facebook;
        $bijoutier->instagram = $request->instagram;
        $bijoutier->twitter = $request->twitter;
        $bijoutier->web = $request->web;
        $bijoutier->email = $request->email;
        $bijoutier->password = $request->password;
        $bijoutier->type_payement = $request->type_payement;
        $bijoutier->paye_id = $request->paye_id;
        $bijoutier -> update();

        return redirect()->route('admin.bijoutiers.index');
    }

    public function show(Bijoutier $bijoutier)
    {
        abort_if(Gate::denies('bijoutier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bijoutier->load('paye');

        return view('admin.bijoutiers.show', compact('bijoutier'));
    }

    public function destroy(Bijoutier $bijoutier)
    {
        abort_if(Gate::denies('bijoutier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bijoutier->delete();

        return back();
    }

    public function massDestroy(MassDestroyBijoutierRequest $request)
    {
        Bijoutier::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
