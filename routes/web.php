<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [LoginController::class,'index'])->name('index');

Route::middleware('auth')->get('/{id}', [ClientController::class,'show'] )-> whereNumber('id');
Route::get('/home', [HomeController::class,'index'])->name('home')->middleware('auth');
Route::middleware('auth')->get('/contact', [ClientController::class,'contact'] );
Route::middleware('auth')->get('/facture1', [FactureController::class,'addfacture'] )->name('facture1');
Route::middleware('auth')->get('/client', [ClientController::class,'index'] )->name('client');
Route::middleware('auth')->get('/addclient', [ClientController::class,'create'] )->name('addclient');
Route::middleware('auth')->get('/addclient2', [ClientController::class,'create2'] )->name('addclient2');
Route::middleware('auth')->post('/addclientvalidate', [ClientController::class,'store'])->name('addclientvalidate');
Route::middleware('auth')->delete('client_delete/{id}', [ClientController::class,'destroy'])->name('client_delete');
Route::middleware('auth')->get('/product', [ProductController::class,'index'] )->name('product');
Route::middleware('auth')->post('/addproduct', [ProductController::class,'store'] )->name('addproduct');
Route::middleware('auth')->delete('product_delete/{id}', [ProductController::class,'destroy'])->name('product_delete');
Route::middleware('auth')->get('/facture', [FactureController::class,'index'] )->name('facture');
Route::middleware('auth')->get('/addfacture', [FactureController::class,'addfacture'] )->name('addfacture');
Route::middleware('auth')->post('/addfacturevalidate', [FactureController::class,'store'])->name('addfacturevalidate');
Route::middleware('auth')->get('/user', [UserController::class,'index'] )->name('user');
Route::middleware('auth')->post('/adduser', [UserController::class,'store'] )->name('adduser');
Route::middleware('auth')->get('/affichage/{id}', [FactureController::class,'affichage'] )->name('affichage');
Route::middleware('auth')->get('/approuve/{id}', [FactureController::class,'approuve'] )->name('approuve');
Route::middleware('auth')->get('/nonapprouve/{id}', [FactureController::class,'nonapprouve'] )->name('nonapprouve');
Route::middleware('auth')->delete('facture_delete/{id}', [FactureController::class,'destroy'])->name('facture_delete');
Route::middleware('auth')->delete('userdelete/{id}', [UserController::class,'destroy'])->name('userdelete');
Route::middleware('auth')->get('updateclient/{id}', [ClientController::class, 'edit'])->name('updateclient');
Route::middleware('auth')->post('updateclientsubmit/{id}', [ClientController::class, 'update'])->name('updateclientsubmit');
Route::middleware('auth')->get('updateproduit/{id}', [ProductController::class, 'edit'])->name('updateproduit');
Route::middleware('auth')->post('updateproduitsubmit/{id}', [ProductController::class, 'update'])->name('updateproduitsubmit');
Route::middleware('auth')->get('updateuser/{id}', [UserController::class, 'edit'])->name('updateuser');
Route::middleware('auth')->post('updateusersubmit/{id}', [UserController::class, 'update'])->name('updateusersubmit');
Route::middleware('auth')->get('updatefacture/{id}', [FactureController::class, 'edit'])->name('updatefacture');
Route::middleware('auth')->post('updatefacturesubmit/{id}', [FactureController::class, 'update'])->name('updatefacturesubmit');
Route::middleware('auth')->get('profile/{id}', [UserController::class, 'profile'])->name('profile');
Route::middleware('auth')->post('updateuser/{id}', [UserController::class, 'update'])->name('updateuser');
Route::middleware('auth')->post('cancel/', [FactureController::class, 'cancel'])->name('cancel');
Auth::routes();
Route::get('resetpassword', [LoginController::class,'reset'])->name('reset');

Route::get('/login', [LoginController::class,'index'])->name('login');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/forgot-password', function () {return view('resetpassword');})->middleware('guest')->name('password.request');
