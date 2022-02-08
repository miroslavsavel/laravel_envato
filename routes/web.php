<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\GuitarsController;

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

//link to the HomeController methods
//name was assigned to this route, it is home controller and index page
Route::get('/', [HomeControler::class, 'index'])->name('home.index');
Route::get('/about', [HomeControler::class, 'about'])->name('home.about');
Route::get('/contact', [HomeControler::class, 'contact'])->name('home.contact');

Route::resource('guitars', GuitarsController::class);

Route::get('/store/{category?}/{item?}', function ($category=null, $item=null) {
    //? meaning that these parameters are optional
    if(isset($category)) {
        if(isset($item)){
            return "You are viewing the store for {$category} for {$item}";
        }
        return 'You are viewing the store for ' . strip_tags($category);
    }
    return 'You are viewing all instruments in the store';
});

// Route::get('/store', function () {
//     $category = request('category');
//     //teraz po otvoreni http://127.0.0.1:8000/store?category=hudobniny
    
//     //XSS category=<script>alert("hi")</script>
//     //return 'You are viewing the store for ' . $category;
//     if(isset($category)) {
//         return 'You are viewing the store for ' . strip_tags($category);
//     }
//     return 'You are viewing all instruments in the store';
// });



