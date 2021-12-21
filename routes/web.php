<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function() {
    Route::get('/', 'PageController@index')->name('home');
    Route::get('/firmware', 'PageController@Firmwares')->name('all.firmware');
    Route::get('/posts', 'PageController@posts')->name('all.posts');
    Route::get('/category/{id}-{slug}', 'PageController@Category')->name('category.name');
    Route::get('/post/{id}-{slug}', 'PageController@show_post')->name('post.name');
    Route::get('/firmware/{id}-{slug}', 'PageController@show_firmware')->name('firmware.name');
    Route::get('/page/{id}-{slug}', 'PageController@show_page')->name('show.page');
    Route::get('/contact', 'PageController@contact')->name('contact');
    Route::post('/contact', 'PageController@SendEmail')->name('send.message');
    Route::get('/search', 'PageController@search')->name('search.keyword');
});

Auth::routes(['verify' => true, 'register' => false]);

Route::prefix('admin')->group(function() {
    Route::get('/', 'HomeController@index')->name('admin.dash')->middleware('verified');
    Route::resource('/posts', 'PostsController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/pages', 'AddNewPageController');
    Route::resource('/firmware', 'FirmwareController');
    Route::resource('/options', 'SystemOptionsController')
        ->only(['index', 'update']);
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::post('/profile/{id}', 'ProfileController@change_info')->name('profile.info');
    Route::put('/profile/{id}', 'ProfileController@change_password')->name('profile.password');
});

Route::prefix('admin/api/v1/select')->name('admin.select.')
->namespace('api')->middleware(['auth' => 'verified'])
->group(function () {
    Route::get('tags', 'SelectController@tags_selector')->name('tags');
    Route::get('category', 'SelectController@category_selector')->name('categories');
});


Route::prefix('sitemap/')->namespace('sitemap')->group(function() {
    Route::get('sitemap.xml', 'SitemapController@index')->name('sitemap.index');
    Route::get('files.xml', 'SitemapController@firmware')->name('sitemap.firmware');
    Route::get('category.xml', 'SitemapController@category')->name('sitemap.category');
    Route::get('posts.xml', 'SitemapController@posts')->name('sitemap.post');
    Route::get('tags.xml', 'SitemapController@tags')->name('sitemap.tags');
    Route::get('pages.xml', 'SitemapController@pages')->name('sitemap.pages');
});
