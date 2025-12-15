
<?php

use App\Http\Controllers\Admin\SecoundController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test1', function () {
    return "welcome";
});

//route parametar  {required}
//لازم تنبعت داخل function
Route::get('/test2/{id}', function ($id) {
    return "welcome $id";
});

//route parametar  {not required}

Route::get('/test3/{id?}', function () {
    return "welcome";
});

//route name
//مفيدة في html اسم يدل عله
//للاختصار
Route::get('/show-string/{id?}', function () {
    return "welcome";
})->name("b");

// route nameSpace()
//capital lateer
Route::namespace('Front')->group(function(){

    //all route only access controller or methods in folder name "Front"
    //Route::get('users','UserController@showAdminName');

});


//middleware 1
Route::get('check',function(){
    return 'middleware';
})->middleware('auth');

//middleware 2    "best"
Route::group(['prefix'=>'users','middleware'=>'auth'],function(){
  Route::get('/',function(){
return "work";
  });

});



//for controller
//            url          name of controller   name of function
Route::get('secound', [SecoundController::class, 'showString']);


//middleware     "best"

 Route::get('secound', [SecoundController::class, 'showString0'])->middleware("auth");
 Route::get('secound1', [SecoundController::class, 'showString1']);
 Route::get('secound2', [SecoundController::class, 'showString2']);
 Route::get('secound3', [SecoundController::class, 'showString3']);


// ازا ما عملت name  مالح يشوفو
Route::get('login',function(){
    return "must be login";
})->name('login');


//To auth


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
