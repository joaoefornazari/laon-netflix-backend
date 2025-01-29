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

	public function createPerson(array $data)
	{
		$query = $this->person->query();
		$person = $query->create($data)->toArray();
		return $person;
	}

	public function getPerson(int $id)
	{
		$query = $this->person->query();
		$person = $query->where('id', $id)->get()->toArray();
		return $person;
	}

	public function updatePerson(array $data, int $id)
	{
		$query = $this->person->query();

		if (array_key_exists('name', $data)) {
			$params['name'] = $data['name'];
		} else {
			throw new Exception('Payload is missing fields.', 400);
		}

		return $query->where('id', $id)->update($params);
	}
}