<?php

namespace App\Http\Services;

use App\Models\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Ramsey\Uuid\Rfc4122\UuidV4;

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

		$storage = new Storage();
		

		$media = $query->create($data)->toArray();

		return $media;
	}

	/**
	 * Download a media image from web.
	 * @param string url The image URL.
	 * @param int id The media ID.
	 * @return array
	 */
	public function downloadMediaImage(string $url, int $id)
	{
		$response = Http::get($url);

		if ($response->ok()) {
			$formatRegex = '/\.(jpg|jpeg|png)$/i';
			$matches = [];
			if (!preg_match($formatRegex, $url, $matches)) {
				throw new Exception('Unsupported image format.', 422);
				return;
			}
			$format = $matches[0];
			$filename = "media_{$id}_image{$format}";
			$path = "images/{$filename}";

			Storage::put($path, $response->body());

			return ['file_path' => $path];
		} else {
			throw new Exception('File could not be downloaded. Check the file URL again.', 422);
		}
	}
}
