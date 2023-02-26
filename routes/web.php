<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\MainController;
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

// Route::get('/test', function () {
//     return view('test', ['testHead' => 'head1']);
// });

Route::get('/home', function () {
    return view('home');
});

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/register', function () {
    return view('register');
});

Route::resource('posts', PostsController::class);

Route::get('/test', 'MainController@index');
Route::post('/test/checklogin', 'MainController@checklogin');
Route::get('test/successlogin', 'MainController@successlogin');
Route::get('test/logout', 'MainController@logout');