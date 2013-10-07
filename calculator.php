<?php

require __DIR__.'/vendor/autoload.php';

$calculator = new \Calculator\Calculator();
$output = new \Calculator\Output();
$dialog = new \Calculator\Dialog($output);
$interactiveCalculator = new \Calculator\InteractiveCalculator($calculator, $output, $dialog);

$interactiveCalculator->run();
