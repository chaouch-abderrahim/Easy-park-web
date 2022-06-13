<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GestiondesClientsController;
use App\Http\Controllers\GestiondesClientController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\GestiondesAbonnementController;




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

Route::get('/insert', function () {
    $setRuf = app('firebase.firestore')->database()->collection('client')->newDocument();
    $setRuf->set([
        'Nom' => 'abdo', 'Prenom' => 'cchaouch'
    ]);
});

Route::get('/', [LoginController::class, 'login'])->name('login.login');
Route::post('/', [LoginController::class, 'loginsubmit'])->name('login.loginsubmit');


Route::get('addclient', [GestiondesClientController::class, 'fast'])->name('addclient.add');
Route::post('addclient', [GestiondesClientController::class, 'store'])->name('add.store');




Route::get('Deleteclient', [GestiondesClientController::class, 'delete'])->name('Deleteclient.delete');
Route::post('Deleteclient', [GestiondesClientController::class, 'Supprimer'])->name('delete.Suprimer');

Route::get('/Modifierclient', [GestiondesClientController::class, 'Update'])->name('Modifierclient.Update');
Route::post('/Modifierclient', [GestiondesClientController::class, 'Modifier'])->name('Modifierclient.Modifier');

Route::get('/Chercherclient', [GestiondesClientController::class, 'search'])->name('Chercherclient.search');
Route::post('/Chercherclient', [GestiondesClientController::class, 'Chercher'])->name('Chercherclient.Chercher');

 
Route::get('/Listerclient', [GestiondesClientController::class, 'list'])->name('Listerclient.list');
Route::post('/Listerclient', [GestiondesClientController::class, 'Lister'])->name('Listerclient.Lister');


Route::get('/index', [LoginController::class, 'index'])->name('index.index');

Route::get('/Authentification', [AuthentificationController::class, 'Authentifier'])->name('Authentification.Authentifier');


Route::get('addabonnement', [GestiondesAbonnementController::class, 'add'])->name('addabonnement.add');
Route::post('addabonnement', [GestiondesAbonnementController::class, 'store'])->name('add.store');


Route::get('/Listerabonnement', [GestiondesAbonnementController::class, 'list'])->name('Listerabonnement.list');
Route::post('/Listerabonnement', [GestiondesAbonnementController::class, 'Lister'])->name('Listerabonnement.Lister');


Route::get('/GestionController', [GestiondesClientsController::class, 'list'])->name('GestionController.list');
Route::post('/GestionController', [GestiondesClientsController::class, 'Lister'])->name('GestionController.Lister');

Route::get('addcontroller', [GestiondesClientsController::class, 'add'])->name('addcontroller.add');
Route::post('addcontroller', [GestiondesClientsController::class, 'store'])->name('add.store');

Route::get('/Modifierabonnement', [GestiondesAbonnementController::class, 'Update'])->name('Modifierabonnement.Update');
Route::post('/Modifierabonnement', [GestiondesAbonnementController::class, 'Modifier'])->name('Modifierabonnement.Modifier');
