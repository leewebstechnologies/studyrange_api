<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AcceptanceController;
use App\Http\Controllers\Backend\Cargo_faqController;
use App\Http\Controllers\Backend\CargoController;
use App\Http\Controllers\Backend\ChoiceController;
use App\Http\Controllers\Backend\ConsultationController;
use App\Http\Controllers\Backend\ContactoneController;
use App\Http\Controllers\Backend\ContacttwoController;
use App\Http\Controllers\Backend\CounselorController;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// APIs
Route::get('/hero', [HeroController::class, 'ApiAllHeroes']);
Route::get('/consultation', [ConsultationController::class, 'ApiAllConsultations']);
Route::get('/service', [ServiceController::class, 'ApiAllServices']);
Route::get('/choice', [ChoiceController::class, 'ApiAllChoices']);
Route::get('/success', [SuccessController::class, 'ApiAllSuccesses']);
Route::get('/live', [LiveController::class, 'ApiAllLives']);
Route::get('/partner', [PartnerController::class, 'ApiAllPartners']);
Route::get('/acceptance', [AcceptanceController::class, 'ApiAllAcceptances']);
Route::get('/week', [WeekController::class, 'ApiAllWeeks']);
Route::get('/footer', [FooterController::class, 'ApiAllFooters']);
Route::get('/social', [SocialController::class, 'ApiAllSocials']);
Route::get('/about', [AboutController::class, 'ApiAllAbout']);
Route::get('/statement', [StatementController::class, 'ApiAllStatements']);
Route::get('/value', [ValueController::class, 'ApiAllValues']);
Route::get('/team', [TeamController::class, 'ApiAllTeams']);
Route::get('/journey', [JourneyController::class, 'ApiAllJourneys']);
Route::get('/faq', [FaqController::class, 'ApiAllFaqs']);
Route::get('/cargo', [CargoController::class, 'ApiAllCargoes']);
Route::get('/cargo_faq', [Cargo_faqController::class, 'ApiAllCargoFaqs']);
Route::get('/contactone', [ContactoneController::class, 'ApiAllContactOne']);
Route::get('/contacttwo', [ContacttwoController::class, 'ApiAllContactTwo']);
Route::get('/counselor', [CounselorController::class, 'ApiAllCounselors']);
