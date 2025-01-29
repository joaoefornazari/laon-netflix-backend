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
}
