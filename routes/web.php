<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MessageController;


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

//Route::middleware( ['auth'] )->group( function()  {

//UserController Routen

Route::get('/usermanagement', [UserController::class, 'admin'] );

Route::get('/newuser', [UserController::class, 'newUser'] );

Route::get('/user/{id}', [UserController::class, 'userDetails'] );

Route::post('/dashboard', [UserController::class, 'login'] );

Route::post('/newuser', [UserController::class, 'acpSave'] );

//TicketController Routen
Route::get('/dashboard', [TicketController::class, 'statistics'] );

Route::get('/tickets', [TicketController::class, 'tickets'] );

Route::get('/newticket', [TicketController::class, 'newTicket'] );

Route::get( '/ticket/{id}', [TicketController::class, 'ticketDetails']);

Route::post('/tickets', [TicketController::class, 'save'] );

Route::post('/newmessage', [TicketController::class, 'newMessage'] );

Route::post('/newstatus', [TicketController::class, 'newStatus'] );

//CategoryController Routen
Route::get('/knowledgebase', [CategoryController::class, 'showCategories'] );

Route::get('/knowledgemanagement', [CategoryController::class, 'admin'] );

Route::get('/newcategory', [CategoryController::class, 'newCategory'] );

Route::get('/category/{id}', [CategoryController::class, 'categoryDetails'] );

Route::post('/knowledgemanagement', [CategoryController::class, 'acpSave'] );

//ArticleController Routen
Route::get('/newarticle', [ArticleController::class, 'newArticle'] );

Route::get('/article/{id}', [ArticleController::class, 'articleDetails'] );

Route::post('/knowledgebase', [ArticleController::class, 'save'] );

//DashboardController Routen
Route::get('/acp', [DashboardController::class, 'acp'] );

Route::post('/user', [UserController::class, 'acpSave'] );

//});