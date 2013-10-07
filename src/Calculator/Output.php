<?php

namespace Calculator;

class Output implements OutputInterface
{
    private $out;

    public function __construct()
    {
        $this->out = fopen('php://stdout', 'w');
    }

    public function writeln($message)
    {
        $this->raw($message."\n");
    }

    public function raw($message)
    {
        fwrite($this->out, $message);
    }
}
