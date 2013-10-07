<?php

namespace Calculator;

interface CalculatorInterface
{
    public function plus($left, $right);

    public function minus($left, $right);

    public function times($left, $right);

    public function dividedBy($left, $right);
}
