<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckArticleRequest;
use App\Http\Requests\UpdateCheckArticleRequest;
use App\Http\Resources\Admin\CheckArticleResource;
use App\Models\CheckArticle;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckArticleApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('check_article_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CheckArticleResource(CheckArticle::all());
    }

    public function store(StoreCheckArticleRequest $request)
    {
        $checkArticle = CheckArticle::create($request->all());

        return (new CheckArticleResource($checkArticle))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CheckArticle $checkArticle)
    {
        abort_if(Gate::denies('check_article_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CheckArticleResource($checkArticle);
    }

    public function update(UpdateCheckArticleRequest $request, CheckArticle $checkArticle)
    {
        $checkArticle->update($request->all());

        return (new CheckArticleResource($checkArticle))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CheckArticle $checkArticle)
    {
        abort_if(Gate::denies('check_article_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checkArticle->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
