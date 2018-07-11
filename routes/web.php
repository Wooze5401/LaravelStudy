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

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello/{id?}',function ($id=1) {
   return 'hello'.$id;
})->name('test');
Route::get('redirect',function (){
    return redirect(route('test'));
});

Route::get('form',function (){
    return '<form method="POST" action="/foo">
        '.csrf_field().'
        <button type="submit">提交</button></form>';
});
Route::match(['get','post'],'foo',function (){
    return 'good request!';
});
