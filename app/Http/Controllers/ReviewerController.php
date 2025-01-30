<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ReviewerService;
use Exception;

class ReviewerController extends Controller
{
		protected $reviewerService;

		public function __construct(ReviewerService $reviewerService)
		{
			$this->reviewerService = $reviewerService;
		}

		/**
		 * Create a new reviewer.
		 */
		public function create(Request $request)
		{
			try {
				$result = $this->reviewerService->createReviewer($request->data);
			} catch (Exception $e) {
				return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
			}

			return $this->success($result, 'Reviewer created');
		}

		/**
		 * Read a reviewer data, fetching it by its id.
		 */
		public function read(Request $request, int $id)
		{
			try {
				$result = $this->reviewerService->getReviewer($id);
			} catch (Exception $e) {
				return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
			}

			return $this->success($result);
		}

		/**
			 * Update a reviewer's data, referred by reviewer's id.
			 */
		public function update(Request $request, int $id)
		{
			try {
				$result = $this->reviewerService->updateReviewer($request->data, $id);
				if (!$result) throw new Exception('Reviewer data not found. Check payload again.', 404);
			} catch (Exception $e) {
				return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
			}

			return $this->success([], 'Reviewer updated');
		}

		/**
		 * Delete a reviewer by its id.
		 */
		public function delete(Request $request, int $id)
		{
			try {
				$result = $this->reviewerService->deleteReviewer($id);
			} catch (Exception $e) {
				return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
			}

			return $this->success($result, 'Reviewer deleted');
		}
}
