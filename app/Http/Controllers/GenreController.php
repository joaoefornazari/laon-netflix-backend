<?php

namespace App\Http\Controllers;

use App\Http\Services\GenreService;
use Exception;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    protected $genreService;
		
		public function __construct(GenreService $genreService)
		{
			$this->$genreService = $genreService;
		}

		/**
		 * Create a new genre.
		 *
		 */
		public function create(Request $request)
		{
			try {
				$result = $this->genreService->createGenre($request->data);
			} catch (Exception $e) {
				return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
			}
		
			return $this->success($result, 'Genre created');
		}

		/**
		 * Read a genre data, fetching it by its id.
		 *
		 */
		public function read(Request $request, int $id)
		{
			try {
				$result = $this->genreService->getGenre($id);
			} catch (Exception $e) {
				return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
			}
		
			return $this->success($result);
		}
}
