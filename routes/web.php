<?php

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
    return view('welcome');
});

Route::get('/about', function () {
    return '<h1> About html page</h1>';
});

Route::get('/contact', function () {
    return '<h1> contact page</h1>';
});

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



