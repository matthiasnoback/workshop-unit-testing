<?php

namespace Calculator;

interface OutputInterface
{
    public function writeln($message);

    public function raw($message);
}
