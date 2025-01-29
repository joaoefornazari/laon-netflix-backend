<?php

namespace App\Http\Services;

use App\Models\Person;
use Exception;
use Illuminate\Support\ServiceProvider;

class PersonService extends ServiceProvider
{
	protected $person;

	public function __construct(Person $person)
	{
		$this->person = $person;
	}
}