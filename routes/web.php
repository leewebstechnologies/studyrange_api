<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AcceptanceController;
use App\Http\Controllers\Backend\CargoController;
use App\Http\Controllers\Backend\ChoiceController;
use App\Http\Controllers\Backend\ConsultationController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Backend\JourneyController;
use App\Http\Controllers\Backend\LiveController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\StatementController;
use App\Http\Controllers\Backend\SuccessController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\ValueController;
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

   Route::controller(SocialController::class)->group(function() {
    Route::get('/all/socials', 'AllSocials')->name('all.socials');
    Route::get('/add/social', 'AddSocial')->name('add.social');
    Route::post('/store/social', 'StoreSocial')->name('store.social');
    Route::get('/edit/social/{id}', 'EditSocial')->name('edit.social');
    Route::post('/update/social', 'UpdateSocial')->name('update.social');
    Route::get('/delete/social/{id}', 'DeleteSocial')->name('delete.social');
   });

   Route::controller(AboutController::class)->group(function() {
    Route::get('/all/about', 'AllAbout')->name('all.about');
    Route::get('/add/about', 'AddAbout')->name('add.about');
    Route::post('/store/about', 'StoreAbout')->name('store.about');
    Route::get('/edit/about/{id}', 'EditAbout')->name('edit.about');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');
    Route::get('/delete/about/{id}', 'DeleteAbout')->name('delete.about');
   });

   Route::controller(StatementController::class)->group(function() {
    Route::get('/all/statements', 'AllStatements')->name('all.statements');
    Route::get('/add/statement', 'AddStatement')->name('add.statement');
    Route::post('/store/statement', 'StoreStatement')->name('store.statement');
    Route::get('/edit/statement/{id}', 'EditStatement')->name('edit.statement');
    Route::post('/update/statement', 'UpdateStatement')->name('update.statement');
    Route::get('/delete/statement/{id}', 'DeleteStatement')->name('delete.statement');
   });

    Route::controller(ValueController::class)->group(function() {
    Route::get('/all/values', 'AllValues')->name('all.values');
    Route::get('/add/value', 'AddValue')->name('add.value');
    Route::post('/store/value', 'StoreValue')->name('store.value');
    Route::get('/edit/value/{id}', 'EditValue')->name('edit.value');
    Route::post('/update/value', 'UpdateValue')->name('update.value');
    Route::get('/delete/value/{id}', 'DeleteValue')->name('delete.value');
   });

    Route::controller(TeamController::class)->group(function() {
    Route::get('/all/teams', 'AllTeams')->name('all.teams');
    Route::get('/add/team', 'AddTeam')->name('add.team');
    Route::post('/store/team', 'StoreTeam')->name('store.team');
    Route::get('/edit/team/{id}', 'EditTeam')->name('edit.team');
    Route::post('/update/team', 'UpdateTeam')->name('update.team');
    Route::get('/delete/team/{id}', 'DeleteTeam')->name('delete.team');
   });

    Route::controller(JourneyController::class)->group(function() {
    Route::get('/all/journeys', 'AllJourneys')->name('all.journeys');
    Route::get('/add/journey', 'AddJourney')->name('add.journey');
    Route::post('/store/journey', 'StoreJourney')->name('store.journey');
    Route::get('/edit/journey/{id}', 'EditJourney')->name('edit.journey');
    Route::post('/update/journey', 'UpdateJourney')->name('update.journey');
    Route::get('/delete/journey/{id}', 'DeleteJourney')->name('delete.journey');
   });

   Route::controller(FaqController::class)->group(function() {
    Route::get('/all/faqs', 'AllFaqs')->name('all.faqs');
    Route::get('/add/faq', 'AddFaq')->name('add.faq');
    Route::post('/store/faq', 'StoreFaq')->name('store.faq');
    Route::get('/edit/faq/{id}', 'EditFaq')->name('edit.faq');
    Route::post('/update/faq', 'UpdateFaq')->name('update.faq');
    Route::get('/delete/faq/{id}', 'DeleteFaq')->name('delete.faq');
   });

    Route::controller(CargoController::class)->group(function() {
    Route::get('/all/cargoes', 'AllCargoes')->name('all.cargoes');
    Route::get('/add/cargo', 'AddCargo')->name('add.cargo');
    Route::post('/store/cargo', 'StoreCargo')->name('store.cargo');
    Route::get('/edit/cargo/{id}', 'EditCargo')->name('edit.cargo');
    Route::post('/update/cargo', 'UpdateCargo')->name('update.cargo');
    Route::get('/delete/cargo/{id}', 'DeleteCargo')->name('delete.cargo');
   });


});
