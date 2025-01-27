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
	 * @return int
	 */
	public function createUser(array $data)
	{
		$query = $this->user->query();
		$uuid = UuidV4::getFactory()->uuid4();

		return $query->create([
			'id' => $uuid->toString(),
			'full_name' => $data['full_name'],
			'email' => $data['email'],
			'password' => $data['password'],
		])->toArray();
	}

}