<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_active',
    ];

    public static function getActiveCategories(int $numberPerPage) {
        return Categories::query()->where('is_active', '1')->paginate($numberPerPage);
    }
}
