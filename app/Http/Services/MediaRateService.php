<?php

namespace App\Http\Services;

use App\Models\MediaRate;
use App\Models\Reviewer;
use Exception;
use Illuminate\Support\ServiceProvider;

class MediaRateService extends ServiceProvider
{
	protected $mediaRate;

	public function __construct(MediaRate $mediaRate)
	{
		$this->mediaRate = $mediaRate;
	}

	/**
	 * Get media rates by media id.
	 * @param int $mediaId The Media id.
	 * @return array
	 */
	public function getMediaRates(int $mediaId)
	{
		$query = $this->mediaRate->query();
		$mediaRates = $query
			->where('media_id', $mediaId)
			->get(['reviewer_id', 'rate'])
			->toArray();

		$reviewers = (new Reviewer())->query()
			->whereIn('id', array_column($mediaRates, 'reviewer_id'))
			->get(['id', 'name'])
			->toArray();

		for ($i = 0; $i < count($reviewers); $i++) {
			$mediaRates[$i]['reviewer_id'] = $reviewers[$i]['id'];
			$mediaRates[$i]['reviewer_name'] = $reviewers[$i]['name'];
		}

		return $mediaRates;
	}

	/**
	 * Create a new media rate and return as an array.
	 * @param int $mediaId The Media id.
	 * @param int $reviewerId The Reviewer id.
	 * @param array $data TPayload which contains the rate value.
	 * @return array
	 */
	public function createMediaRate(int $mediaId, int $reviewerId, array $data)
	{
		$this->mediaRate->media_id = $mediaId;
		$this->mediaRate->reviewer_id = $reviewerId;
		$this->mediaRate->rate = $data['rate'];
		$this->mediaRate->save();

		return $this->mediaRate->toArray();
	}

	/**
	 * Delete a rate given by a specific reviewer from a specific media.
	 * @param int $mediaId The Media id.
	 * @param int $reviewerId The Reviewer Id.
	 * @return array
	 */
	public function deleteMediaRate(int $mediaId, int $reviewerId)
	{
		$query = $this->mediaRate->query();
		$query
			->where('media_id', $mediaId)
			->where('reviewer_id', $reviewerId)
			->delete();

		return ['media_id' => $mediaId, 'reviewer_id' => $reviewerId];
	}

	/**
	 * Update a specific rate for a specific media and reviewer.
	 * @param int $mediaId The Media id.
	 * @param int $reviewerId The Reviewer id.
	 * @param array $data The MediaRate payload, with the rate.
	 * @return int 1 for True/Success, 0 for False/Failure.
	 */
	public function updateMediaRate(int $mediaId, int $reviewerId, array $data)
	{
		$query = $this->mediaRate->query();
		
		if (array_key_exists('rate', $data)) {
			$params['rate'] = $data['rate'];
		} else {
			throw new Exception('Payload is missing fields.', 400);
		}

		return $query->where('media_id', $mediaId)
			->where('reviewer_id', $reviewerId)
			->update($params);
	}
}
