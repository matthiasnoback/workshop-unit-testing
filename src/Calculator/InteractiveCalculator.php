<?php

namespace Calculator;

class InteractiveCalculator
{
    private $output;
    private $dialog;
    private $calculator;

    public function __construct(CalculatorInterface $calculator, OutputInterface $output, DialogInterface $dialog)
    {
        $this->output = $output;
        $this->dialog = $dialog;
        $this->calculator = $calculator;
    }

    public function run()
    {
    }
}
