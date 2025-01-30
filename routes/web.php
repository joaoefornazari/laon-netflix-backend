<?php

use App\Http\Controllers\AwardController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MediaAwardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MediaCrewController;
use App\Http\Controllers\MediaGenreController;
use App\Http\Controllers\MediaRateController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\RoleController;

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
	Route::post('login', [LoginController::class, 'authenticate'])->withoutMiddleware('auth:sanctum');

	Route::controller(UserController::class)->group(function () {
		Route::post('logon', 'create')->withoutMiddleware('auth:sanctum');

		Route::prefix('user')->group(function () {
			Route::get('{uuid}', 'read');
			Route::put('{uuid}/update', 'update');
			Route::delete('{uuid}/delete', 'delete');
		});
	});

	Route::controller(MediaController::class)->group(function () {
		Route::prefix('media')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::get('{id}/image', 'readImage');
			Route::put('{id}/update', 'update');
			Route::delete('{id}/delete', 'delete');
		});
	});

	Route::controller(PersonController::class)->group(function () {
		Route::prefix('person')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('{id}/update', 'update');
			Route::delete('{id}/delete', 'delete');
		});
	});

	Route::controller(GenreController::class)->group(function () {
		Route::prefix('genre')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('{id}/update', 'update');
			Route::delete('{id}/delete', 'delete');
		});
	});

	Route::controller(AwardController::class)->group(function () {
		Route::prefix('award')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('{id}/update', 'update');
			Route::delete('{id}/delete', 'delete');
		});
	});

	Route::controller(RoleController::class)->group(function () {
		Route::prefix('role')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('{id}/update', 'update');
			Route::delete('{id}/delete', 'delete');
		});
	});

	Route::controller(ReviewerController::class)->group(function () {
		Route::prefix('reviewer')->group(function () {
			Route::post('new', 'create');
			Route::get('{id}', 'read');
			Route::put('{id}/update', 'update');
			Route::delete('{id}/delete', 'delete');
		});
	});

	Route::controller(MediaRateController::class)->group(function () {
		Route::prefix('media-rates')->group(function () {
			Route::prefix('media/{mediaId}')->group(function () {
				Route::get('', 'list');
				Route::post('reviewer/{reviewerId}/add', 'add');
				Route::put('reviewer/{reviewerId}/update', 'update');
				Route::delete('reviewer/{reviewerId}/delete', 'delete');
			});
		});
	});

	Route::controller(MediaAwardController::class)->group(function () {
		Route::prefix('media-awards')->group(function () {
			Route::prefix('media/{mediaId}')->group(function () {
				Route::get('', 'list');
				Route::post('award/{awardId}/add', 'add');
				Route::delete('award/{awardId}/delete', 'delete');
			});
		});
	});

	Route::controller(MediaGenreController::class)->group(function () {
		Route::prefix('media-genres')->group(function () {
			Route::prefix('media/{mediaId}')->group(function () {
				Route::get('', 'list');
				Route::post('genre/{genreId}/add', 'add');
				Route::delete('genre/{genreId}/delete', 'delete');
			});
		});
	});

	Route::controller(MediaCrewController::class)->group(function () {
		Route::prefix('media-crew')->group(function () {
			Route::prefix('media/{mediaId}')->group(function () {
				Route::get('', 'list');
				Route::post('person/{personId}/add', 'add');
				Route::delete('person/{personId}/delete', 'delete');
			});
		});
	});

	Route::controller(/* PersonRoleController::class */)->group(function () {
		Route::prefix('person-role')->group(function () {
			Route::prefix('person/{personId}')->group(function () {
				Route::get('', 'list');
				Route::post('role/{roleId}/add', 'add');
				Route::delete('role/{roleId}/delete', 'delete');
			});
		});
	});
});