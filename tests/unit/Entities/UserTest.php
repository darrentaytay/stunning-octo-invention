<?php

/**
 * @group Entities
 * @group Entities\User
 */
class UserEntityTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itSetsAndGetsProperties()
    {
        $user = new App\Entities\User;
        $user->setFirstName('Luis');
        $user->setLastName('Suarez');

        $this->assertEquals('Luis', $user->getFirstName());
        $this->assertEquals('Suarez', $user->getLastName());
    }
}