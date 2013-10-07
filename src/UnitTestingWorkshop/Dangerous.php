<?php
namespace UnitTestingWorkshop;

class Dangerous
{
    public function throwException()
    {
        throw new \RuntimeException('Something is wrong');
    }

    public function safe()
    {

    }
}
