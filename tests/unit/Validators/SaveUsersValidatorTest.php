<?php

/**
 * @group Validators
 */
class SaveUsersValidatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException App\Exceptions\ValidationException
     */
    public function itThrowsExceptionForInvalidFirstName()
    {
        $validator = new App\Validators\SaveUserValidator;
        $validator->validate([
            ['firstName' => '', 'lastName' => 'XXX']
        ]);
    }

    /**
     * @test
     * @expectedException App\Exceptions\ValidationException
     */
    public function itThrowsExceptionForInvalidLastName()
    {
        $validator = new App\Validators\SaveUserValidator;
        $validator->validate([
            ['firstName' => 'aaa', 'lastName' => false]
        ]);
    }

    /**
     * @test
     * @expectedException App\Exceptions\ValidationException
     */
    public function itThrowsExceptionForInvalidEntry()
    {
        $validator = new App\Validators\SaveUserValidator;
        $validator->validate([
            []
        ]);
    }

    /**
     * @test
     */
    public function itReturnsTrueForValidData()
    {
        $validator = new App\Validators\SaveUserValidator;
        $isValid = $validator->validate([
            ['firstName' => 'Darren', 'lastName' => 'Taylor']
        ]);

        $this->assertTrue($isValid);
    }
}