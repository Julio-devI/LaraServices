<?php

use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminServiceCategoryComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\ServicesByCategoryComponent;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', HomeComponent::class)->name('home');
Route::get('/service-categories', ServiceCategoriesComponent::class)->name('home.services_categories');
Route::get('/{category_slug}/services', ServicesByCategoryComponent::class)->name('home.services_by_category');

//For customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/customer/dashboard', CustomerDashboardComponent::class)->name('customer.dashboard');
});

//For sprovider
Route::middleware(['auth:sanctum', 'verified', 'authsprovider'])->group(function () {
    Route::get('/sprovider/dashboard', SproviderDashboardComponent::class)->name('sprovider.dashboard');
});

//for admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/service-categories', AdminServiceCategoryComponent::class)->name('admin.service_categories');
    Route::get('/admin/service-category/add', AdminAddServiceCategoryComponent::class)->name('admin.add_service_category');
    Route::get('/admin/service-category/edit/{category_id}', AdminEditServiceCategoryComponent::class)->name('admin.category.edit');
});