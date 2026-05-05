
<?php
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\AddPropertyController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\SpecialPropertyController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OfficeController;

//to welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//To auth
Route::post('/logout', function () {
    auth()->Auth::logout();
    return redirect('/'); // Landing Page
})->name('logout');

require __DIR__.'/auth.php';


Route::get('add',[AddPropertyController::class,'store']);

Route::group(['prefix'=>'add'],function(){

    Route::get('create',[AddPropertyController::class,'create'])->name('Property.create');
    Route::post('store',[AddPropertyController::class,'store'])->name('add.store');
    // عرض  data
    Route::get('all',[AddPropertyController::class,'getAllProperty'])->name('Property.all');

     Route::get('edit/{id}',[AddPropertyController::class,'editProperty'])->name('Property.edit');
    Route::post('update/{id}',[AddPropertyController::class,'updateProperty'])->name('Property.update');
    Route::get('delete/{id}',[AddPropertyController::class,'deleteProperty'])->name('Property.delete');

   // عرض  data
    Route::get('allAdmin',[AddPropertyController::class,'AdmingetAllProperty'])->middleware(AdminMiddleware::class)
    ->name('dashboard');
});

        // add copimlaint
Route::resource('complaints', ComplaintController::class)->only(['create', 'store', 'index']);


Route::get('/landing', function () {
    return view('layouts.offers.landing');
})->name('contact');

Route::get('/comlaint', function () {
    return view('complaints.complaint');
})->name('complaint');


Route::post('/result', [SpecialPropertyController::class, 'store'])->name('result.store');
Route::get('/result', [SpecialPropertyController::class, 'index'])->name('result.index');


Route::get('/listSpicialOreder', function () {
    return view('special_properties.index');
});

// .........
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::post('/favorites/add/{id}', [FavoriteController::class, 'add'])->name('favorites.add');
Route::delete('/favorites/remove/{id}', [FavoriteController::class, 'remove'])->name('favorites.remove');

//to about us
Route::get('about', function () {
    return view('layouts.offers.about');
})->name('about');


//to contact Us
Route::get('contact', function () {
    return view('layouts.offers.contact');
})->name('contactt');


// Route لعرض تفاصيل العقار
Route::get('/property/{id}', [AddPropertyController::class, 'show'])->name('property.show');


// Routes للأدمن (تتطلب تسجيل دخول)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('offices', OfficeController::class);
});

// Routes للمستخدم العادي
Route::prefix('offices')->name('front.offices.')->group(function () {
    Route::get('/', [OfficeController::class, 'frontIndex'])->name('index');
});
