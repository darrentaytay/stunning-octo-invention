<?php

/**
 * @group Repositories
 * @group Repositories\User
 * @group Repositories\User\JSON
 */
class JSONUserTransformerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itTransformsArrayToUserEntities()
    {
        $sampleData = $this->getSampleData();

        $jsonTransformer = new App\Repositories\JSON\JSONUserTransformer;
        $transformedUsers = $jsonTransformer->collection($sampleData);

        $this->assertEquals(2, count($transformedUsers));
        $this->assertEquals('App\Entities\User', get_class($transformedUsers[0]));
        $this->assertEquals('App\Entities\User', get_class($transformedUsers[1]));
    }

    private function getSampleData()
    {
        return [
            (object)[
                'firstName' => 'Test Darren',
                'lastName' => 'Test Taylor'
            ],
            (object)[
                'firstName' => 'Test Taylor',
                'lastName' => 'Test Taylor'
            ],
        ];
    }
}