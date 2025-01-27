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
			// return $this->error();
			return response()->json([
				'message' => 'Abacaxi',
				'exception' => $e
			])->setStatusCode(500);
		}

		return response()->json([
			'message' => 'Manga',
			'data' => $result
		])->setStatusCode(200);
	}

}
