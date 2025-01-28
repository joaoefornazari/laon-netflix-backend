<?php
 
namespace App\Http\Services;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
			'password' => $data['password'],
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

}