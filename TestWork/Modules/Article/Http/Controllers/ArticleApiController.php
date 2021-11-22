<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Routing\Controller;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Modules\Article\Entities\Article;
use Modules\Article\Http\Requests\StoreArticleRequest;
use Modules\Article\Http\Requests\UpdateArticleRequest;
use Modules\Article\Http\Transformer\Article\ArticlesApiTransformer;

class ArticleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        $pagination=Article::paginate(20);
        $article=$pagination->getCollection();
        return fractal()->collection($article, new ArticlesApiTransformer())->paginateWith(new IlluminatePaginatorAdapter($pagination))->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArticleRequest $request
     * @return array
     */
    public function store(StoreArticleRequest $request)
    {
        $article=Article::create($request->all());
        return fractal($article, new ArticlesApiTransformer())->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  Article  $article
     * @return array
     */
    public function show(Article $article)
    {
        return fractal($article, new ArticlesApiTransformer())->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArticleRequest $request
     * @param Article $article
     * @return array
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->save();
        return fractal($article, new ArticlesApiTransformer())->toArray();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article  $article
     * @return array
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return fractal($article, new ArticlesApiTransformer())->toArray();
    }
}
