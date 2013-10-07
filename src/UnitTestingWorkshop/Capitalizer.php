<?php
namespace UnitTestingWorkshop;

class Capitalizer
{
    public function capitalizeUsername(UserInterface $user)
    {
        return ucfirst($user->getUsername());
    }
}
