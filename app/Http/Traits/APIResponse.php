<?php

namespace App\Http\Traits;

trait APIResponse {

	/**
	 * Standardizes success responses sent to the client.
	 * @param array $data The response data, if any
	 * @param string $message The Response message, if any
	 * @param string $httpcode The HTTP Status code of the response
	 */
	public function success(array $data = [], string $message = "success", int $httpcode = 200)
	{
		return response()->json([
			'status' => $httpcode,
			'message' => $message,
			'data' => $data
		])->setStatusCode($httpcode);
	}

	/**
	 * Standardizes error responses sent to the client.
	 * @param array $trace The error trace
	 * @param string $message The error message
	 * @param int|string $httpCode The HTTP Status code of the response
	 */
	public function error(array $trace, string $message, int|string $httpcode = 400)
	{
		if (!is_int($httpcode)) $httpcode = intval($httpcode);

		return response()->json([
			'status' => $httpcode,
			'message' => $message,
			'trace' => $trace
		])->setStatusCode(($httpcode >= 599 || $httpcode <= 100) ? 400 : $httpcode);
	}
}