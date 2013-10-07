<?php

namespace UnitTestingWorkshop\Tests;

use UnitTestingWorkshop\ValueManager;

/**
 * An example of a test case that makes use of mocks
 */
class MockTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_does_not_modify_existing_value_if_asked_not_to_override()
    {
        $key = 'some key';

        $registry = $this->getMock('UnitTestingWorkshop\RegistryInterface');
        $registry
            ->expects($this->once())
            ->method('has')
            ->will($this->returnValue(true));

        $registry
            ->expects($this->never())
            ->method('set');

        $valueManager = new ValueManager($registry);
        $valueManager->setValue($key, 'value', false);
    }

    /**
     * @test
     */
    public function it_stores_values_safely_by_verifying_the_stored_value()
    {
        $key = 'some key';
        $value = 'some value';

        $registry = $this->getMock('UnitTestingWorkshop\RegistryInterface');
        $registry
            ->expects($this->at(0))
            ->method('set')
            ->with($key)
            ->will($this->returnValue(true));

        $registry
            ->expects($this->at(1))
            ->method('get')
            ->with($key)
            ->will($this->returnValue($value));

        $valueManager = new ValueManager($registry);
        $valueManager->setValueSafe($key, $value);
    }
}
