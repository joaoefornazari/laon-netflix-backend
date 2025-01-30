<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MediaService;
use Exception;

class MediaController extends Controller
{
	protected $mediaService;

	public function __construct(MediaService $mediaService)
	{
		$this->mediaService = $mediaService;
	}

	/**
	 * Create a new media (movie/series).
	 */
	public function create(Request $request)
	{
		try {
			$result = $this->mediaService->createMedia($request->data);
			$imageResult = $this->mediaService->downloadMediaImage($request->data['image_url'], $result['id']);
			
			$result['file_path'] = $imageResult['file_path'];

		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success($result, 'Media created');
	}

	/**
	 * Read a Media data, referenced by its id.
	 * DISCLAIMER: This method does not return the Media's image.
	 * To do it, use the Read Media Image (media/id/image) endpoint.
	 */
	public function read(Request $request, int $id)
	{
		try {
			$result = $this->mediaService->getMedia($id);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success($result);
	}

	/**
	 * Read a media's image, fetching it through the media's id.
	 * @return ResponseFactory The image itself, human-readable.
	 */
	public function readImage(Request $request, int $id)
	{
		try {
			$result = $this->mediaService->getMediaImage($id);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return response($result['content'], 200)->header('Content-Type', $result['MIME']);
	}

	/**
	 * Update a media's data.
	 */
	public function update(Request $request, int $id)
	{
		try {
			$result = $this->mediaService->updateMedia($request->data, $id);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success([], 'Media updated');
	}
	
	/**
	 * Delete a Media from database.
	 */
	public function delete(Request $request, int $id)
	{
		try {
			$result = $this->mediaService->deleteMedia($id);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success($result, 'Media deleted');
	}

	/**
	 * List all media.
	 */
	public function list(Request $request)
	{
		try {
			$result = $this->mediaService->listMedia($request);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success($result);
	}
}
