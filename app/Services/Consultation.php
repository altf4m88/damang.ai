<?php

namespace App\Services;

use Carbon\Carbon;

abstract class Consultation
{
    protected $startDate;
    protected $endDate;

    public function __construct(Carbon $startDate, Carbon $endDate) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function getSessions(): void {
        // Get sessions logic here
    }

    public function startConsultation(): void {
        // Start consultation logic here
    }

    public function endConsultation(): void {
        // End consultation logic here
    }
}