<?php

namespace UnitTestingWorkshop\Tests;

class StubTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_stores_the_username_in_the_session()
    {
        $capitalizer = new \UnitTestingWorkshop\Capitalizer();

        $user = $this->getMock('UnitTestingWorkshop\UserInterface');
        $user
            ->expects($this->any())
            ->method('getUsername')
            ->will($this->returnValue('matthias'));

        $capitalizedUsername = $capitalizer->capitalizeUserName($user);

        $this->assertSame($capitalizedUsername, 'Matthias');
    }
}
