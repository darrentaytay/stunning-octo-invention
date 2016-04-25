<?php namespace App\Repositories;

/**
 * UserRepository
 * 
 * Interface to be implemented by all UserRepository Implementations.
 */
interface UserRepository {

	public function all();
	public function reset($users);
	
}