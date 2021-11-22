<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @property int $id;
 * @property string $title;
 * @property string $content;
 */
class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title','content'];

    protected static function newFactory()
    {
        return \Modules\Article\Database\factories\ArticleFactory::new();
    }
}
