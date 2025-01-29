<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PersonService;
use Exception;

class PersonController extends Controller
{
  protected $personService;

	public function __construct(PersonService $personService)
	{
		$this->personService = $personService;
	}

	/**
	 * Create a new person.
	 */
	public function create(Request $request)
	{
		try {
			$result = $this->personService->createPerson($request->data);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success($result, 'Person created');
	}

	/**
	 * Get a person based on its id.
	 */
	public function read(Request $request, int $id)
	{
		try {
			$result = $this->personService->getPerson($id);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success($result);
	}

	public function update(Request $request, int $id)
	{
		try {
			$result = $this->personService->updatePerson($request->data, $id);
			if (!$result) throw new Exception('Person data not found. Check payload again.', 404);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success([], 'Person updated');
	}
	
}
