<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\portfolioController;

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

Route::get('/',  [portfolioController::class, "index"])->name("home");
Route::get("/whoami", [portfolioController::class, "whoami"])->name("whoami");
Route::get("/skills", [portfolioController::class, "skills"])->name("skills");
Route::get("/works", [portfolioController::class, "works"]);
Route::get("/getintouch", [portfolioController::class, "contact"])->name("getintouch");
Route::post("/send", [portfolioController::class, "storeMessage"]);
Route::get("/signin", [adminController::class, "signin"]);
Route::post("/signin", [adminController::class, "authenticate"])->name("login");
Route::get("/dashboard",  [adminController::class, "admin"])->middleware("auth");
Route::get("/edit/whoami",  [adminController::class, "editwhoami"])->middleware("auth");
Route::put("/edit/updateWhoami", [adminController::class, "updateWhoami"])->middleware("auth");
Route::get("/create/skill", [adminController::class, "createSkill"])->middleware("auth");
Route::post("/create/skill", [adminController::class, "saveSkill"])->middleware("auth");
Route::put("/edit/skill/{id}", [adminController::class, "updateSkill"])->middleware("auth")->where('id', '[0-9]+');
Route::get("/edit/skill/{id}", [adminController::class, "editSkill"])->middleware("auth")->where("id", '[0-9]+');
Route::get("/edit/skills",  [adminController::class, "editSkills"])->middleware("auth");
Route::delete("/delete/skill/{id}", [adminController::class, "deleteSkill"])->middleware("auth")->where('id', '[0-9]+');
Route::post("/create/work", [adminController::class, "createWork"])->middleware("auth");
Route::get("/edit/works", [adminController::class, "editWorks"])->middleware("auth");
Route::put("/edit/work/{id}", [adminController::class, "editWork"])->middleware("auth")->where("id", "[0-9]+");
Route::delete("/delete/work/{id}", [adminController::class, "deleteWork"])->middleware("auth")->where("id", "[0-9]+");
Route::get("/logout", [adminController::class, "logout"])->middleware("auth");
Route::post("/logout", [adminController::class, "logout"])->middleware("auth");


Route::get("/insertUser", [portfolioController::class, "insertUser"]);
Route::get("/insertBio", [portfolioController::class, "insertBio"]);
Route::get("/insertSkill", [portfolioController::class, "insertSkill"]);
Route::get("/insertImage", [portfolioController::class, "insertImage"]);