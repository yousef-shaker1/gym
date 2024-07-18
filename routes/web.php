<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserpageController;
use App\Http\Controllers\RaleOfferController;
use App\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[UserpageController::class, 'homepage'])->name('home');
Route::resource('customer',CustomerController::class);
Route::resource('/rale_offer',RaleOfferController::class);
Route::get('/aboutus',[UserpageController::class, 'aboutus'])->name('aboutus');
Route::get('/class_details',[UserpageController::class, 'class_details'])->name('class_details');
Route::get('/services',[UserpageController::class, 'services'])->name('services');
Route::get('/team',[UserpageController::class, 'team'])->name('team');
Route::post('/bmr',[UserpageController::class, 'bmr'])->name('bmr');
Route::get('/calculator',[UserpageController::class, 'calculator'])->name('calculator');
Route::get('/blog',[UserpageController::class, 'blog'])->name('blog');
Route::get('/contact',[UserpageController::class, 'contact'])->name('contact');
Route::get('/show_user',[UserpageController::class, 'show_user'])->name('show_user');
Route::delete('/delete_customer/{id}',[UserpageController::class, 'delete_customer'])->name('delete_customer');

Route::get('/dashboard', [UserpageController::class, 'admin_page'])->middleware(['auth', 'verified','Is_admin'])->name('dashboard');
Route::resource('section',SectionController::class);
Route::get('/show_section/{id}',[SectionController::class, 'show_section'])->name('show_section');
Route::post('/payment/{id}',[PaymentController::class, 'payment'])->name('payment')->middleware(['auth']);
Route::get('/success',[PaymentController::class, 'successtransaction'])->name('success');
Route::get('/cancel',[PaymentController::class, 'canceltransaction'])->name('cancel');
Route::get('/admin/team',[TeamController::class, 'index'])->name('team_index');
Route::get('/admin/message',[MessageController::class, 'index'])->name('message_index');

Route::get('/admin/subscription',[SubscriptionController::class, 'subscription'])->name('subscription');
Route::post('/admin/save_subscription',[SubscriptionController::class, 'save_subscription'])->name('save_subscription');
Route::PATCH('/admin/update_subscription/{id}',[SubscriptionController::class, 'update_subscription'])->name('update_subscription');
Route::delete('/admin/delete_subscription/{id}',[SubscriptionController::class, 'delete_subscription'])->name('delete_subscription');

Route::post('/send_message',[MessageController::class, 'send_message'])->name('send_message')->middleware(['auth']);
Route::post('/comment',[MessageController::class, 'comment'])->name('comment');
Route::get('/comment_show',[MessageController::class, 'comment_show'])->name('comment_show');

Route::get('/show_order',[OrderController::class, 'show_order'])->name('show_order');
Route::get('/accept_order/{id}',[OrderController::class, 'accept_order'])->name('accept_order');
Route::get('/reject_order/{id}',[OrderController::class, 'reject_order'])->name('reject_order');
Route::delete('/delete_order/{id}',[OrderController::class, 'delete'])->name('delete_order');
Route::resource('time',TimeController::class);
Route::resource('photo',PhotoController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
