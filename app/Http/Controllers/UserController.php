<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserService;
use Exception;

class UserController extends Controller
{

	protected $userService;

	public function __construct(UserService $userService)
	{
		$this->userService = $userService;
	}

	public function create(Request $request)
	{
		try {
			$result = $this->userService->createUser($request->data);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success($result);
	}

	public function read(Request $request, string $uuid)
	{
		try {
			$result = $this->userService->getUser($uuid);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success($result);
	}

	public function update(Request $request, string $uuid)
	{
		try {
			$result = $this->userService->updateUser($uuid, $request->data);
			if (!$result) throw new Exception("Check again the data sent or the user credentials.", 400);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success([], "User updated");
	}

	public function delete(Request $request, string $uuid)
	{
		try {
			$result = $this->userService->deleteUser($uuid);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}

		return $this->success($result, "User deleted");
	}
}
