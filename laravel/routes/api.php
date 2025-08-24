<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{SessionController,ReactionController,MemoryController,AnalysisController};

Route::get('/health', fn () => response()->json(['ok' => true]));

// Public read 
Route::get('/sessions/{session}', [SessionController::class, 'show']);
Route::get('/sessions/{session}/results', [SessionController::class, 'results']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/sessions', [SessionController::class, 'store']);
    Route::post('/sessions/{session}/reactions', [ReactionController::class, 'store']);
    Route::post('/sessions/{session}/memories',  [MemoryController::class, 'store']);
    Route::get('/sessions/{session}/summary', [SessionController::class, 'summary']);
    Route::get('/sessions/{session}/export.csv', [SessionController::class, 'export']);
    Route::post('/analyze', [AnalysisController::class, 'analyze']);
});
