<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SessionController;
use App\Http\Controllers\Api\ReactionController;
use App\Http\Controllers\Api\MemoryController;
use App\Http\Controllers\Api\AnalysisController;

Route::get('/health', fn () => response()->json(['ok' => true]));

Route::post('/sessions', [SessionController::class, 'store']);
Route::get('/sessions/{session}', [SessionController::class, 'show']);
Route::get('/sessions/{session}/results', [SessionController::class, 'results']);

Route::post('/sessions/{session}/reactions', [ReactionController::class, 'store']);
Route::post('/sessions/{session}/memories',  [MemoryController::class, 'store']);

Route::post('/analyze', [AnalysisController::class, 'analyze']);