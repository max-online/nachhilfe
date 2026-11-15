<?php

use App\Http\Controllers\InquiryController;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::get('/home', fn () => view('welcome', ['page' => Page::findBySlug('home')]))->name('home');

Route::post('/anfrage', [InquiryController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('inquiries.store');

Route::get('/impressum', fn () => view('legal', ['page' => Page::findBySlug('impressum')]))->name('impressum');
Route::get('/datenschutz', fn () => view('legal', ['page' => Page::findBySlug('datenschutz')]))->name('datenschutz');
