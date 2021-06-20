<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCheckArticleRequest;
use App\Http\Requests\StoreCheckArticleRequest;
use App\Http\Requests\UpdateCheckArticleRequest;
use App\Models\AddbBijoux;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckArticleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('addb_bijoux_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $articles = AddbBijoux::orderBy('created_at','desc')->where('verified','new')->with(['types', 'categories', 'bijoutier', 'currency'])->get();
        return view('admin.checkArticles.index', compact('articles'));
    }


    public function articleViewOld(){
        abort_if(Gate::denies('addb_bijoux_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $articles = AddbBijoux::orderBy('created_at','desc')->where('verified','old')->with(['types', 'categories', 'bijoutier', 'currency'])->get();
        return view('admin.checkArticles.articleViewOld', compact('articles'));
    }

    public function makeItOld($id){
        $article= AddbBijoux::find($id);
        $article->verified="old";
        $article->save();
        return redirect()->route('admin.check-articles.index')->with('sucess','type changed to old');
    }

    public function makeItNew($id){
        $article= AddbBijoux::find($id);
        $article->verified="new";
        $article->save();
        return redirect()->route('admin.articleViewOld')->with('sucess','type changed to new');
    }

    public function create()
    {
        abort_if(Gate::denies('check_article_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.checkArticles.create');
    }

    public function store(StoreCheckArticleRequest $request)
    {
        $checkArticle = CheckArticle::create($request->all());

        return redirect()->route('admin.check-articles.index');
    }

    public function edit(CheckArticle $checkArticle)
    {
        abort_if(Gate::denies('check_article_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.checkArticles.edit', compact('checkArticle'));
    }

    public function update(UpdateCheckArticleRequest $request, CheckArticle $checkArticle)
    {
        $checkArticle->update($request->all());

        return redirect()->route('admin.check-articles.index');
    }

    public function show(CheckArticle $checkArticle)
    {
        abort_if(Gate::denies('check_article_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.checkArticles.show', compact('checkArticle'));
    }

    public function destroy(CheckArticle $checkArticle)
    {
        abort_if(Gate::denies('check_article_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checkArticle->delete();

        return back();
    }

    public function massDestroy(MassDestroyCheckArticleRequest $request)
    {
        CheckArticle::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
