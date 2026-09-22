<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\ApplicationReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/companies/create', [CompanyController::class, 'create'])
        ->name('companies.create');

    Route::post('/companies', [CompanyController::class, 'store'])
        ->name('companies.store');

    Route::get('/companies/{company}', [CompanyController::class, 'show'])
        ->name('companies.show');
        
    Route::get('/job-postings/create', [JobPostingController::class, 'create'])
    ->name('job-postings.create');

    Route::get('/job-postings', [JobPostingController::class, 'index'])
    ->name('job-postings.index');

    Route::post('/job-postings', [JobPostingController::class, 'store'])
        ->name('job-postings.store');

    Route::get('/job-postings/{jobPosting}', [JobPostingController::class, 'show'])
        ->name('job-postings.show');

     Route::get(
        '/job-postings/{jobPosting}/application-report/create',
        [ApplicationReportController::class, 'create']
    )->name('application-reports.create');

    Route::post('/job-postings/{jobPosting}/application-report',[ApplicationReportController::class, 'store'])
    ->name('application-reports.store');

    Route::get('/my-applications', [ApplicationReportController::class, 'index'])
    ->name('application-reports.index');

    Route::patch('/my-applications/{applicationReport}', [ApplicationReportController::class, 'update'])
    ->name('application-reports.update');

    Route::get(
        '/my-applications/{applicationReport}/edit',
        [ApplicationReportController::class, 'edit']
    )->name('application-reports.edit');

    Route::get(
        '/my-applications/{applicationReport}',
        [ApplicationReportController::class, 'show']
    )->name('application-reports.show');
});

require __DIR__.'/auth.php';
