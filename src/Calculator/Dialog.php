<?php

namespace Calculator;

class Dialog implements DialogInterface
{
    private $output;

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    public function ask($question, $defaultAnswer = null)
    {
        $this->output->raw($question.($defaultAnswer !== null ? ' ['.$defaultAnswer.'] ':''));

        $handle = fopen('php://stdin', 'r');
        $answer = trim(fgets($handle), "\n");
        if ($answer === '' && $defaultAnswer !== null) {
            $answer = $defaultAnswer;
        }

        return $answer;
    }
}
