<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBijoutierRequest;
use App\Http\Requests\UpdateBijoutierRequest;
use App\Http\Resources\Admin\BijoutierResource;
use App\Models\Bijoutier;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BijoutierApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bijoutier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BijoutierResource(Bijoutier::with(['paye'])->get());
    }

    public function store(StoreBijoutierRequest $request)
    {
        $bijoutier = Bijoutier::create($request->all());

        return (new BijoutierResource($bijoutier))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bijoutier $bijoutier)
    {
        abort_if(Gate::denies('bijoutier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BijoutierResource($bijoutier->load(['paye']));
    }

    public function update(UpdateBijoutierRequest $request, Bijoutier $bijoutier)
    {
        $bijoutier->update($request->all());

        return (new BijoutierResource($bijoutier))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bijoutier $bijoutier)
    {
        abort_if(Gate::denies('bijoutier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bijoutier->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
