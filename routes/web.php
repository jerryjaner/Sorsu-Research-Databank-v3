<?php

use App\Http\Controllers\Administrator\CampusController;
use App\Http\Controllers\Administrator\CollegeController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\PermissionController;
use App\Http\Controllers\Administrator\ResearchController;
use App\Http\Controllers\Administrator\RoleController;
use App\Http\Controllers\Administrator\UserAccountController;
use App\Http\Controllers\Administrator\AdminAccountProfileController;
use App\Http\Controllers\Student\HomepageController;
use App\Http\Controllers\Student\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (HIGH RISK → PROTECTED WITH THROTTLE)
|--------------------------------------------------------------------------
*/

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/', [HomepageController::class, 'index'])->name('homepage');
    Route::get('/search', [HomepageController::class, 'search'])->name('search');
    Route::get('/departments/{campusId}', [HomepageController::class, 'getStudentDepartmentsByCampus']);
});


/*
|--------------------------------------------------------------------------
| STUDENT ROUTES (AUTH + ROLE + THROTTLE)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'checkRole:student', 'role:student', 'throttle:60,1'])->group(function () {

    // Download (STRICT LIMIT)
    Route::get('/research/download/{id}', [HomepageController::class, 'downloadAbstract'])
        ->middleware('throttle:20,1')
        ->name('research.download');

    // Student profile
    Route::prefix('student-profile-account')->name('student-profile-account.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::post('/update', [ProfileController::class, 'update'])->name('update');
    });
});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (STRICT PROTECTION)
|--------------------------------------------------------------------------
*/

$adminRoles = [
    'super-admin',
    'bulan-admin',
    'sorsogon-admin',
    'castilla-admin',
    'magallanes-admin',
    'graduate-admin'
];

Route::middleware([
    'auth',
    'checkRole:' . implode('|', $adminRoles),
    'role:' . implode('|', $adminRoles),
    'throttle:120,1' // allow more but still protected
])->name('admin.')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | ROLES
    |--------------------------------------------------------------------------
    */
    Route::get('roles/fetch', [RoleController::class, 'fetch'])->name('roles.fetch');
    Route::get('roles/{role}/permissions', [RoleController::class, 'getPermissions'])->name('roles.get-permissions');
    Route::post('roles/{role}/permissions', [RoleController::class, 'addPermissionToRole'])->name('roles.add-permissions');
    Route::resource('roles', RoleController::class);

    /*
    |--------------------------------------------------------------------------
    | PERMISSIONS
    |--------------------------------------------------------------------------
    */
    Route::get('permissions/fetch', [PermissionController::class, 'fetch'])->name('permissions.fetch');
    Route::resource('permissions', PermissionController::class);

    /*
    |--------------------------------------------------------------------------
    | CAMPUS & COLLEGE
    |--------------------------------------------------------------------------
    */
    Route::get('campuses/fetch', [CampusController::class, 'fetch'])->name('campuses.fetch');
    Route::resource('campuses', CampusController::class);

    Route::get('college/fetch', [CollegeController::class, 'fetch'])->name('college.fetch');
    Route::resource('college', CollegeController::class);

    /*
    |--------------------------------------------------------------------------
    | USER ACCOUNTS
    |--------------------------------------------------------------------------
    */
    Route::get('/user-accounts/departments/{campusId}', [UserAccountController::class, 'getDepartmentsByCampus']);
    Route::get('user-accounts/fetch', [UserAccountController::class, 'fetch'])->name('user-accounts.fetch');
    Route::resource('user-accounts', UserAccountController::class);

    /*
    |--------------------------------------------------------------------------
    | RESEARCHES
    |--------------------------------------------------------------------------
    */
    Route::get('/researches/departments/{campusId}', [ResearchController::class, 'getDepartmentsByCampus']);

    Route::get('researches', [ResearchController::class, 'index'])->name('researches.index');
    Route::post('researches/store', [ResearchController::class, 'store'])->name('researches.store');
    Route::get('researches/fetch', [ResearchController::class, 'fetch'])->name('researches.fetch');

    Route::get('researches/view', [ResearchController::class, 'view'])->name('researches.view');

    // PDF VIEW (LIMITED)
    Route::get('researches/view-abstract-pdf/{id}', [ResearchController::class, 'view_abstract_pdf'])
        ->middleware('throttle:30,1')
        ->name('researches.view_abstract_pdf');

    Route::get('researches/view-research-pdf/{id}', [ResearchController::class, 'view_research_pdf'])
        ->middleware('throttle:30,1')
        ->name('researches.view_research_pdf');

    Route::get('researches/edit/{id}', [ResearchController::class, 'edit'])->name('researches.edit');
    Route::post('researches/update/{id}', [ResearchController::class, 'update'])->name('researches.update');
    Route::delete('researches/delete/{id}', [ResearchController::class, 'destroy'])->name('researches.destroy');

    /*
    |--------------------------------------------------------------------------
    | ADMIN PROFILE
    |--------------------------------------------------------------------------
    */
    Route::prefix('account')->group(function () {
        Route::get('/profile', [AdminAccountProfileController::class, 'overviewIndex'])->name('profile.overview');
        Route::get('/profile/settings', [AdminAccountProfileController::class, 'settingsIndex'])->name('profile.settings');
        Route::get('/profile/settings/security', [AdminAccountProfileController::class, 'securityIndex'])->name('profile.security');
        Route::put('/update/{id}', [AdminAccountProfileController::class, 'update'])->name('profile.update');
    });

});

require __DIR__.'/auth.php';
