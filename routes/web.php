<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', [FrontEndController::class,"index"])->name("frontend.home");
Route::get('/tryryy', [FrontEndController::class,"team"])->name("frontend.team");




Route::get("contact-form",[FrontEndController::class, "contactForm"])->name("frontend.contactForm");
Route::post("contact-form",[FrontEndController::class, "contactFormStore"])->name("frontend.contactFormStore");
Route::get("team/{slug}",[FrontEndController::class, "teamDetails"])->name("frontend.teamDetails");
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('contacts', ContactController::class);
    Route::get("contact/team-assigned",[ContactController::class, 'index'])->name("contact.team_contact");
    Route::get("contact/new-assigned",[ContactController::class, 'index'])->name("contact.new_contact");
    Route::post("contact/team-assigned",[ContactController::class, 'teamAssign'])->name("contact.team_assign");
    Route::post('team/view', [TeamController::class, 'view'])->name("teams.view");
    Route::resource('teams', TeamController::class);
    Route::resource('category',CategoryController::class);
    Route::post('team/achievement',[TeamController::class, 'achievement'])->name("team.achieve");
    Route::post('team/contact-details', [TeamController::class, 'contact_details'])->name("team.contact_details");
    Route::get('dashboard',function(){
        return view("admin.dashboard");
    })->name("dashboard");
});
Route::get("user/change_password",[App\Controllers\Auth\PasswordResetLinkController::class,"create"])->name("profile.change_password");
Route::post("contact/contact-us-form",[FrontEndController::class,'contactUsFormStore'])->name("frontend.contactUsFormStore");
require __DIR__.'/auth.php';
