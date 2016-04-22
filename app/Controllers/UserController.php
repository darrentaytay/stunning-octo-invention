<?php namespace App\Controllers;

use App\Repositories\UserRepository;

/**
 * UserController Class
 */
class UserController {

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * Display list of Users
	 * @return string
	 */
	public function index()
	{
		$users = $this->userRepository->all();

		return view('users/index', compact('users'));
	}

}