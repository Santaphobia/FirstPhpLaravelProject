<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoriesEditRequest;
use App\Http\Requests\AdminNewsEditRequest;
use App\model\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\model\News;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::getAllNews(8);
        return view('admin.news.index', ['news' => $news]);
    }

    public function categories() {
        $categories = Categories::all();
        return view('admin.news.categories', ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        return view("admin.news.create", ['model' => (new News()), 'categories' => (Categories::all())]);
    }

    public function createCategories(Request $request)
    {
        return view("admin.news.createCategories", ['model' => (new Categories())]);
    }

    public function update(int $id) {
        $news = News::find($id);
        return view('admin.news.create', ['model' => $news, 'categories' => Categories::find($news->categories_id)]);
    }

    public function updateCategories(int $id) {
        $categories = Categories::find($id);
        return view('admin.news.createCategories', ['model' => $categories]);
    }



    public function saveNews(AdminNewsEditRequest $request, $id) {
        if ($id) {
            $model = News::find($id);
        } else {
            $model = new News();
        }

        $this->save($request, $model);
        return redirect()->route("admin.news.create");
    }


    public function saveCategories(AdminCategoriesEditRequest $request, $id) {
        if ($id) {
            $model = Categories::find($id);
        } else {
            $model = new Categories();
        }
        $this->save($request, $model);
        return redirect()->route("admin.news.createCategories");
    }

    private function save(Request $request, Model $model) {
        if ($request->isMethod('post')) {
            $model->fill($request->all());
            $model->save();
        }
    }

    public function delete($id)
    {
        $news = News::find($id);
        $news->is_active = !($news->is_active);
        $news->save();
        return redirect()->route("admin.news.index");
    }

    public function deleteCategories($id)
    {
        $categories = Categories::find($id);
        $categories->is_active = !($categories->is_active);
        $categories->save();
        return redirect()->route("admin.news.categories");
    }
}
