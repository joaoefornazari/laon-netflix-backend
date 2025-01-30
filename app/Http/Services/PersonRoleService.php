<?php

namespace App\Http\Services;

use App\Models\PersonRole;
use App\Models\Role;
use Illuminate\Support\ServiceProvider;

class PersonRoleService extends ServiceProvider
{
	protected $personRole;

	public function __construct(PersonRole $personRole)
	{
		$this->personRole = $personRole;
	}

	/**
	 * Get person roles by person id.
	 * @param int $personId The Person id.
	 * @return array
	 */
	public function getPersonRoles(int $personId)
	{
		$query = $this->personRole->query();
		$personRoles = $query
			->where('person_id', $personId)
			->join('role', 'role.id', '=', 'person_role.role_id')
			->get(['person_role.role_id'])
			->toArray();

		return $personRoles;
	}

	/**
	 * Create a new person role and return as an array.
	 * @param int $personId The Person id.
	 * @param int $roleId The Role id.
	 * @return array
	 */
	public function createPersonRole(int $personId, int $roleId)
	{
		$this->personRole->person_id = $personId;
		$this->personRole->role_id = $roleId;
		$this->personRole->save();

		return $this->personRole->toArray();
	}

	/**
	 * Delete a specific role from a specific person.
	 * @param int $personId The Person id.
	 * @param int $roleId The Role id.
	 * @return array
	 */
	public function deletePersonRole(int $personId, int $roleId)
	{
		$query = $this->personRole->query();
		$query
			->where('person_id', $personId)
			->where('role_id', $roleId)
			->delete();

		return ['person_id' => $personId, 'role_id' => $roleId];
	}
}