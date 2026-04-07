<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AcceptanceController;
use App\Http\Controllers\Backend\ChoiceController;
use App\Http\Controllers\Backend\ConsultationController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Backend\LiveController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SuccessController;
use App\Http\Controllers\Backend\WeekController;
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

    Route::controller(LiveController::class)->group(function() {
    Route::get('/all/lives', 'AllLives')->name('all.lives');
    Route::get('/add/live', 'AddLive')->name('add.live');
    Route::post('/store/live', 'StoreLive')->name('store.live');
    Route::get('/edit/live/{id}', 'EditLive')->name('edit.live');
    Route::post('/update/live', 'UpdateLive')->name('update.live');
    Route::get('/delete/live/{id}', 'DeleteLive')->name('delete.live');
   });

   Route::controller(PartnerController::class)->group(function() {
    Route::get('/all/partners', 'AllPartners')->name('all.partners');
    Route::get('/add/partner', 'AddPartner')->name('add.partner');
    Route::post('/store/partner', 'StorePartner')->name('store.partner');
    Route::get('/edit/partner/{id}', 'EditPartner')->name('edit.partner');
    Route::post('/update/partner', 'UpdatePartner')->name('update.partner');
    Route::get('/delete/partner/{id}', 'DeletePartner')->name('delete.partner');
   });

    Route::controller(AcceptanceController::class)->group(function() {
    Route::get('/all/acceptances', 'AllAcceptances')->name('all.acceptances');
    Route::get('/add/acceptance', 'AddAcceptance')->name('add.acceptance');
    Route::post('/store/acceptance', 'StoreAcceptance')->name('store.acceptance');
    Route::get('/edit/acceptance/{id}', 'EditAcceptance')->name('edit.acceptance');
    Route::post('/update/acceptance', 'UpdateAcceptance')->name('update.acceptance');
    Route::get('/delete/acceptance/{id}', 'DeleteAcceptance')->name('delete.acceptance');
   });

    Route::controller(WeekController::class)->group(function() {
    Route::get('/all/weeks', 'AllWeeks')->name('all.weeks');
    Route::get('/add/week', 'AddWeek')->name('add.week');
    Route::post('/store/week', 'StoreWeek')->name('store.week');
    Route::get('/edit/week/{id}', 'EditWeek')->name('edit.week');
    Route::post('/update/week', 'UpdateWeek')->name('update.week');
    Route::get('/delete/week/{id}', 'DeleteWeek')->name('delete.week');
   });

   Route::controller(ConsultationController::class)->group(function() {
    Route::get('/all/consultations', 'AllConsultations')->name('all.consultations');
    Route::get('/add/consultation', 'AddConsultation')->name('add.consultation');
    Route::post('/store/consultation', 'StoreConsultation')->name('store.consultation');
    Route::get('/edit/consultation/{id}', 'EditConsultation')->name('edit.consultation');
    Route::post('/update/consultation', 'UpdateConsultation')->name('update.consultation');
    Route::get('/delete/consultation/{id}', 'DeleteConsultation')->name('delete.consultation');
   });

   Route::controller(FooterController::class)->group(function() {
    Route::get('/all/footers', 'AllFooters')->name('all.footers');
    Route::get('/add/footer', 'AddFooter')->name('add.footer');
    Route::post('/store/footer', 'StoreFooter')->name('store.footer');
    Route::get('/edit/footer/{id}', 'EditFooter')->name('edit.footer');
    Route::post('/update/footer', 'UpdateFooter')->name('update.footer');
    Route::get('/delete/footer/{id}', 'DeleteFooter')->name('delete.footer');
   });


});
