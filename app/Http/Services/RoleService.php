<?php

namespace App\Http\Services;

use App\Models\Role;
use Exception;
use Illuminate\Support\ServiceProvider;

class RoleService extends ServiceProvider
{
	protected $role;

	public function __construct(Role $role)
	{
		$this->role = $role;
	}

	/**
	 * Create a new role using data payload.
	 * @param array $data The data payload.
	 * @return array
	 */
	public function createRole(array $data)
	{
		$query = $this->role->query();
		$role = $query->create($data)->toArray();
		return $role;
	}

	/**
	 * Get a role by its id.
	 * @param int $id The Role id.
	 * @return array
	 */
	public function getRole(int $id)
	{
		$query = $this->role->query();
		$role = $query->where('id', $id)->get()->toArray();
		return $role;
	}

	/**
	 * Delete a role by its id.
	 * @param int $id The Role id.
	 * @return array
	 */
	public function deleteRole(int $id)
	{
		$query = $this->role->query();
		$query->where('id', $id)->delete();
		return ['id' => $id];
	}

	/**
	 * Update a role's data.
	 * @param array $data The data to be updated.
	 * @param int $id The Role's id.
	 * @return int 1 for True/Success, 0 for False/Failure.
	 */
	public function updateRole(array $data, int $id)
	{
		$query = $this->role->query();

		if (array_key_exists('title', $data)) {
			$params['title'] = $data['title'];
		} else {
			throw new Exception('Payload is missing fields.', 400);
		}

		return $query->where('id', $id)->update($params);
	}
}