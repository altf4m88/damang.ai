<?php

namespace App\Services;


class Session extends Consultation
{
    protected $question;
    protected $answer;

    public function ask(): void {
        // Ask logic here
    }

    public function answer(): void {
        // Answer logic here
    }
}