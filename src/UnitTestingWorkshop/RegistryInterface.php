<?php
namespace UnitTestingWorkshop;

interface RegistryInterface
{
    public function has($key);

    public function set($key, $value);

    public function get($key);
}
