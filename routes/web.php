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
    return view('index');
});

Route::get('/insert',function(){
    DB::insert('insert into news(title,description) values(?, ?)',['最新消息2','這是一則勁爆的消息2']);
});

Route::get('/read', function(){
    $results = DB::select('select * from news where id = ?',[1]);
    foreach($results as $new){
        return $new->title;
    }
});

Route::get('/update',function(){
    $updated = DB::update('update news set title = "更新最新消息" where id = ?',[1]);
    return $updated;
});

Route::get('/delete',function(){
    $deleted = DB::delete('delete from news where id = ?',[1]);
    return $deleted;
});


use App\News;

Route::get('/read',function(){
    $posts = News::all();
    
    foreach($posts as $post){
        return $post->title;
    };
});

Route::get('/find',function(){
    $post = News::find(2);
    return $post;
});

Route::get('/findwhere', function(){
    //$post = News::where('id','>',0)->orderBy('title','desc')->take(1)->get();
    $post = News::where('id','>',0)->orderBy('title','desc')->get();
    return $post;
});

Route::get('/inserdata',function(){
    $post = new News;
    $post->title = 'goodjob';
    $post->description = '這是一則描述';
    $post->save();
});


//Route::resource('news','Newscontroller');