<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ChoiceController;
use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SuccessController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::post('/user/password/update', [ProfileController::class, 'UserPasswordUpdate'])->name('user.password.update');

});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {

   Route::controller(HeroController::class)->group(function() {
    Route::get('/all/heroes', 'AllHeroes')->name('all.heroes');
    Route::get('/add/hero', 'AddHero')->name('add.hero');
    Route::post('/store/hero', 'StoreHero')->name('store.hero');
    Route::get('/edit/hero/{id}', 'EditHero')->name('edit.hero');
    Route::post('/update/hero', 'UpdateHero')->name('update.hero');
    Route::get('/delete/hero/{id}', 'DeleteHero')->name('delete.hero');
   });

    Route::controller(ServiceController::class)->group(function() {
    Route::get('/all/services', 'AllServices')->name('all.services');
    Route::get('/add/service', 'AddService')->name('add.service');
    Route::post('/store/service', 'StoreService')->name('store.service');
    Route::get('/edit/service/{id}', 'EditService')->name('edit.service');
    Route::post('/update/service', 'UpdateService')->name('update.service');
    Route::get('/delete/service/{id}', 'DeleteService')->name('delete.service');
   });

   Route::controller(ChoiceController::class)->group(function() {
    Route::get('/all/choices', 'AllChoices')->name('all.choices');
    Route::get('/add/choice', 'AddChoice')->name('add.choice');
    Route::post('/store/choice', 'StoreChoice')->name('store.choice');
    Route::get('/edit/choice/{id}', 'EditChoice')->name('edit.choice');
    Route::post('/update/choice', 'UpdateChoice')->name('update.choice');
    Route::get('/delete/choice/{id}', 'DeleteChoice')->name('delete.choice');
   });

   Route::controller(SuccessController::class)->group(function() {
    Route::get('/all/successes', 'AllSuccesses')->name('all.successes');
    Route::get('/add/success', 'AddSuccess')->name('add.success');
    Route::post('/store/success', 'StoreSuccess')->name('store.success');
    Route::get('/edit/success/{id}', 'EditSuccess')->name('edit.success');
    Route::post('/update/success', 'UpdateSuccess')->name('update.success');
    Route::get('/delete/success/{id}', 'DeleteSuccess')->name('delete.success');
   });

});
