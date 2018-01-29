<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TrendyBlognController@index');
Route::get('/shakil','TrendyBlognController@shakil');

Route::get('/contact', 'TrendyBlognController@contact');
Route::get('/categorys/{id}', 'TrendyBlognController@showcategory');
Route::get('/blogs/{id}', 'TrendyBlognController@showblogs');
Route::get('/review', 'TrendyBlognController@Review');

Route::post('/contact/new', 'TrendyBlognController@contactNew');
Route::post('/review/new', 'TrendyBlognController@reviewNew');
Route::post('/comment{id}', 'TrendyBlognController@BlogsNewComment');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

 Route::prefix('madmin')->group(function(){
    Route::get('/','AdminControllaer@index')->name('admin.deshboard');
    Route::get('/login', 'Auth\AdminLoginController@ShowLoginFrom')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
 });



Route::group(['Middleware' => 'AuthenticateMiddleware'], function (){
    Route::get('/category/add', 'CategoryController@index');
    Route::post('/category/new', 'CategoryController@saveCategoryInfo');

    Route::get('/category/manage', 'CategoryController@manageCategoryInfo');
    Route::get('/category/edit/{id}', 'CategoryController@editCategory');
    Route::post('/category/update', 'CategoryController@updateCategory');
    Route::get('/category/delete/{id}', 'CategoryController@deleteCategory');



    Route::get('/blog/add', 'BlogController@showblog');
    Route::post('/blog/new', 'BlogController@saveBlogInfo');

    Route::get('/blog/manage', 'BlogController@manageBlogInfo');
    Route::get('/blog/view/{id}', 'BlogController@viewBlog');
    Route::get('/blog/unpublished/{id}', 'BlogController@unpublishedBlogInfo');
    Route::get('/blog/published/{id}', 'BlogController@publishedBlogInfo');
    Route::get('/blog/edit/{id}', 'BlogController@editBlogInfo');
    Route::post('/blog/update', 'BlogController@updateBlogInfo');
    Route::get('/blog/delete/{id}', 'BlogController@deleteBlog');



    Route::get('/gallery', 'BlogController@Showgallery');


    Route::get('/commants-manage', 'CommentsController@CommentsManage');
    Route::get('/commants-unpublished/{id}', 'CommentsController@unpublishedCommentInfo');
    Route::get('/commants-published/{id}', 'CommentsController@publishedCommentInfo');
    Route::get('/commants-delete/{id}', 'CommentsController@CommentsDelete');



    Route::get('/review/manage', 'ReviewsController@reviewsmanage');
    Route::get('/review/unpublished/{id}', 'ReviewsController@reviewUnpublis');
    Route::get('/review/published/{id}', 'ReviewsController@reviewPublish');
    Route::get('/review/delete/{id}', 'ReviewsController@reviewsDelet');
    Route::get('/review-Reply/{id}','ReviewsController@reviewReply');


    Route::get('/contact/manage', 'ContactController@contactmanage');
    Route::get('/contact/reply/{id}', 'ContactController@contactReply');
    Route::get('/contact/delete/{id}', 'ContactController@contactDelet');
    Route::get('/compose','ContactController@composeEmail');

    Route::post('/send/email', 'ContactController@sendemail');

});

















