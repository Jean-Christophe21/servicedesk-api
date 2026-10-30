<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\DemandeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('demandes', [DemandeController::class, 'index']);
    Route::get('demandes/{id}', [DemandeController::class, 'show']);
    Route::post('demandes', [DemandeController::class, 'create']);
    Route::match(['put', 'patch'], 'demandes/{id}', [DemandeController::class, 'update']);
    Route::match(['put', 'patch'], 'demandes/{id}/status', [DemandeController::class, 'updateStatus']);
    Route::put('demandes/{demandeId}/assign', [DemandeController::class, 'assign']);

    Route::get('demandes/{demandeId}/comments', [CommentaireController::class, 'listDemandeComments']);
    Route::post('demandes/{demandeId}/comments', [CommentaireController::class, 'createComment']);
    Route::match(['put', 'patch'], 'demandes/{demandeId}/comments/{commentaireId}', [CommentaireController::class, 'updateComment']);
    Route::get('demandes/{demandeId}/comments/{commentaireId}', [CommentaireController::class, 'getComment']);
});

