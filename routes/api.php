<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

// use App\Http\Controllers\API\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/user', function () {
//     $user = User::all();
//     return $user;
// });
Route::middleware('auth:sanctum')->get('/user/{id}', function (User $user) {
    return $user;
});
Route::get(
    '/log',
    function (Request $request) {
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $token = $user->createToken($user->id)->plainTextToken;

    return response()->json([
        'user'  => $user->name,
        'email' => $user->email,
        'token' => $token,
    ], 200);
}
);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('category', 'App\Http\Controllers\API\CategoryController@index');
    Route::get('category/{id}', 'App\Http\Controllers\API\CategoryController@show');
    Route::get('course', 'App\Http\Controllers\API\CourseController@index');
    Route::get('course/{id}', 'App\Http\Controllers\API\CourseController@show');
});
Route::post('login', [App\Http\Controllers\UserController::class, 'login']);
