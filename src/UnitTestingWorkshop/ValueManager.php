<?php
namespace UnitTestingWorkshop;

class ValueManager
{
    private $registry;

    public function __construct(RegistryInterface $registry)
    {
        $this->registry = $registry;
    }

    public function setValue($key, $value, $override = true)
    {
        if (!$override && $this->registry->has($key)) {
            return null;
        }

        $this->registry->set($key, $value);
    }

    public function setValueSafe($key, $value)
    {
        $this->registry->set($key, $value);

        $storedValue = $this->registry->get($key);

        if ($storedValue !== $value) {
            throw new \RuntimeException('Stored value is incorrect');
        }
    }
}
