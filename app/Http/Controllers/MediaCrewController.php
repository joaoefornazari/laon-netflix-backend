<?php

namespace App\Http\Controllers;

use App\Http\Services\MediaCrewService;
use Exception;
use Illuminate\Http\Request;

class MediaCrewController extends Controller
{
  protected $mediaCrewService;
	
	public function __construct(MediaCrewService $mediaCrewService)
	{
		$this->mediaCrewService = $mediaCrewService;
	}

	/**
	 * Add a new crew member to a media.
	 */
	public function add(Request $request, int $mediaId, int $personId)
	{
		try {
			$result = $this->mediaCrewService->addCrewMember($mediaId, $personId);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success($result, 'Crew member (person) added to media');
	}

	/**
	 * List all crew members of a media.
	 */
	public function list(Request $request, int $mediaId)
	{
		try {
			$result = $this->mediaCrewService->getCrewMembers($mediaId);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success($result);
	}

	/**
	 * Delete a crew member (person) from a media.
	 */
	public function delete(Request $request, int $mediaId, int $personId)
	{
		try {
			$result = $this->mediaCrewService->deleteCrewMember($mediaId, $personId);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success($result, 'Crew member (person) deleted from media');
	}
}
