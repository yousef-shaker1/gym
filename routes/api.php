<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DayController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\TeamController;
use App\Http\Controllers\api\TimeController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\PhotoController;
use App\Http\Controllers\api\MessageController;
use App\Http\Controllers\api\ProblemController;
use App\Http\Controllers\api\sectionController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\Rale_offerController;
use App\Http\Controllers\api\SubscriptionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('profile', [AuthController::class,'profile']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('logout', [AuthController::class,'logout']);

    Route::get('problem', [ProblemController::class, 'index']);
    Route::get('problem/{id}', [ProblemController::class, 'show']);
    Route::delete('problem/{id}', [ProblemController::class, 'delete']);

 
    Route::get('customer', [CustomerController::class, 'index']);
    Route::get('customer/{id}', [CustomerController::class, 'show']);
    Route::post('customer/create', [CustomerController::class, 'store']);
    Route::post('customer/update/{id}', [CustomerController::class, 'update']);
    Route::delete('customer/{id}', [CustomerController::class, 'delete']);
    
    Route::get('day', [DayController::class, 'index']);
    Route::get('day/{id}', [DayController::class, 'show']);
    
    
    Route::get('message', [MessageController::class, 'index']);
    Route::get('message/{id}', [MessageController::class, 'show']);
    Route::delete('message/{id}', [MessageController::class, 'delete']);

    
    Route::get('subscription', [SubscriptionController::class, 'index']);
    Route::get('subscription/{id}', [SubscriptionController::class, 'show']);
    Route::post('subscription/create', [SubscriptionController::class, 'store']);
    Route::post('subscription/update/{id}', [SubscriptionController::class, 'update']);
    Route::delete('subscription/{id}', [SubscriptionController::class, 'delete']);
    
    Route::get('order', [OrderController::class, 'index']);
    Route::get('order/{id}', [OrderController::class, 'show']);
    Route::post('order/create', [OrderController::class, 'store']);
    Route::post('order/accept/{id}', [OrderController::class, 'accept_order']);
    Route::post('order/reject/{id}', [OrderController::class, 'reject_order']);
    Route::delete('order/{id}', [OrderController::class, 'delete']);
    
    
    Route::get('img', [PhotoController::class, 'index']);
    Route::get('img/{id}', [PhotoController::class, 'show']);
    Route::post('img/create', [PhotoController::class, 'store']);
    Route::post('img/update/{id}', [PhotoController::class, 'update']);
    Route::delete('img/{id}', [PhotoController::class, 'delete']);
    
    Route::get('rale_offer', [Rale_offerController::class, 'index']);
    Route::get('rale_offer/{id}', [Rale_offerController::class, 'show']);
    Route::post('rale_offer/create', [Rale_offerController::class, 'store']);
    Route::post('rale_offer/update/{id}', [Rale_offerController::class, 'update']);
    Route::delete('rale_offer/{id}', [Rale_offerController::class, 'delete']);
    
    Route::get('section', [sectionController::class, 'index']);
    Route::get('section/{id}', [SectionController::class, 'show']);
    Route::post('section/create', [SectionController::class, 'store']);
    Route::post('section/update/{id}', [SectionController::class, 'update']);
    Route::delete('section/{id}', [SectionController::class, 'delete']);
     
    Route::get('team', [TeamController::class, 'index']);
    Route::get('team/{id}', [TeamController::class, 'show']);
    Route::post('team/create', [TeamController::class, 'store']);
    Route::post('team/update/{id}', [TeamController::class, 'update']);
    Route::delete('team/{id}', [TeamController::class, 'delete']);
    
     
    Route::get('time', [TimeController::class, 'index']);
    Route::get('time/{id}', [TimeController::class, 'show']);
    Route::post('time/create', [TimeController::class, 'store']);
    Route::post('time/update/{id}', [TimeController::class, 'update']);
    Route::delete('time/{id}', [TimeController::class, 'delete']);
    
});




