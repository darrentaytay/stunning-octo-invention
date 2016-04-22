<?php namespace App\Repositories\JSON;

use App\Entities\User;

/**
 * JSONUserTransformer
 * 
 * Transforms JSON into an array of User Entities.
 */
class JSONUserTransformer {

	public function collection($collection)
	{
		$entities = [];

		foreach($collection as $item)
		{
			$user = new User;
			$user->setFirstName($item->first_name);
			$user->setLastName($item->last_name);

			$entities[] = $user;
		}

		return $entities;
	}

}