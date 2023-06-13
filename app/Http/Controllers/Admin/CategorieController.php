<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategorieRequest;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Models\Categorie;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategorieController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('categorie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Categorie::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('categorie_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categories.create');
    }

    public function store(StoreCategorieRequest $request)
    {
        $categorie = Categorie::create($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function edit(Categorie $categorie)
    {
        abort_if(Gate::denies('categorie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categories.edit', compact('categorie'));
    }

    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {
        $categorie->update($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function show(Categorie $categorie)
    {
        abort_if(Gate::denies('categorie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categories.show', compact('categorie'));
    }

    public function destroy(Categorie $categorie)
    {
        abort_if(Gate::denies('categorie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorie->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategorieRequest $request)
    {
        Categorie::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
