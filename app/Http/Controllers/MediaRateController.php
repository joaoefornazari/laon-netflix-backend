<?php

namespace App\Http\Controllers;

use App\Http\Services\MediaRateService;
use Exception;
use Illuminate\Http\Request;

class MediaRateController extends Controller
{
	protected $mediaRateService;

	public function __construct(MediaRateService $mediaRateService)
	{
			$this->mediaRateService = $mediaRateService;
	}

	/**
	 * Add a new rate to a media.
	 */
	public function add(Request $request, int $mediaId, int $reviewerId)
	{
		try {
			$result = $this->mediaRateService
				->createMediaRate($mediaId, $reviewerId, $request->data);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success($result, 'Rate added to media');
	}

	/**
	 * List all media' rates.
	 */
	public function list(Request $request, int $mediaId)
	{
		try {
			$result = $this->mediaRateService->getMediaRates($mediaId);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success($result);
	}

	/**
	 * Update a rate given to a media by a reviewer.
	 */
	public function update(Request $request, int $mediaId, int $reviewerId)
	{
		try {
			$result = $this->mediaRateService
				->updateMediaRate($mediaId, $reviewerId, $request->data);
			if (!$result) {
				throw new Exception('Media rate data not found. Check payload again.', 404);
			}
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success([], 'Rate updated');
	}

	/**
	 * Delete a rate given to a media by a reviewer.
	 */
	public function delete(Request $request, int $mediaId, int $reviewerId)
	{
		try {
			$result = $this->mediaRateService->deleteMediaRate($mediaId, $reviewerId);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success($result, 'Rate deleted');
	}

}
