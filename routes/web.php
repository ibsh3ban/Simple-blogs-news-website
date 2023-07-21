<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\DemoController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.index')->name('home');
});

// Route::get('/dashboard', function () {
//     return view('admin.index');
// });
Route::get('/admin', function () {
    return view('admin.admin_master');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Admin controller
Route::controller(AdminController::class)->middleware(['auth'])->group(function(){
  Route::get('/admin/logout','destroy')->name('admin.logout');
  Route::get('/admin/profile','profile')->name('admin.profile');
  Route::get('/profile/edit','editprofile')->name('edit.profile');
  Route::post('/profile/store','storeprofile')->name('store.profile');
  Route::get('/password/change','changepassword')->name('change.password');
  Route::post('/password/update','updatepassword')->name('update.password');
});

// Slider controller
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slider','homeslider')->name('home.slider');
    Route::post('/update/slider','updateslider')->name('update.slider');

});

// About controller
Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page','aboutpage')->name('about.page');
    Route::post('/update/about','updateAbout')->name('update.about');
    Route::get('/about','about')->name('about');
    Route::get('/about/multiimage','multiimage')->name('multi.about');
    Route::post('/store/multi/image','storeMultiImage')->name('store.multi.about');
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');

    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image/{id}','UpdateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}','DeleteMultiImage')->name('delete.multi.image');
});

 // Porfolio All Route
Route::controller(PortfolioController::class)->group(function () {
    Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');
    Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio', 'StorePortfolio')->name('store.protfolio');
    Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
    Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.protfolio');
    Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
    Route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');


});

// Blog Category All Routes
Route::controller(BlogCategoryController::class)->group(function () {
    Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
    Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');

    Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');

    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');

     Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');

     Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');

});

 // Blog All Route
 Route::controller(BlogController::class)->group(function () {
    Route::get('/all/blog', 'AllBlog')->name('all.blog');
    Route::get('/add/blog', 'AddBlog')->name('add.blog');
    Route::post('/store/blog', 'StoreBlog')->name('store.blog');
    Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
    Route::post('/update/blog', 'UpdateBlog')->name('update.blog');

    Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');

    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');

    Route::get('/blog', 'BlogHome')->name('home.blog');



});

// Contact All Route
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'Contact')->name('contact.me');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
});

// Demo All Route
Route::controller(DemoController::class)->group(function () {
    Route::get('/', 'HomeIndex')->name('home');

});
