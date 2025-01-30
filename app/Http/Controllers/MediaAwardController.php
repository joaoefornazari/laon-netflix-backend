<?php

namespace App\Http\Controllers;

use App\Http\Services\MediaAwardService;
use Exception;
use Illuminate\Http\Request;

class MediaAwardController extends Controller
{
		protected $mediaAwardService;

		public function __construct(MediaAwardService $mediaAwardService)
		{
			$this->mediaAwardService = $mediaAwardService;
		}

		/**
		 * List media awards.
		 */
		public function list(Request $request, int $mediaId)
		{
			try {
				$result = $this->mediaAwardService->getMediaAwards($mediaId);
			} catch (Exception $e) {
				return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
			}

			return $this->success($result);
		}

		/**
		 * Add an award to media.
		 */
		public function add(Request $request, int $mediaId, int $awardId)
		{
			try {
				$result = $this->mediaAwardService->createMediaAward($mediaId, $awardId);
			} catch (Exception $e) {
				return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
			}

			return $this->success($result);
		}

		/**
		 * Delete an award from media.
		 */
		public function delete(Request $request, int $mediaId, int $awardId)
		{
			try {
				$result = $this->mediaAwardService->deleteMediaAward($mediaId, $awardId);
			} catch (Exception $e) {
				return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
			}

			return $this->success($result);
		}
		
}
