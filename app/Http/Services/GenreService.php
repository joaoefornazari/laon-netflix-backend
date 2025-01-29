<?php

namespace App\Http\Services;

use App\Models\Genre;
use Illuminate\Support\ServiceProvider;

class GenreService extends ServiceProvider
{
	protected $genre;

	public function __construct(Genre $genre)
	{
		$this->genre = $genre;
	}

	/**
	 * Create a new genre using data payload.
	 * @param array $data The data payload.
	 * @return array
	 */
	public function createGenre(array $data)
	{
		$query = $this->genre->query();
		$genre = $query->create($data)->toArray();
		return $genre;
	}
}