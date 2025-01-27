<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Traits\APIResponse;
use Exception;

class UserController extends Controller
{
	use APIResponse;

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

}
