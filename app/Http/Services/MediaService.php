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
			$path = "images/{$id}/{$filename}";

			Storage::put($path, $response->body());

			return ['file_path' => $path];
		} else {
			throw new Exception('File could not be downloaded. Check the file URL again.', 422);
		}
	}

	/**
	 * Retrieve Media data referencing its id.
	 * @param int $id The Media id.
	 * @return array
	 */
	public function getMedia(int $id)
	{
		$query = $this->media->query();
		$media = $query->where('id', $id)->get()->toArray();
		return $media;
	}

	/**
	 * Get a media's image content and MIMEType referenced by the media's id.
	 * @param int $id The media's id.
	 * @return array
	 */
	public function getMediaImage(int $id)
	{
		$images = Storage::files("images/{$id}");
		$image = Storage::get($images[0]);
		$MIME = Storage::mimeType($images[0]);

		return ['content' => $image, 'MIME' => $MIME];
	}

	/**
	 * Update a Media's content, referenced by media's id.
	 * @param array $data The data to be updated.
	 * @param int $id The Media's id.
	 */
	public function updateMedia(array $data, int $id)
	{
		$query = $this->media->query();
		
		$params = [];

		if (array_key_exists('name', $data)) {
			$params['name'] = $data['name'];
		}

		if (array_key_exists('type', $data)) {
			$params['type'] = $data['type'];
		}

		if (array_key_exists('original_title', $data)) {
			$params['original_title'] = $data['original_title'];
		}

		if (array_key_exists('year', $data)) {
			$params['year'] = $data['year'];
		}

		if (array_key_exists('duration', $data)) {
			$params['duration'] = $data['duration'];
		}

		if (array_key_exists('synopsis', $data)) {
			$params['synopsis'] = $data['synopsis'];
		}
		
		if (array_key_exists('trailer_link', $data)) {
			$params['trailer_link'] = $data['trailer_link'];
		}

		if (array_key_exists('image_url', $data)) {
			Storage::deleteDirectory("images/{$id}");
			$this->downloadMediaImage($data['url'], $id);
		}

		$media = $query->update($params);
		return $media;
	}
	
	/**
	 * Delete a Media from the database, using its id.
	 * @param int $id The Media id.
	 * @return array
	 */
	public function deleteMedia(int $id)
	{
		$query = $this->media->query();
		$media = $query->where('id', $id)->delete();
		return ['id' => $id];
	}
}
