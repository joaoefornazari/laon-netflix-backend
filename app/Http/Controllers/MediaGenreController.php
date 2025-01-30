<?php

namespace App\Http\Controllers;

use App\Http\Services\MediaGenreService;
use Exception;
use Illuminate\Http\Request;

class MediaGenreController extends Controller
{
  protected $mediaGenreService;
	
	public function __construct(MediaGenreService $mediaGenreService)
	{
		$this->mediaGenreService = $mediaGenreService;
	}

	/**
	 * List media genres.
	 */
	public function list(Request $request, int $mediaId)
	{
		try {
			$result = $this->mediaGenreService->getMediaGenres($mediaId);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success($result);
	}

	/**
	 * Add a genre to media.
	 */
	public function add(Request $request, int $mediaId, int $genreId)
	{
		try {
			$result = $this->mediaGenreService->createMediaGenre($mediaId, $genreId);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success($result, 'Genre added to media');
	}

	/**
	 * Delete a genre from media.
	 */
	public function delete(Request $request, int $mediaId, int $genreId)
	{
		try {
			$result = $this->mediaGenreService->deleteMediaGenre($mediaId, $genreId);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success($result, 'Genre deleted from media');
	}
}
