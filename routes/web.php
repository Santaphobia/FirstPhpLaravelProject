<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
 * Главный роут
 */
Route::get('/', 'HomeController@index')->name('home.index');

/*
 * Роуты для новостей
 */
Route::group(
    ['prefix' => 'news',
    'namespace' => 'News',
    'as' => 'news.'],
    function () {
        Route::get('/', 'NewsController@index')->name('index');
        Route::get('/categories/{id}', 'NewsController@newsCategories')->name('newsCategories');
        Route::get('/singleNews/{id}', 'NewsController@singleNews')->name('singleNews');
    }
);

/*
 * Роуты к авторизации
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/*
 * Авторизация google
 */
Route::group([
    'prefix' => 'google',
    'namespace' => 'Google',
    'as' => 'google.',
], function () {
    Route::get('/redirect', "LoginController@loginGoogle")->name('redirect');
    Route::get('/callback', "LoginController@responseGoogle")->name('callback');
});


/*
 * Роуты к админке
 */
Route::group([
    'prefix' => 'admin/',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => 'accessToAdmin'],
    function() {
        /*
        * Новости
        */
        Route::group([
            'prefix' => 'news',
            'as' => 'news.',
        ], function () {
            Route::get('/', "NewsController@index")->name('index');
            Route::get('/create', 'NewsController@create')->name('create');
            Route::get('/update/{id}', 'NewsController@update')->name('update');
            Route::post('/save_news/{id}', 'NewsController@saveNews')->name('saveNews');
            Route::get('/delete/{id}', 'NewsController@delete')->name('delete');
            Route::get('/categories', 'NewsController@categories')->name('categories');
            Route::get('/create_categories', 'NewsController@createCategories')->name('createCategories');
            Route::get('/update_categories/{id}', 'NewsController@updateCategories')->name('updateCategories');
            Route::get('/delete_categories/{id}', 'NewsController@deleteCategories')->name('deleteCategories');
            Route::post('/save_categories/{id}', 'NewsController@saveCategories')->name('saveCategories');
        });
        /*
        * Парсер
        */
        Route::group([
            'prefix' => 'parser',
            'as' => 'parser.',
        ], function () {
            Route::post('/', "ParseController@index")->name('index');
        });
        /*
        * Пользователи
        */
        Route::group([
            'prefix' => 'users',
            'as' => 'users.',
        ], function () {
            Route::get('/', "UsersController@index")->name('index');
            Route::get('/update/{id}', "UsersController@update")->name('update');
            Route::post('/save/{id}', "UsersController@save")->middleware('validateUpdateUser')->name('save');
        });

    });
/*
 * Роуты к фидбэку
 */
Route::get('/feedback', 'Feedback\FeedbackController@index')->name('feedback');
Route::post('/feedback_send', 'Feedback\FeedbackController@feedbackSend')->name('feedbackSend');



Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');


