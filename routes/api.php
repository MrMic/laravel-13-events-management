<?php

use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ______________________________________________________________________
Route::get("/user", function (Request $request) {
    return $request->user();
})->middleware("auth:sanctum");

// ______________________________________________________________________
Route::apiResource("events", EventController::class);
Route::apiResource("events.attendees", AttendeeController::class)
    ->scoped([])
    ->except(["update"]);
