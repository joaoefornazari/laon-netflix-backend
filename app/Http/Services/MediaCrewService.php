<?php

namespace App\Http\Services;

use App\Models\MediaCrew;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Support\ServiceProvider;

class MediaCrewService extends ServiceProvider
{
	protected $mediaCrew;

	public function __construct(MediaCrew $mediaCrew)
	{
		$this->mediaCrew = $mediaCrew;
	}

	/**
	 * Add a new crew member to a media.
	 * @param int $mediaId The Media id.
	 * @param int $personId The Person (crew member) id.
	 * @return array
	 */
	public function addCrewMember(int $mediaId, int $personId)
	{
		$this->mediaCrew->media_id = $mediaId;
		$this->mediaCrew->person_id = $personId;
		$this->mediaCrew->save();

		return $this->mediaCrew->toArray();
	}

	/**
	 * List all crew members of a media.
	 * @param int $mediaId The Media id.
	 * @return array
	 */
	public function getCrewMembers(int $mediaId)
	{
		$query = $this->mediaCrew->query();
		$mediaPeople = $query
			->selectRaw('person.id, person.name, role.title as role')
			->join('person', 'media_crew.person_id', '=', 'person.id')
			->join('person_role', 'person_role.person_id', '=', 'person.id')
			->join('role', 'person_role.role_id', '=', 'role.id')
			->where('media_crew.media_id', $mediaId)
			->get();

		return $mediaPeople->toArray();
	}

	/**
	 * Delete a crew member from a media.
	 * @param int $mediaId The Media id.
	 * @param int $personId The Person (crew member) id.
	 * @return array
	 */
	public function deleteCrewMember(int $mediaId, int $personId)
	{
		$query = $this->mediaCrew->query();
		$query
			->where('media_id', $mediaId)
			->where('person_id', $personId)
			->delete();

		return ['media_id' => $mediaId, 'person_id' => $personId];
	}
}