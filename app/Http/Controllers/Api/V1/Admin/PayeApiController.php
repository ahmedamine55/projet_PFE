<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayeRequest;
use App\Http\Requests\UpdatePayeRequest;
use App\Http\Resources\Admin\PayeResource;
use App\Models\Paye;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PayeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('paye_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PayeResource(Paye::all());
    }

    public function store(StorePayeRequest $request)
    {
        $paye = Paye::create($request->all());

        return (new PayeResource($paye))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Paye $paye)
    {
        abort_if(Gate::denies('paye_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PayeResource($paye);
    }

    public function update(UpdatePayeRequest $request, Paye $paye)
    {
        $paye->update($request->all());

        return (new PayeResource($paye))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Paye $paye)
    {
        abort_if(Gate::denies('paye_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paye->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
