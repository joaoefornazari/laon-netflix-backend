<?php
 
namespace App\Http\Services;
 
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Ramsey\Uuid\Rfc4122\UuidV4;

class UserService extends ServiceProvider
{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Create a new user.
	 * @param array $data The data to create user.
	 * @return array
	 */
	public function createUser(array $data)
	{
		$query = $this->user->query();
		$uuid = UuidV4::getFactory()->uuid4();

		$result = $query->create([
			'id' => $uuid->toString(),
			'full_name' => $data['full_name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		])->toArray();

		$result['id'] = $uuid->toString();

		return $result;
	}

	/**
	 * Get a user from the database.
	 * @param string $uuid The user's uuid.
	 * @return array
	 */
	public function getUser(string $uuid)
	{
		$query = $this->user->query();

		return $query
			->where('id', $uuid)
			->get(['full_name', 'email'])
			->toArray();
	}

	/**
	 * Update user data.
	 * @param string $uuid The user's uuid.
	 * @param array $data The new data to insert on the referred uuid's data.
	 * @return int
	 */
	public function updateUser(string $uuid, array $data)
	{
		$query = $this->user->query();

		$params = [];
		
		if (array_key_exists('full_name', $data)) {
			$params['full_name'] = $data['full_name'];
		}

		if (array_key_exists('password', $data)) {
			$params['password'] = $data['password'];
		}

		if (array_key_exists('email', $data)) {
			$params['email'] = $data['email'];
		}

		return $query->where('id', $uuid)->update($params);
	}

	/**
	 * Delete the user referred by a UUID.
	 * @param string $uuid The user's UUID.
	 * @return
	 */
	public function deleteUser(string $uuid)
	{
		$query = $this->user->query();
		$query->where('id', $uuid)->delete();
		
		return ['id' => $uuid];
	}

}