<?php


namespace App\Http\Transformer\Article;


use App\Models\Article;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class ArticlesTransformer extends TransformerAbstract
{
    public function transform(Article $article)
    {
        return [
             $article->title,
             mb_strimwidth($article->content, 0, 200, "..."),
            Carbon::createFromFormat('Y-m-d H:i:s', $article->created_at)->format('Y-m-d H:m'),
             '<div class="uk-inline">
                        <a href="'.route('article.edit',$article).'" uk-icon="file-edit"></a>
                            <form method="post" action="'.route('article.destroy',$article).'">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="'. csrf_token() .'">
                                <button type="submit" uk-icon="trash"></button>
                            </form>
                       </div>',
        ];
    }
}
