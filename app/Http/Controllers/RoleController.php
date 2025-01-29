<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
	protected $roleService;

	public function __construct(RoleService $roleService)
	{
		$this->roleService = $roleService;
	}
	
	/**
	 * Create a new role.
	 */
	public function create(Request $request)
	{
		try {
			$result = $this->roleService->createRole($request->data);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success($result, 'Role created');
	}
	
	/**
	 * Read a role data, fetching it by its id.
	 */
	public function read(Request $request, int $id)
	{
		try {
			$result = $this->roleService->getRole($id);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success($result);
	}
	
	/**
	 * Update a role's data, referred by role's id.
	 */
	public function update(Request $request, int $id)
	{
		try {
			$result = $this->roleService->updateRole($request->data, $id);
			if (!$result) throw new Exception('Role data not found. Check payload again.', 404);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success([], 'Role updated');
	}
	
	/**
	 * Delete a role by its id.
	 */
	public function delete(Request $request, int $id)
	{
		try {
			$result = $this->roleService->deleteRole($id);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success($result, 'Role deleted');
	}
	
}

