<?php namespace App\Validators;

use App\Exceptions\ValidationException;

class SaveUserValidator {

	public function validate($users)
	{
		foreach($users as $user)
		{
			if(!isset($user['firstName']) || empty($user['firstName']))
			{
				throw new ValidationException('First Name is required');
			}

			if(!isset($user['firstName']) || empty($user['lastName']))
			{
				throw new ValidationException('Last Name is required');
			}
		}

		return true;
	}

}