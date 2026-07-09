 <?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ResultController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // user Routes
    Route::get('/user/notices', [NoticeController::class, 'userNotices'])
        ->name('user.notices');

    Route::get('/user/notices/{notice}', [NoticeController::class, 'show'])
        ->name('user.notice.show');

    // admin Routes
    Route::middleware('admin')->group(function () {

        Route::resource('notices', NoticeController::class);

        Route::resource('users', UserController::class);
        Route::resource('students', StudentController::class);
        Route::resource('results', ResultController::class);

        Route::get('/results/import', [ResultController::class, 'importForm'])
        ->name('results.import.form');

       Route::post('/results/import', [ResultController::class, 'import'])
      ->name('results.import');

    });

});

require __DIR__.'/auth.php';