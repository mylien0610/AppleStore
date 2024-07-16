<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.pages.auth.login',['title'=>'Login']);
    })->name('admin.auth.login');

    Route::get('/verify-login/{id}/{email}', function ($id, $email) {
        $user = User::where('id', $id)->first();
        if($user->email !== $email){
            return redirect('/admin/login');
        }

        session(['user' => $user]);
        return redirect('/admin');
    });

    Route::group(['middleware' => ['isLogin']], function () {
        Route::get('/', function () {
            return view('admin.pages.home.index',['title'=>'Dashboard']);
        })->name('admin.home.index');

        Route::get('/categories', function () {
            return view('admin.pages.categories.index',['title'=>'Categories']);
        })->name('admin.categories.index');

        Route::get('/products', function () {
            return view('admin.pages.products.index',['title'=>'Products']);
        })->name('admin.products.index');
    });

});


