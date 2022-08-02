<?php

use App\Http\Controllers\API\FamilyMemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(FamilyMemberController::class)->prefix("family-member/")->as("family-member.")->group(function () {
    Route::get("/", "index")->name("index");
    Route::post("/", "store")->name("store");
    Route::get("/{id}", "show")->name("show");
    Route::get("/{id}/parent-siblings", "parentSiblings")->name("parent-siblings");
    Route::get("/{id}/cousins", "cousins")->name("cousins");
    Route::get("/{id}/children", "children")->name("children");
    Route::get("/{id}/grand-children", "grandChildren")->name("grand-children");
    Route::put("/{id}", "update")->name("update");
    Route::delete("/{id}", "destroy")->name("destroy");
});
