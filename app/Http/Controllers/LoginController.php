<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class LoginController extends Controller
{

	/**
	 * Handle an authentication attempt.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function authenticate(Request $request)
	{
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required'],
		]);

		try {
			if (!Auth::attempt($credentials)) {
				throw new Exception('User not found. Check credentials again.', 404);
			} else {	
				$user = Auth::user();
				return $this->success(['uuid' => $user->id], "User logged in succesfully.", 200);
			}
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());	
		}
				
	}
}