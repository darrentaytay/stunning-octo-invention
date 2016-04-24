<?php namespace App\Controllers;

use App\Repositories\UserRepository;
use App\Template\Templater;

/**
 * UserController Class
 */
class UserController {

	public function __construct(UserRepository $userRepository, Templater $templater)
	{
		$this->userRepository = $userRepository;
		$this->templater      = $templater;
	}

	/**
	 * Display list of Users
	 * @return string
	 */
	public function index()
	{
		$users = $this->userRepository->all();

		return $this->templater->render('users/index', ['users' => $users]);
	}

}