<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\model\Categories;
use App\model\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index() {
        $categories = Categories::getActiveCategories(5);
        return view('news/categories', ['categories' => $categories]);
    }

    public function newsCategories($id) {
        $news = News::getActiveNewsByCategoriesId($id, 5);
        $category = Categories::find($id);
        return view('news/categoriesNews', ['news' => $news, 'category' => $category]);
    }

    public function singleNews($id) {
        $news = News::find($id);
        return view('news/singleNews', ['news' => $news]);
    }
}
