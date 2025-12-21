
<?php

use App\Http\Controllers\Admin\SecoundController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\AddPropertyController;
use App\Http\Controllers\Auth\CustomAuthController;
// use App\Http\Controllers\CustomAuthController;
 use App\Http\Middleware\CheckAge;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test1', function () {
    return "test1";
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


Route::get('fillable',[CrudController::class,'getOffers']);
// هذه تريد اشياء خاصة بها
Route::get('fillable',[CrudController::class,'getOffers_to_this_method_only']);
//prifex => اي اسم
Route::group(['prefix'=>'offers'],function(){
    // Route::get('store',[CrudController::class,'store']);
    //viwe يعني  form  تنادي عل create
    Route::get('create',[CrudController::class,'create']);
    Route::post('store',[CrudController::class,'store'])->name('offers.store');
    // عرض  data
    Route::get('all',[CrudController::class,'getAllOffers']);

 Route::get('edit/{offer_id}',[CrudController::class,'editOffer']);
Route::post('update/{offer_id}',[CrudController::class,'updateOffer'])->name('offers.update');
Route::get('delete/{offer_id}',[CrudController::class,'deleteOffer'])->name('offers.delete');

// Route::get('all',[CrudController::class,'deleteOffer'])->name('offers.delete');

});


// Route::get('/add', function () {
//     return view('layouts.offers.addProperty');
// });

Route::get('add',[AddPropertyController::class,'store']);

Route::group(['prefix'=>'add'],function(){
    // Route::get('store',[CrudController::class,'store']);
    //viwe يعني  form  تنادي عل create
    Route::get('create',[AddPropertyController::class,'create']);
    Route::post('store',[AddPropertyController::class,'store'])->name('add.store');
    // عرض  data
    Route::get('all',[AddPropertyController::class,'getAllProperty']);

     Route::get('edit/{id}',[AddPropertyController::class,'editProperty'])->name('Property.edit');
    Route::post('update/{id}',[AddPropertyController::class,'updateProperty'])->name('Property.update');
    Route::get('delete/{id}',[AddPropertyController::class,'deleteProperty'])->name('Property.delete');


});



// begain authuntication
    // Route::get('adualt','CustomAuthController@adualt');
    // Route::get('adualt',[CustomAuthController::class,'adualt'])->middleware('CheckAge');
    Route::group(['meddleware'=>['auth','CheckAge']],function(){

        Route::get('adualt',[CustomAuthController::class,'adualt'])->name('adult');
    });


// end authuntication
