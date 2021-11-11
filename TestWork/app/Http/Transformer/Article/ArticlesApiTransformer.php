<?php


namespace App\Http\Transformer\Article;


use App\Models\Article;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class ArticlesApiTransformer extends TransformerAbstract
{
    public function transform(Article $article)
    {
        return [
            'title'=>$article->title,
            'content'=>mb_strimwidth($article->content, 0, 200, "..."),
            'created_at'=> Carbon::createFromFormat('Y-m-d H:i:s', $article->created_at)->format('Y-m-d H:m'),
        ];
    }
}
