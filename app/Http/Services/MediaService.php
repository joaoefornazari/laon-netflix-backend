<?php

namespace App\Http\Services;

use App\Models\Media;
use Illuminate\Support\ServiceProvider;

class MediaService extends ServiceProvider
{
	protected $media;

	public function __construct(Media $media)
	{
		$this->media = $media;
	}

	/**
	 * Create a new media register.
	 * @param array $data The new media data.
	 * @return array
	 */
	public function createMedia(array $data)
	{
		$query = $this->media->query();
		$media = $query->create($data)->toArray();

		return $media;
	}
}
