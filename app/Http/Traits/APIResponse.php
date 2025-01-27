<?php

namespace App\Http\Traits;

trait APIResponse {

	/**
	 * Standardizes success responses sent to the client.
	 * @param string $httpcode The HTTP Status code of the response
	 * @param string $message The Response message, if any
	 * @param array $data The response data, if any
	 */
	public function success(int $httpcode = 200, string $message = "success", array $data = [])
	{
		return response()->json([
			'status' => $httpcode,
			'message' => $message,
			'data' => $data
		]);
	}

	/**
	 * Standardizes error responses sent to the client.
	 * @param string $message The error message
	 * @param array $data The error data
	 * @param string $httpCode The HTTP Status code of the response
	 */
	public function error(string $message, array $data, int $httpcode = 400)
	{
		return response()->json([
			'status' => $httpcode,
			'message' => $message,
			'data' => $data
		]);
	}
}