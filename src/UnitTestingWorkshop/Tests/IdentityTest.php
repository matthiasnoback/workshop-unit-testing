<?php

namespace UnitTestingWorkshop\Tests;

class IdentityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function two_scalar_variables_are_the_same_if_their_types_match()
    {
        $this->assertSame('1', '1');
        $this->assertSame(1, 1);
        //$this->assertSame('1', 1);
    }

    /**
     * @test
     */
    public function two_arrays_are_the_same_if_all_values_are_the_same()
    {
        $this->assertSame(
            array(1 => 'value1'),
            array(1 => 'value1')
        );
//        $this->assertSame(
//            array(0 => 'value1'),
//            array(1 => 'value1')
//        );
    }

    /**
     * @test
     */
    public function two_objects_are_the_same_if_they_are_the_same()
    {
        $object1 = new \DateTime();
        $object2 = new \DateTime();
        $object3 = $object1;

        $this->assertSame($object1, $object3);
        $this->assertNotSame($object1, $object2);
        //$this->assertSame($object1, $object3);
    }
}
