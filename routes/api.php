<?php

use App\Http\Controllers\FilesController;
use App\Models\CIDRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Web3\Storage\APIClient;

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

Route::post('/files', [FilesController::class, "upload"]);

Route::get('/status/{cid}', function(APIClient $apiClient, $cid) {
    $result = $apiClient->getStatus(env("WEB3_STORAGE_KEY"), $cid);
    return [
        "status" => $result
    ];
});
