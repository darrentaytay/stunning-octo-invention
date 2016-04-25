<?php namespace App\Controllers;

use App\Repositories\UserRepository;
use App\Template\Templater;
use App\Validators\SaveUserValidator;
use App\Exceptions\ValidationException;

/**
 * UserController Class
 */
class UserController {

    public function __construct(UserRepository $userRepository, Templater $templater, SaveUserValidator $validator)
    {
        $this->userRepository = $userRepository;
        $this->templater      = $templater;
        $this->validator      = $validator;
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

    /**
     * Save the list of Users
     * @return JSON
     */
    public function save()
    {
        $inputJSON = file_get_contents('php://input');
        $input     = json_decode( $inputJSON, TRUE );

        try {
            $this->validator->validate($input);
            $this->userRepository->reset($input);
        }
        catch(ValidationException $exception)
        {
            return json_encode(['error' => sprintf('Validation Exception: %s', $exception->getMessage())]);
        }

    }

}