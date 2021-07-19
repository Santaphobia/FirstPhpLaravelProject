<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'description',
        'text',
        'categories_id',
        'is_active',
        'publication_date'
    ];

    public static function getActiveNewsByCategoriesId(int $id, int $numberPerPage) {
        return News::query()->where('categories_id', $id)->where('is_active', 1)->paginate($numberPerPage);
    }

    public static function getAllNews(int $numberPerPage) {
        return News::query()->paginate($numberPerPage);
    }
}
