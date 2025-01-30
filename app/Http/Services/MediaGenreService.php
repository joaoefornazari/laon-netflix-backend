<?php

namespace App\Http\Services;

use App\Models\Genre;
use App\Models\MediaGenre;
use Illuminate\Support\ServiceProvider;

class MediaGenreService extends ServiceProvider
{
	protected $mediaGenre;
	
	public function __construct(MediaGenre $mediaGenre)
	{
		$this->mediaGenre = $mediaGenre;
	}

	/**
	 * Get media genres by media id.
	 * @param int $mediaId The Media id.
	 * @return array
	 */
	public function getMediaGenres(int $mediaId)
	{
		$query = $this->mediaGenre->query();
		$mediaGenres = $query
			->where('media_id', $mediaId)
			->get(['genre_id'])
			->toArray();

		$genres = (new Genre())->query()
			->whereIn('id', array_column($mediaGenres, 'genre_id'))
			->get(['id', 'name'])
			->toArray();

		for ($i = 0; $i < count($genres); $i++) {
			$mediaGenres[$i]['name'] = $genres[$i]['name'];
		}

		return $mediaGenres;
	}

	/**
	 * Create a new media genre and return as an array.
	 * @param int $mediaId The Media id.
	 * @param int $genreId The Genre id.
	 * @return array
	 */
	public function createMediaGenre(int $mediaId, int $genreId)
	{
		$this->mediaGenre->media_id = $mediaId;
		$this->mediaGenre->genre_id = $genreId;
		$this->mediaGenre->save();

		return $this->mediaGenre->toArray();
	}

	/**
	 * Delete a specific genre from a specific media.
	 * @param int $mediaId The Media id.
	 * @param int $genreId The Genre id.
	 * @return array
	 */
	public function deleteMediaGenre(int $mediaId, int $genreId)
	{
		$query = $this->mediaGenre->query();
		$query
			->where('media_id', $mediaId)
			->where('genre_id', $genreId)
			->delete();

		return ['media_id' => $mediaId, 'genre_id' => $genreId];
	}
}