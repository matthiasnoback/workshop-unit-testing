<?php

namespace UnitTestingWorkshop\Tests;

class EqualityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function two_scalar_values_are_equal_even_if_their_types_are_not_the_same()
    {
        $this->assertEquals('1', 1);
        $this->assertEquals(null, '');
        $this->assertEquals(false, '');
    }

    /**
     * @test
     */
    public function two_numerically_indexed_arrays_are_equal_if_their_values_match_in_the_order_of_their_numeric_keys()
    {
        $this->assertEquals(
            array(
                2 => 'value2',
                1 => 'value1'
            ),
            array(
                1 => 'value1',
                2 => 'value2'
            )
        );
    }

    /**
     * @test
     */
    public function two_associative_arrays_are_equal_if_the_values_and_corresponding_keys_match()
    {
        $this->assertEquals(
            array(
                'key1' => 'value1',
                'key2' => 'value2'
            ),
            array(
                'key2' => 'value2',
                'key1' => 'value1'
            )
        );
    }

    /**
     * @test
     */
    public function two_objects_are_equal_if_their_properties_have_an_equal_value()
    {
        $object1 = new \stdClass();
        $object1->property = 'value';

        $object2 = new \stdClass();
        $object2->property = 'value';

        $this->assertEquals($object1, $object2);

        $this->assertNotSame($object1, $object2);
    }
}
