<?php namespace App\Repositories\JSON;

use App\Repositories\UserRepository;

/**
 * JSONUserRepository
 * 
 * JSON implementation of the UserRepository.
 */
class JSONUserRepository implements UserRepository {

	private $jsonPath = __DIR__ . '/../../../storage/users.json';

	public function __construct(JSONUserTransformer $transformer)
	{
		$this->transformer = $transformer;
		$this->data        = json_decode(file_get_contents($this->jsonPath));
	}

	/**
	 * Return all Users.
	 * @return array
	 */
    public function all()
    {
        return $this->transformer->collection($this->data);
    }

    /**
     * Reset the data store with new information
     * @param  array $users
     * @return boolean
     */
    public function reset($users)
    {
		$filePointer = fopen($this->jsonPath, 'w');
		fwrite($filePointer, json_encode($users));
		fclose($filePointer);
    }
	
}