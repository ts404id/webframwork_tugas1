<?php
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
Route::get('/', [TeamController::class, 'index'])->name('home');
Route::get('/anggota/{slug}', [TeamController::class, 'show'])
    ->where('slug', '[a-z0-9-]+')->name('members.show');
