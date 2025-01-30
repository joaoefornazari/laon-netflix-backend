<?php

namespace App\Http\Services;

use App\Models\Award;
use App\Models\MediaAward;
use Illuminate\Support\ServiceProvider;

class MediaAwardService extends ServiceProvider
{
	protected $mediaAward;

	public function __construct(MediaAward $mediaAward)
	{
		$this->mediaAward = $mediaAward;
	}

	/**
	 * Get media awards by media id.
	 * @param int $mediaId The Media id.
	 * @return array
	 */
	public function getMediaAwards(int $mediaId)
	{
		$query = $this->mediaAward->query();
		$mediaAwards = $query
			->where('media_id', $mediaId)
			->get(['award_id'])
			->toArray();

		$awards = (new Award())->query()
			->whereIn('id', array_column($mediaAwards, 'award_id'))
			->get(['id', 'name'])
			->toArray();

		$mediaAwards = [];

		for ($i = 0; $i < count($awards); $i++) {
			$mediaAwards[$i]['id'] = $awards[$i]['id'];
			$mediaAwards[$i]['name'] = $awards[$i]['name'];
		}

		return $mediaAwards;
	}

	/**
	 * Create a new media award and return as an array.
	 * @param int $mediaId The Media id.
	 * @param int $awardId The Award id.
	 * @return array
	 */
	public function createMediaAward(int $mediaId, int $awardId)
	{
		$mediaAward = new MediaAward();
		$mediaAward->media_id = $mediaId;
		$mediaAward->award_id = $awardId;
		$mediaAward->save();

		return $mediaAward->toArray();
	}

	/**
	 * Delete a specific award from a specific media.
	 * @param int $mediaId The Media id.
	 * @param int $awardId The Award id.
	 * @return array
	 */
	public function deleteMediaAward(int $mediaId, int $awardId)
	{
		$query = $this->mediaAward->query();
		$query
			->where('media_id', $mediaId)
			->where('award_id', $awardId)
			->delete();

		return ['media_id' => $mediaId, 'award_id' => $awardId];
	}
}
