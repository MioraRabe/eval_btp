<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\TravauxController;
use App\Http\Controllers\TypefinitionController;


Route::get('/', function () {
    return view('client/login');
});

Route::get('/admin', function () {
    return view('auth/login');
});
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::post('clientLogin', 'clientLoginAction')->name('client.login');
    Route::get('clientLogout', 'clientLogout')->name('client.logout');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    // Route::get('dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
 
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
        Route::get('truncate', 'truncateTable')->name('products.truncate');

    });
 
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});

// Route::get('/devis', function () {
//     return view('client/devis/index');
// })->name('devis');  

Route::controller(DevisController::class)->prefix('devis')->group(function () {
    Route::get('', 'index')->name('devis');
    Route::get('list', 'adminindex')->name('admin.devis');
    Route::get('details/{id}', 'details')->name('devis.details');
    Route::get('create', 'create')->name('devis.create');
    Route::post('store', 'store')->name('devis.store');
    Route::get('exportPdf/{id}', 'export')->name('devis.pdf');
    Route::get('paiement/{id}', 'paiement')->name('devis.paiement');
});


Route::controller(PaiementController::class)->prefix('paiement')->group(function () {
    Route::post('store', 'store')->name('paiement.store');
});

Route::controller(StatController::class)->prefix('dashboard')->group(function () {
    Route::get('', 'index')->name('dashboards');
    Route::get('montant-par-mois', 'getMontantParMois')->name('MontantParMois');
});

// Route::get('/montant-devis/montant-par-mois', [MontantDevisController::class, 'getMontantParMois'])->name('MontantParMois');




Route::controller(ImportController::class)->group(function () {
    Route::get('import', 'import')->name('import.import');
    Route::get('importpaiement', 'importpaiement')->name('import.importpaiement');
    Route::post('store', 'store')->name('import.store');
    Route::post('storePaiement', 'storePaiement')->name('import.storePaiement');
});

Route::get('/reinitialize', [DevisController::class, 'truncate'])->name('truncate');

// Route::resource('travauxes', 'TravauxController');
Route::controller(TravauxController::class)->prefix('travaux')->group(function () {
    Route::get('', 'index')->name('travauxes.index');
    Route::get('create', 'create')->name('travauxes.create');
    Route::post('store', 'store')->name('travauxes.store');
    Route::get('show/{id}', 'show')->name('travauxes.show');
    Route::get('edit/{id}', 'edit')->name('travauxes.edit');
    Route::put('edit/{id}', 'update')->name('travauxes.update');
    Route::delete('destroy/{id}', 'destroy')->name('travauxes.destroy');
});

Route::controller(TypefinitionController::class)->prefix('typefinitions')->group(function () {
    Route::get('', 'index')->name('typefinitions.index');
    Route::get('show/{id}', 'show')->name('typefinitions.show');
    Route::get('edit/{id}', 'edit')->name('typefinitions.edit');
    Route::put('update/{id}', 'update')->name('typefinitions.update');
});
// Route::prefix('typefinitions')->group(function () {
//     Route::get('', 'TypefinitionController@index')->name('typefinitions.index');
//     Route::get('show/{id}', 'TypefinitionController@show')->name('typefinitions.show');
//     Route::get('edit/{id}', 'TypefinitionController@edit')->name('typefinitions.edit');
//     Route::put('update/{id}', 'TypefinitionController@update')->name('typefinitions.update');
// });
