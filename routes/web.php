<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\About_ratingController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AcceptanceController;
use App\Http\Controllers\Backend\AdmissionserviceController;
use App\Http\Controllers\Backend\AdmissionprocessController;
use App\Http\Controllers\Backend\AdmissionrequirementController;
use App\Http\Controllers\Backend\AdmissiontimelineController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\CardController;
use App\Http\Controllers\Backend\Cargo_faqController;
use App\Http\Controllers\Backend\CargoController;
use App\Http\Controllers\Backend\ChoiceController;
use App\Http\Controllers\Backend\ConsultationController;
use App\Http\Controllers\Backend\ContactoneController;
use App\Http\Controllers\Backend\ContacttwoController;
use App\Http\Controllers\Backend\CounselorController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\FinancialadviceController;
use App\Http\Controllers\Backend\FinancialfaqController;
use App\Http\Controllers\Backend\FinancialprocessController;
use App\Http\Controllers\Backend\FinancialrequirementController;
use App\Http\Controllers\Backend\FinancialtimelineController;
use App\Http\Controllers\Backend\FloatingbuttonController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Backend\JourneyController;
use App\Http\Controllers\Backend\LiveController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\OurpartnerController;
use App\Http\Controllers\Backend\OurserviceController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\PlatformstatController;
use App\Http\Controllers\Backend\SchoolController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\StandardController;
use App\Http\Controllers\Backend\StatementController;
use App\Http\Controllers\Backend\StudentfaqController;
use App\Http\Controllers\Backend\StudentprocessController;
use App\Http\Controllers\Backend\StudentrequirementController;
use App\Http\Controllers\Backend\StudenttimelineController;
use App\Http\Controllers\Backend\StudentvisaController;
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

    Route::controller(CardController::class)->group(function() {
    Route::get('/all/cards', 'AllCards')->name('all.cards');
    Route::get('/add/card', 'AddCard')->name('add.card');
    Route::post('/store/card', 'StoreCard')->name('store.card');
    Route::get('/edit/card/{id}', 'EditCard')->name('edit.card');
    Route::post('/update/card', 'UpdateCard')->name('update.card');
    Route::get('/delete/card/{id}', 'DeleteCard')->name('delete.card');
   });

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

    Route::controller(About_ratingController::class)->group(function() {
    Route::get('/all/about_ratings', 'AllAbout_ratings')->name('all.about_ratings');
    Route::get('/add/about_rating', 'AddAbout_rating')->name('add.about_rating');
    Route::post('/store/about_rating', 'StoreAbout_rating')->name('store.about_rating');
    Route::get('/edit/about_rating/{id}', 'EditAbout_rating')->name('edit.about_rating');
    Route::post('/update/about_rating', 'UpdateAbout_rating')->name('update.about_rating');
    Route::get('/delete/about_rating/{id}', 'DeleteAbout_rating')->name('delete.about_rating');
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

    Route::controller(OurpartnerController::class)->group(function() {
    Route::get('/all/ourpartners', 'AllOurpartners')->name('all.ourpartners');
    Route::get('/add/ourpartner', 'AddOurpartner')->name('add.ourpartner');
    Route::post('/store/ourpartner', 'StoreOurpartner')->name('store.ourpartner');
    Route::get('/edit/ourpartner/{id}', 'EditOurpartner')->name('edit.ourpartner');
    Route::post('/update/ourpartner', 'UpdateOurpartner')->name('update.ourpartner');
    Route::get('/delete/ourpartner/{id}', 'DeleteOurpartner')->name('delete.ourpartner');
   });

    Route::controller(StandardController::class)->group(function() {
    Route::get('/all/standards', 'AllStandards')->name('all.standards');
    Route::get('/add/standard', 'AddStandard')->name('add.standard');
    Route::post('/store/standard', 'StoreStandard')->name('store.standard');
    Route::get('/edit/standard/{id}', 'EditStandard')->name('edit.standard');
    Route::post('/update/standard', 'UpdateStandard')->name('update.standard');
    Route::get('/delete/standard/{id}', 'DeleteStandard')->name('delete.standard');
   });


    Route::controller(OurserviceController::class)->group(function() {
    Route::get('/all/ourservices', 'AllOurservices')->name('all.ourservices');
    Route::get('/add/ourservice', 'AddOurservice')->name('add.ourservice');
    Route::post('/store/ourservice', 'StoreOurservice')->name('store.ourservice');
    Route::get('/edit/ourservice/{id}', 'EditOurservice')->name('edit.ourservice');
    Route::post('/update/ourservice', 'UpdateOurservice')->name('update.ourservice');
    Route::get('/delete/ourservice/{id}', 'DeleteOurservice')->name('delete.ourservice');
   });

    Route::controller(AdmissionserviceController::class)->group(function() {
    Route::get('/all/admissionservices', 'AllAdmissionservices')->name('all.admissionservices');
    Route::get('/add/admissionservice', 'AddAdmissionservice')->name('add.admissionservice');
    Route::post('/store/admissionservice', 'StoreAdmissionservice')->name('store.admissionservice');
    Route::get('/edit/admissionservice/{id}', 'EditAdmissionservice')->name('edit.admissionservice');
    Route::post('/update/admissionservice', 'UpdateAdmissionservice')->name('update.admissionservice');
    Route::get('/delete/admissionservice/{id}', 'DeleteAdmissionservice')->name('delete.admissionservice');
   });

    Route::controller(AdmissionprocessController::class)->group(function() {
    Route::get('/all/admissionprocesses', 'AllAdmissionprocesses')->name('all.admissionprocesses');
    Route::get('/add/admissionprocess', 'AddAdmissionprocess')->name('add.admissionprocess');
    Route::post('/store/admissionprocess', 'StoreAdmissionprocess')->name('store.admissionprocess');
    Route::get('/edit/admissionprocess/{id}', 'EditAdmissionprocess')->name('edit.admissionprocess');
    Route::post('/update/admissionprocess', 'UpdateAdmissionprocess')->name('update.admissionprocess');
    Route::get('/delete/admissionprocess/{id}', 'DeleteAdmissionprocess')->name('delete.admissionprocess');
   });


   Route::controller(FaqController::class)->group(function() {
    Route::get('/all/faqs', 'AllFaqs')->name('all.faqs');
    Route::get('/add/faq', 'AddFaq')->name('add.faq');
    Route::post('/store/faq', 'StoreFaq')->name('store.faq');
    Route::get('/edit/faq/{id}', 'EditFaq')->name('edit.faq');
    Route::post('/update/faq', 'UpdateFaq')->name('update.faq');
    Route::get('/delete/faq/{id}', 'DeleteFaq')->name('delete.faq');
   });

   Route::controller(AdmissionrequirementController::class)->group(function() {
    Route::get('/all/admissionrequirements', 'AllAdmissionrequirements')->name('all.admissionrequirements');
    Route::get('/add/admissionrequirement', 'AddAdmissionrequirement')->name('add.admissionrequirement');
    Route::post('/store/admissionrequirement', 'StoreAdmissionrequirement')->name('store.admissionrequirement');
    Route::get('/edit/admissionrequirement/{id}', 'EditAdmissionrequirement')->name('edit.admissionrequirement');
    Route::post('/update/admissionrequirement', 'UpdateAdmissionrequirement')->name('update.admissionrequirement');
    Route::get('/delete/admissionrequirement/{id}', 'DeleteAdmissionrequirement')->name('delete.admissionrequirement');
   });


   Route::controller(AdmissiontimelineController::class)->group(function() {
    Route::get('/all/admissiontimelines', 'AllAdmissiontimelines')->name('all.admissiontimelines');
    Route::get('/add/admissiontimeline', 'AddAdmissiontimeline')->name('add.admissiontimeline');
    Route::post('/store/admissiontimeline', 'StoreAdmissiontimeline')->name('store.admissiontimeline');
    Route::get('/edit/admissiontimeline/{id}', 'EditAdmissiontimeline')->name('edit.admissiontimeline');
    Route::post('/update/admissiontimeline', 'UpdateAdmissiontimeline')->name('update.admissiontimeline');
    Route::get('/delete/admissiontimeline/{id}', 'DeleteAdmissiontimeline')->name('delete.admissiontimeline');
   });

    Route::controller(FinancialadviceController::class)->group(function() {
    Route::get('/all/financialadvice', 'AllFinancialadvice')->name('all.financialadvice');
    Route::get('/add/financialadvice', 'AddFinancialadvice')->name('add.financialadvice');
    Route::post('/store/financialadvice', 'StoreFinancialadvice')->name('store.financialadvice');
    Route::get('/edit/financialadvice/{id}', 'EditFinancialadvice')->name('edit.financialadvice');
    Route::post('/update/financialadvice', 'UpdateFinancialadvice')->name('update.financialadvice');
    Route::get('/delete/financialadvice/{id}', 'DeleteFinancialadvice')->name('delete.financialadvice');
   });

    Route::controller(FinancialprocessController::class)->group(function() {
    Route::get('/all/financialprocesses', 'AllFinancialprocesses')->name('all.financialprocesses');
    Route::get('/add/financialprocess', 'AddFinancialprocess')->name('add.financialprocess');
    Route::post('/store/financialprocess', 'StoreFinancialprocess')->name('store.financialprocess');
    Route::get('/edit/financialprocess/{id}', 'EditFinancialprocess')->name('edit.financialprocess');
    Route::post('/update/financialprocess', 'UpdateFinancialprocess')->name('update.financialprocess');
    Route::get('/delete/financialprocess/{id}', 'DeleteFinancialprocess')->name('delete.financialprocess');
   });

    Route::controller(FinancialrequirementController::class)->group(function() {
    Route::get('/all/financialrequirements', 'AllFinancialrequirements')->name('all.financialrequirements');
    Route::get('/add/financialrequirement', 'AddFinancialrequirement')->name('add.financialrequirement');
    Route::post('/store/financialrequirement', 'StoreFinancialrequirement')->name('store.financialrequirement');
    Route::get('/edit/financialrequirement/{id}', 'EditFinancialrequirement')->name('edit.financialrequirement');
    Route::post('/update/financialrequirement', 'UpdateFinancialrequirement')->name('update.financialrequirement');
    Route::get('/delete/financialrequirement/{id}', 'DeleteFinancialrequirement')->name('delete.financialrequirement');
   });

    Route::controller(FinancialtimelineController::class)->group(function() {
    Route::get('/all/financialtimelines', 'AllFinancialtimelines')->name('all.financialtimelines');
    Route::get('/add/financialtimeline', 'AddFinancialtimeline')->name('add.financialtimeline');
    Route::post('/store/financialtimeline', 'StoreFinancialtimeline')->name('store.financialtimeline');
    Route::get('/edit/financialtimeline/{id}', 'EditFinancialtimeline')->name('edit.financialtimeline');
    Route::post('/update/financialtimeline', 'UpdateFinancialtimeline')->name('update.financialtimeline');
    Route::get('/delete/financialtimeline/{id}', 'DeleteFinancialtimeline')->name('delete.financialtimeline');
   });

    Route::controller(FinancialfaqController::class)->group(function() {
    Route::get('/all/financialfaqs', 'AllFinancialfaqs')->name('all.financialfaqs');
    Route::get('/add/financialfaq', 'AddFinancialfaq')->name('add.financialfaq');
    Route::post('/store/financialfaq', 'StoreFinancialfaq')->name('store.financialfaq');
    Route::get('/edit/financialfaq/{id}', 'EditFinancialfaq')->name('edit.financialfaq');
    Route::post('/update/financialfaq', 'UpdateFinancialfaq')->name('update.financialfaq');
    Route::get('/delete/financialfaq/{id}', 'DeleteFinancialfaq')->name('delete.financialfaq');
   });

   Route::controller(StudentvisaController::class)->group(function() {
    Route::get('/all/studentvisas', 'AllStudentvisas')->name('all.studentvisas');
    Route::get('/add/studentvisa', 'AddStudentvisa')->name('add.studentvisa');
    Route::post('/store/studentvisa', 'StoreStudentvisa')->name('store.studentvisa');
    Route::get('/edit/studentvisa/{id}', 'EditStudentvisa')->name('edit.studentvisa');
    Route::post('/update/studentvisa', 'UpdateStudentvisa')->name('update.studentvisa');
    Route::get('/delete/studentvisa/{id}', 'DeleteStudentvisa')->name('delete.studentvisa');
   });

    Route::controller(StudentprocessController::class)->group(function() {
    Route::get('/all/studentprocesses', 'AllStudentprocesses')->name('all.studentprocesses');
    Route::get('/add/studentprocess', 'AddStudentprocess')->name('add.studentprocess');
    Route::post('/store/studentprocess', 'StoreStudentprocess')->name('store.studentprocess');
    Route::get('/edit/studentprocess/{id}', 'EditStudentprocess')->name('edit.studentprocess');
    Route::post('/update/studentprocess', 'UpdateStudentprocess')->name('update.studentprocess');
    Route::get('/delete/studentprocess/{id}', 'DeleteStudentprocess')->name('delete.studentprocess');
   });

   Route::controller(StudenttimelineController::class)->group(function() {
    Route::get('/all/studenttimelines', 'AllStudenttimelines')->name('all.studenttimelines');
    Route::get('/add/studenttimeline', 'AddStudenttimeline')->name('add.studenttimeline');
    Route::post('/store/studenttimeline', 'StoreStudenttimeline')->name('store.studenttimeline');
    Route::get('/edit/studenttimeline/{id}', 'EditStudenttimeline')->name('edit.studenttimeline');
    Route::post('/update/studenttimeline', 'UpdateStudenttimeline')->name('update.studenttimeline');
    Route::get('/delete/studenttimeline/{id}', 'DeleteStudenttimeline')->name('delete.studenttimeline');
   });

    Route::controller(SchoolController::class)->group(function() {
    Route::get('/all/schools', 'AllSchools')->name('all.schools');
    Route::get('/add/school', 'AddSchool')->name('add.school');
    Route::post('/store/school', 'StoreSchool')->name('store.school');
    Route::get('/edit/school/{id}', 'EditSchool')->name('edit.school');
    Route::post('/update/school', 'UpdateSchool')->name('update.school');
    Route::get('/delete/school/{id}', 'DeleteSchool')->name('delete.school');
   });

    Route::controller(FloatingbuttonController::class)->group(function() {
    Route::get('/all/floatingbuttons', 'AllFloatingbuttons')->name('all.floatingbuttons');
    Route::get('/add/floatingbutton', 'AddFloatingbutton')->name('add.floatingbutton');
    Route::post('/store/floatingbutton', 'StoreFloatingbutton')->name('store.floatingbutton');
    Route::get('/edit/floatingbutton/{id}', 'EditFloatingbutton')->name('edit.floatingbutton');
    Route::post('/update/floatingbutton', 'UpdateFloatingbutton')->name('update.floatingbutton');
    Route::get('/delete/floatingbutton/{id}', 'DeleteFloatingbutton')->name('delete.floatingbutton');
   });

   Route::controller(StudentrequirementController::class)->group(function() {
    Route::get('/all/studentrequirements', 'AllStudentrequirements')->name('all.studentrequirements');
    Route::get('/add/studentrequirement', 'AddStudentrequirement')->name('add.studentrequirement');
    Route::post('/store/studentrequirement', 'StoreStudentrequirement')->name('store.studentrequirement');
    Route::get('/edit/studentrequirement/{id}', 'EditStudentrequirement')->name('edit.studentrequirement');
    Route::post('/update/studentrequirement', 'UpdateStudentrequirement')->name('update.studentrequirement');
    Route::get('/delete/studentrequirement/{id}', 'DeleteStudentrequirement')->name('delete.studentrequirement');
   });

   Route::controller(StudentfaqController::class)->group(function() {
    Route::get('/all/studentfaqs', 'AllStudentfaqs')->name('all.studentfaqs');
    Route::get('/add/studentfaq', 'AddStudentfaq')->name('add.studentfaq');
    Route::post('/store/studentfaq', 'StoreStudentfaq')->name('store.studentfaq');
    Route::get('/edit/studentfaq/{id}', 'EditStudentfaq')->name('edit.studentfaq');
    Route::post('/update/studentfaq', 'UpdateStudentfaq')->name('update.studentfaq');
    Route::get('/delete/studentfaq/{id}', 'DeleteStudentfaq')->name('delete.studentfaq');
   });

    Route::controller(CargoController::class)->group(function() {
    Route::get('/all/cargoes', 'AllCargoes')->name('all.cargoes');
    Route::get('/add/cargo', 'AddCargo')->name('add.cargo');
    Route::post('/store/cargo', 'StoreCargo')->name('store.cargo');
    Route::get('/edit/cargo/{id}', 'EditCargo')->name('edit.cargo');
    Route::post('/update/cargo', 'UpdateCargo')->name('update.cargo');
    Route::get('/delete/cargo/{id}', 'DeleteCargo')->name('delete.cargo');
   });

    Route::controller(Cargo_faqController::class)->group(function() {
    Route::get('/all/cargo_faqs', 'AllCargoFaqs')->name('all.cargo_faqs');
    Route::get('/add/cargo_faq', 'AddCargoFaq')->name('add.cargo_faq');
    Route::post('/store/cargo_faq', 'StoreCargoFaq')->name('store.cargo_faq');
    Route::get('/edit/cargo_faq/{id}', 'EditCargoFaq')->name('edit.cargo_faq');
    Route::post('/update/cargo_faq', 'UpdateCargoFaq')->name('update.cargo_faq');
    Route::get('/delete/cargo_faq/{id}', 'DeleteCargoFaq')->name('delete.cargo_faq');
   });

    Route::controller(ContactoneController::class)->group(function() {
    Route::get('/all/contactone', 'AllContactone')->name('all.contactone');
    Route::get('/add/contactone', 'AddContactone')->name('add.contactone');
    Route::post('/store/contactone', 'StoreContactone')->name('store.contactone');
    Route::get('/edit/contactone/{id}', 'EditContactone')->name('edit.contactone');
    Route::post('/update/contactone', 'UpdateContactone')->name('update.contactone');
    Route::get('/delete/contactone/{id}', 'DeleteContactone')->name('delete.contactone');
   });

    Route::controller(ContacttwoController::class)->group(function() {
    Route::get('/all/contacttwo', 'AllContacttwo')->name('all.contacttwo');
    Route::get('/add/contacttwo', 'AddContacttwo')->name('add.contacttwo');
    Route::post('/store/contacttwo', 'StoreContacttwo')->name('store.contacttwo');
    Route::get('/edit/contacttwo/{id}', 'EditContacttwo')->name('edit.contacttwo');
    Route::post('/update/contacttwo', 'UpdateContacttwo')->name('update.contacttwo');
    Route::get('/delete/contacttwo/{id}', 'DeleteContacttwo')->name('delete.contacttwo');
   });

    Route::controller(MessageController::class)->group(function() {
        Route::get('/message', 'Message')->name('message');
   });

   Route::controller(CounselorController::class)->group(function() {
    Route::get('/all/counselors', 'AllCounselors')->name('all.counselors');
    Route::get('/add/counselor', 'AddCounselor')->name('add.counselor');
    Route::post('/store/counselor', 'StoreCounselor')->name('store.counselor');
    Route::get('/edit/counselor/{id}', 'EditCounselor')->name('edit.counselor');
    Route::post('/update/counselor', 'UpdateCounselor')->name('update.counselor');
    Route::get('/delete/counselor/{id}', 'DeleteCounselor')->name('delete.counselor');
   });

   Route::controller(PlatformstatController::class)->group(function() {
    Route::get('/all/platformstats', 'AllPlatformstats')->name('all.platformstats');
    Route::get('/add/platformstat', 'AddPlatformstat')->name('add.platformstat');
    Route::post('/store/platformstat', 'StorePlatformstat')->name('store.platformstat');
    Route::get('/edit/platformstat/{id}', 'EditPlatformstat')->name('edit.platformstat');
    Route::post('/update/platformstat', 'UpdatePlatformstat')->name('update.platformstat');
    Route::get('/delete/platformstat/{id}', 'DeletePlatformstat')->name('delete.platformstat');
   });

    Route::controller(BookingController::class)->group(function() {
        Route::get('/booking', 'Booking')->name('booking');
   });


});
