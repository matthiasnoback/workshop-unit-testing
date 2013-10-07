<?php

namespace UnitTestingWorkshop\Tests;

use UnitTestingWorkshop\Dangerous;

class ExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_throws_an_exception()
    {
        $dangerous = new Dangerous();

        $this->setExpectedException('\RuntimeException', 'wrong');

        $dangerous->throwException();
        //$dangerous->safe();
    }

    /**
     * @test
     */
    public function equivalent_test_for_a_specific_exception()
    {
        $dangerous = new Dangerous();

        try {
            $dangerous->throwException();
            $this->fail('Expected a RuntimeException to be thrown');
        } catch (\RuntimeException $exception) {
            // that's right!
        }
    }

    /**
     * @test
     */
    public function no_exceptions_may_occur()
    {
        // somewhat of a bad test, right?
        // test for something that does not happen?

        $dangerous = new Dangerous();
        $dangerous->safe();
    }

    /**
     * @test
     */
    public function no_really()
    {
        // the same thing

        $dangerous = new Dangerous();

        try {
            $dangerous->safe();
        } catch (\Exception $anyException) {
            $this->fail('No exception should have occurred');
        }
    }
}
