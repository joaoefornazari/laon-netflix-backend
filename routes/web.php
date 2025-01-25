<?php

use App\Http\Controllers\LogonController;
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

Route::prefix('api/v1/')->group(function () {
	Route::controller(/* UserController::class */)->group(function () {
		Route::post('logon', 'create');

		Route::prefix('user')->group(function () {
			Route::get('{uuid}', 'read');
			Route::put('update', 'update');
			Route::delete('delete', 'delete');
		});
	});

	Route::controller(/* MediaController::class */)->group(function () {
		Route::prefix('media')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('update', 'update');
			Route::delete('delete', 'delete');
		});
	});

	Route::controller(/* PersonController::class */)->group(function () {
		Route::prefix('person')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('update', 'update');
			Route::delete('delete', 'delete');
		});
	});

	Route::controller(/* GenreController::class */)->group(function () {
		Route::prefix('genre')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('update', 'update');
			Route::delete('delete', 'delete');
		});
	});

	Route::controller(/* AwardController::class */)->group(function () {
		Route::prefix('award')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('update', 'update');
			Route::delete('delete', 'delete');
		});
	});

	Route::controller(/* RoleController::class */)->group(function () {
		Route::prefix('role')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('update', 'update');
			Route::delete('delete', 'delete');
		});
	});

	Route::controller(/* ReviewerController::class */)->group(function () {
		Route::prefix('reviewer')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('update', 'update');
			Route::delete('delete', 'delete');
		});
	});

	Route::controller(/* MediaRateController::class */)->group(function () {
		Route::prefix('media-rate')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('update', 'update');
			Route::delete('delete', 'delete');
		});
	});

	Route::controller(/* MediaAwardController::class */)->group(function () {
		Route::prefix('media-award')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('update', 'update');
			Route::delete('delete', 'delete');
		});
	});

	Route::controller(/* MediaGenreController::class */)->group(function () {
		Route::prefix('media-genre')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('update', 'update');
			Route::delete('delete', 'delete');
		});
	});

	Route::controller(/* MediaCrewController::class */)->group(function () {
		Route::prefix('media-crew')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('update', 'update');
			Route::delete('delete', 'delete');
		});
	});

	Route::controller(/* PersonRoleController::class */)->group(function () {
		Route::prefix('person-role')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('update', 'update');
			Route::delete('delete', 'delete');
		});
	});
});