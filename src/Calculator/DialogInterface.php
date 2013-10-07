<?php

namespace Calculator;

interface DialogInterface
{
    public function ask($question, $defaultAnswer = null);
}
