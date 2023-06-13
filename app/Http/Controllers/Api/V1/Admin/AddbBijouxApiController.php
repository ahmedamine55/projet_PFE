<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddbBijouxRequest;
use App\Http\Requests\UpdateAddbBijouxRequest;
use App\Http\Resources\Admin\AddbBijouxResource;
use App\Models\AddbBijoux;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddbBijouxApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('addb_bijoux_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddbBijouxResource(AddbBijoux::with(['types', 'categories', 'bijoutier', 'currency'])->get());
    }

    public function store(StoreAddbBijouxRequest $request)
    {
        $addbBijoux = AddbBijoux::create($request->all());
        $addbBijoux->types()->sync($request->input('types', []));
        $addbBijoux->categories()->sync($request->input('categories', []));

        return (new AddbBijouxResource($addbBijoux))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddbBijoux $addbBijoux)
    {
        abort_if(Gate::denies('addb_bijoux_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddbBijouxResource($addbBijoux->load(['types', 'categories', 'bijoutier', 'currency']));
    }

    public function update(UpdateAddbBijouxRequest $request, AddbBijoux $addbBijoux)
    {
        $addbBijoux->update($request->all());
        $addbBijoux->types()->sync($request->input('types', []));
        $addbBijoux->categories()->sync($request->input('categories', []));

        return (new AddbBijouxResource($addbBijoux))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddbBijoux $addbBijoux)
    {
        abort_if(Gate::denies('addb_bijoux_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addbBijoux->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
