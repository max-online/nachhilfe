<?php

use App\Http\Controllers\InquiryController;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome', ['page' => Page::findBySlug('home')]))->name('home');

Route::post('/anfrage', [InquiryController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('inquiries.store');

Route::view('/impressum', 'legal.impressum')->name('impressum');
Route::view('/datenschutz', 'legal.datenschutz')->name('datenschutz');
