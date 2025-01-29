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

	public function create(Request $request)
	{
		try {
			$result = $this->personService->createPerson($request->data);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success($result, 'Person created');
	}
}
