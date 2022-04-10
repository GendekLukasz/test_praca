<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactsController;
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

Route::get('/', [CompaniesController::class, 'listOfCompanies']);
Route::get('/add_company', [CompaniesController::class, 'add']);
Route::get('/edit_company/{id}', [CompaniesController::class, 'edit']);
Route::get('/delete/{id}', [CompaniesController::class, 'delete']);
Route::get('/contacts/{id}', [ContactsController::class, 'listOfCompanyContacts']);

Route::post('/edit', [CompaniesController::class, 'editSave']);
Route::post('/add', [CompaniesController::class, 'addSave']);

Route::get('/main', function () {
    return view('pages.main'); //test
});
