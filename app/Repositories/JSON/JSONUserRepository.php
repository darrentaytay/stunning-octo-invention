<?php namespace App\Repositories\JSON;

use App\Repositories\UserRepository;

/**
 * JSONUserRepository
 * 
 * JSON implementation of the UserRepository.
 */
class JSONUserRepository implements UserRepository {

	public function __construct(JSONUserTransformer $transformer)
	{
		$this->transformer = $transformer;
		$this->data        = json_decode(file_get_contents(__DIR__ . '/../../../storage/users.json'));
	}

	/**
	 * Return all Users.
	 * @return array
	 */
    public function all()
    {
        return $this->transformer->collection($this->data);
    }
	
}