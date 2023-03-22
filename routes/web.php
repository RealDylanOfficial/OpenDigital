<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\SampleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
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
    return view('login');
});

// Route::get('profile', function () {
//     if (Auth::check()) {
//         return view('profile');
//     }
//     return view('login');
// });



Route::resource('posts', PostsController::class);

Route::resource('comments', CommentsController::class);

Route::controller(SampleController::class)->group(function(){

    Route::get('login', 'index')->name('login');

    Route::get('register', 'register')->name('register');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');

    Route::post('validate_login', 'validate_login')->name('sample.validate_login');

    Route::get('home', 'home')->name('home');

});

Route::resource('profile', ProfileController::class);

Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile');
Route::post('/profile','App\Http\Controllers\ProfileController@profileUpdate')->name('profileupdate');


Route::post('/posts/{id}',[PostsController::class,'flag'])->name('flagPost');

Route::post('/posts/{id}/like',[PostsController::class,'like'])->name('likePost');

Route::get('/flagged', [PostsController::class,'flagged']);

Route::post('/increment-download-count', [PostsController::class,'incrementDownload']);

