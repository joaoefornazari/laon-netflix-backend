<?php

namespace App\Http\Services;

use App\Models\Genre;
use Exception;
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

	/**
	 * Get a genre by its id.
	 * @param int $id The Genre id.
	 * @return array
	 */
	public function getGenre(int $id)
	{
		$query = $this->genre->query();
		$genre = $query->where('id', $id)->get()->toArray();
		return $genre;
	}

	/**
	 * Delete a genre by its id.
	 * @param int $id The Genre id.
	 * @return array
	 */
	public function deleteGenre(int $id)
	{
			$query = $this->genre->query();
			$query->where('id', $id)->delete();
			return ['id' => $id];
	}

	/**
	 * Update a genre's data.
	 * @param array $data The data to be updated.
	 * @param int $id The Genre's id.
	 * @return int 1 for True/Success, 0 for False/Failure.
	 */
	public function updateGenre(array $data, int $id)
	{
			$query = $this->genre->query();

			if (array_key_exists('name', $data)) {
					$params['name'] = $data['name'];
			} else {
					throw new Exception('Payload is missing fields.', 400);
			}

			return $query->where('id', $id)->update($params);
	}
}