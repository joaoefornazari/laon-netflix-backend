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

	/**
	 * Create a new Person.
	 * @param array $data The person data payload.
	 * @return array
	 */
	public function createPerson(array $data)
	{
		$query = $this->person->query();
		$person = $query->create($data)->toArray();
		return $person;
	}

	/**
	 * Get a Person.
	 * @param int $id The Person's id.
	 * @return array
	 */
	public function getPerson(int $id)
	{
		$query = $this->person->query();
		$person = $query->where('id', $id)->get()->toArray();
		return $person;
	}

	/**
	 * Update a Person's data.
	 * @param array $data The data to be updated.
	 * @param int $id The Person's id.
	 * @return int 1 for True/Success, 0 for False/Failure.
	 */
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

	/**
	 * Delete a Person from the database.
	 * @param int $id The Person's id.
	 * @return array
	 */
	public function deletePerson(int $id)
	{
		$query = $this->person->query();
		$query->where('id', $id)->delete();
		return ['id' => $id];
	}
}