<?php

namespace App\Http\Services;

use App\Models\Reviewer;
use Exception;
use Illuminate\Support\ServiceProvider;

class ReviewerService extends ServiceProvider
{
	protected $reviewer;

	public function __construct(Reviewer $reviewer)
	{
		$this->reviewer = $reviewer;
	}

	/**
	 * Create a new reviewer using data payload.
	 * @param array $data The data payload.
	 * @return array
	 */
	public function createReviewer(array $data)
	{
		$query = $this->reviewer->query();
		$reviewer = $query->create($data)->toArray();
		return $reviewer;
	}

	/**
	 * Get a reviewer by its id.
	 * @param int $id The Reviewer id.
	 * @return array
	 */
	public function getReviewer(int $id)
	{
		$query = $this->reviewer->query();
		$reviewer = $query->where('id', $id)->get()->toArray();
		return $reviewer;
	}

	/**
	 * Delete a reviewer by its id.
	 * @param int $id The Reviewer id.
	 * @return array
	 */
	public function deleteReviewer(int $id)
	{
		$query = $this->reviewer->query();
		$query->where('id', $id)->delete();
		return ['id' => $id];
	}

	/**
	 * Update a reviewer's data.
	 * @param array $data The data to be updated.
	 * @param int $id The Reviewer's id.
	 * @return int 1 for True/Success, 0 for False/Failure.
	 */
	public function updateReviewer(array $data, int $id)
	{
		$query = $this->reviewer->query();

		if (array_key_exists('name', $data)) {
			$params['name'] = $data['name'];
		} else {
			throw new Exception('Payload is missing fields.', 400);
		}

		return $query->where('id', $id)->update($params);
	}
}