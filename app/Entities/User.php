<?php namespace App\Entities;

/**
 * User Class
 * 
 * Represents a User around the system, regardless of it's source.
 */
class User {

	/**
	 * Users First Name
	 * @var string
	 */
	private $firstName;

	/**
	 * Users Last Name
	 * @var string
	 */
	private $lastName;

	/**
	 * Set Users First Name
	 * @param string $firstName
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}

	/**
	 * Public getter for Users first name
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * Set Users Last Name
	 * @param string $lastName
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}

	/**
	 * Public getter for Users last Name
	 * @return string
	 */
	public function getLastName()
	{
		return $this->lastName;
	}

}