<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiGroupController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\MaskController;
use App\Http\Controllers\OrderingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyItemController;
use App\Http\Controllers\RubricController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\VendorController;
use App\Models\ProductUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::name('api.')
    ->middleware('api')
    ->group(function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:300,1');
            Route::post('/register', [AuthController::class, 'register']);

            Route::group(['middleware' => 'jwt'], function () {
                Route::post('/logout', [AuthController::class, 'logout']);
                Route::post('/refresh', [AuthController::class, 'refresh']);
                Route::get('/me', [AuthController::class, 'me']);
            });
        });

        Route::apiResource('file', FileController::class)->only(['index', 'store', 'show', 'destroy']);
        Route::apiResource('image', ImageController::class)->only(['index', 'store', 'show', 'destroy']);

        Route::apiResource('api-group', ApiGroupController::class);

        Route::apiResources([
            'apis' => ApiController::class,
            'layouts' => LayoutController::class,
            'pages' => PageController::class,
            'rules' => RuleController::class,
            'masks' => MaskController::class,
        ]);
    });
