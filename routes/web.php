<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SignalerController;
use App\Http\Controllers\PavillonController;
use App\Http\Controllers\ProblemeController;
use App\Http\Controllers\BontravailPDFController;
use App\Http\Controllers\FicheInterventionController;
use App\Http\Controllers\FacturesController;
use App\Http\Controllers\FicheInterventionPDFController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use Barryvdh\DomPDF\Facade\Pdf;

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


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
   ;
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
   
Route::middleware('can:manage-app')->group(function () {
    Route::resource('/admin/users', UsersController::class);
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
});

Route::middleware('can:manage-app')->group(function () {
    Route::get('/signalerIndex', [SignalerController::class, 'index'])->name('Signaler.index');
    Route::get('/signalerEdit', [SignalerController::class, 'edit'])->name('Signaler.edit');
    Route::put('/signalerUpdate', [SignalerController::class, 'update'])->name('Signaler.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/pavillonIndex', [PavillonController::class, 'index'])->name('pavillon.index');
    Route::get('/pavillonCreate', [PavillonController::class, 'create'])->name('pavillon.create');
    Route::post('/pavillonAdd', [PavillonController::class, 'store'])->name('pavillon.add');
    Route::get('/pavillon/{id}/Edit', [PavillonController::class, 'edit'])->name('pavillon.edit');
    Route::put('/pavillon/{id}/Update', [PavillonController::class, 'update'])->name('pavillon.update');
    Route::delete('/pavillon/{id}/Delete', [PavillonController::class, 'destroy'])->name('pavillon.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/problemeCreate', [ProblemeController::class, 'create'])->name('probleme.create');
    Route::get('/problemeIndex', [ProblemeController::class, 'index'])->name('probleme.index');
    Route::post('/problemeAdd', [ProblemeController::class, 'store'])->name('probleme.add');
    Route::get('/probleme/{id}/Edit', [ProblemeController::class, 'edit'])->name('probleme.edit');
    Route::put('/probleme/{id}/Update', [ProblemeController::class, 'update'])->name('probleme.update');

    Route::delete('/probleme/{id}/delete', [ProblemeController::class, 'destroy'])->name('probleme.destroy');
    Route::post('/update-etat', [ProblemeController::class, 'updateEtat'])->name('probleme.update.etat');

}); 

Route::get('/pdf/{id}',[BontravailPDFController::class, 'index'])->name('pdf.bontravail');
Route::get('/pdf/{id}/fiche',[FicheInterventionPDFController::class, 'index'])->name('pdf.FicheInterventionPDF');


Route::middleware('auth')->group(function () {
    Route::get('/ficheinterventionIndex', [FicheInterventionController::class, 'index'])->name('ficheintervention.index');
    Route::get('/ficheinterventionCreate', [FicheInterventionController::class, 'create'])->name('ficheintervention.create');
    Route::post('/ficheinterventionAdd', [FicheInterventionController::class, 'store'])->name('ficheintervention.add');
    Route::get('/ficheintervention/{id}/Edit', [FicheInterventionController::class, 'edit'])->name('ficheintervention.edit');
    Route::put('/ficheintervention/{id}/Update', [FicheInterventionController::class, 'update'])->name('ficheintervention.update');
    Route::delete('/ficheintervention/{id}/destroy', [FicheInterventionController::class, 'destroy'])->name('ficheintervention.destroy');
    
}); 

Route::middleware('auth')->group(function () {
    Route::get('/FacturesIndex', [FacturesController::class, 'index'])->name('Factures.index');
    Route::get('/FacturesCreate', [FacturesController::class, 'create'])->name('Factures.create');
    Route::post('/FacturesAdd', [FacturesController::class, 'store'])->name('Factures.add');
    Route::get('/Factures/{id}/Edit', [FacturesController::class, 'edit'])->name('Factures.edit');
    Route::put('/Factures/{id}/Update', [FacturesController::class, 'update'])->name('Factures.update');
    Route::delete('/Factures/{id}/delete', [FacturesController::class, 'destroy'])->name('Factures.destroy');
}); 

//notification
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/notifications/markAsRead', [DashboardController::class, 'markAsRead'])->name('notifications.markAsRead');
Route::post('/notifications/mark-as-read', [DashboardController::class, 'markAsRead'])->name('notifications.markAsRead');

Route::post('/notifications/{id}/markAsRead', [NotificationController::class, 'markAsRead']);
Route::post('/notifications/markAllAsRead', [NotificationController::class, 'markAllAsRead']);




   
require __DIR__.'/auth.php';
