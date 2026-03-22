<?php

use App\Http\Controllers\Administrator\CampusController;
use App\Http\Controllers\Administrator\CollegeController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\DepartmentController;
use App\Http\Controllers\Administrator\PermissionController;
use App\Http\Controllers\Administrator\ResearchController;
use App\Http\Controllers\Administrator\RoleController;
use App\Http\Controllers\Administrator\UserAccountController;
use App\Http\Controllers\Student\HomepageController;
use App\Http\Controllers\Student\ProfileController;
use Illuminate\Support\Facades\Route;




// Route::get('/', function () {
//     return view('welcome');
// });

    // Guest access: homepage, search, departments
    Route::get('/', [HomepageController::class, 'index'])->name('homepage');
    Route::get('/search', [HomepageController::class, 'search'])->name('search');
    Route::get('/departments/{campusId}', [HomepageController::class, 'getStudentDepartmentsByCampus']);

    // Authenticated student routes
    Route::middleware(['auth', 'checkRole:student', 'role:student'])->group(function () {

        // Download research abstract
        Route::get('/research/download/{id}', [HomepageController::class, 'downloadAbstract'])->name('research.download');

        // Student profile
        Route::prefix('student-profile-account')->name('student-profile-account.')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::post('/update', [ProfileController::class, 'update'])->name('update');
        });
    });



    // Admin routes
    $adminRoles = ['super-admin', 'bulan-admin', 'sorsogon-admin', 'castilla-admin', 'magallanes-admin', 'graduate-admin'];

    Route::middleware(['auth', 'checkRole:' . implode('|', $adminRoles), 'role:' . implode('|', $adminRoles)])->name('admin.')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // ROLES
        Route::get('roles/fetch', [RoleController::class, 'fetch'])->name('roles.fetch');
        Route::get('roles/{role}/permissions', [RoleController::class, 'getPermissions'])->name('roles.get-permissions');
        Route::post('roles/{role}/permissions', [RoleController::class, 'addPermissionToRole'])->name('roles.add-permissions');
        Route::resource('roles', RoleController::class);

        // PERMISSIONS
        Route::get('permissions/fetch', [PermissionController::class, 'fetch'])->name('permissions.fetch');
        Route::resource('permissions', PermissionController::class);

        // CAMPUS & DEPARTMENT
        Route::get('campuses/fetch', [CampusController::class, 'fetch'])->name('campuses.fetch');
        Route::resource('campuses', CampusController::class);


         Route::get('college/fetch', [CollegeController::class, 'fetch'])->name('college.fetch');
         Route::resource('college', CollegeController::class);

        //Account Settings
        Route::get('/user-accounts/departments/{campusId}', [UserAccountController::class, 'getDepartmentsByCampus']);
        Route::get('user-accounts/fetch', [UserAccountController::class, 'fetch'])->name('user-accounts.fetch');
        Route::resource('user-accounts', UserAccountController::class);

        // Researches
        Route::get('/researches/departments/{campusId}', [ResearchController::class, 'getDepartmentsByCampus']);
        Route::get('researches', [ResearchController::class, 'index'])->name('researches.index');
        Route::post('researches/store', [ResearchController::class, 'store'])->name('researches.store');
        Route::get('researches/fetch', [ResearchController::class, 'fetch'])->name('researches.fetch');
        Route::get('researches/view', [ResearchController::class, 'view'])->name('researches.view');
        Route::get('researches/view-abstract-pdf/{id}', [ResearchController::class, 'view_abstract_pdf'])->name('researches.view_abstract_pdf');
        Route::get('researches/view-research-pdf/{id}', [ResearchController::class, 'view_research_pdf'])->name('researches.view_research_pdf');
        Route::get('researches/edit/{id}', [ResearchController::class, 'edit'])->name('researches.edit');
        Route::post('researches/update/{id}', [ResearchController::class, 'update'])->name('researches.update');
        Route::delete('researches/delete/{id}', [ResearchController::class, 'destroy'])->name('researches.destroy');
    });

require __DIR__.'/auth.php';
