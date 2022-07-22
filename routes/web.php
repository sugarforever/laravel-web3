<?php

use App\Models\CIDRecord;
use App\Services\IPFSStorageService;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calendar', function () {
    return view('calendar');
})->middleware(['auth'])->name('calendar');

Route::get('/dashboard', function (IPFSStorageService $ipfsStorageService) {
    // $stored_files = $ipfsStorageService->getList();
    $records = CIDRecord::all();
    $stored_files = [];
    foreach ($records as $record) {
        $stored_files[] = $record->ipfs_link;
    }

    return view('dashboard')->with('stored_files', $stored_files);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
