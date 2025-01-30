<?php

namespace App\Http\Controllers;

use App\Http\Services\PersonRoleService;
use Exception;
use Illuminate\Http\Request;

class PersonRoleController extends Controller
{
    protected $personRoleService;
		
		public function __construct(PersonRoleService $personRoleService)
		{
			$this->personRoleService = $personRoleService;
		}

		/**
		 * List person roles.
		 */
		public function list(Request $request, int $personId)
		{
			try {
				$result = $this->personRoleService->getPersonRoles($personId);
			} catch (Exception $e) {
				return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
			}

			return $this->success($result);
		}

		/**
		 * Add a role to person.
		 */
		public function add(Request $request, int $personId, int $roleId)
		{
			try {
				$result = $this->personRoleService->createPersonRole($personId, $roleId);
			} catch (Exception $e) {
				return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
			}

			return $this->success($result, 'Role added to person');
		}

		/**
		 * Delete a role from a specific person.
		 */
		public function delete(Request $request, int $personId, int $roleId)
		{
			try {
				$result = $this->personRoleService->deletePersonRole($personId, $roleId);
			} catch (Exception $e) {
				return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
			}

			return $this->success($result, 'Role deleted from person');
		}
}
