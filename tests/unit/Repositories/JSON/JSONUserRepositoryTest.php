<?php

use \Mockery as m;

/**
 * @group Repositories
 * @group Repositories\User
 * @group Repositories\User\JSON
 */
class JSONUserRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @test
     */
    public function itGetsAllUsers()
    {
        $jsonTransformer = m::mock('App\Repositories\JSON\JSONUserTransformer');
        $jsonTransformer->shouldReceive('collection')->andReturn([1,2,3]);

        $repository = new App\Repositories\JSON\JSONUserRepository($jsonTransformer);
        $users = $repository->all();

        $this->assertEquals(3, count($users));
    }
}