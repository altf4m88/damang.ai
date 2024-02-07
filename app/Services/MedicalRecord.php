<?php

namespace App\Services;


class MedicalRecord
{
    public $medicalCondition;
    public $allergies;
    public $weight;
    public $height;


    public function updateMedicalRecord(string $medicalCondition, string $allergies, float $weight, float $height): void {
        // Update medical record logic here
    }

    public function addMedicalRecord(MedicalRecord $data): void {
        // Add medical record logic here
    }

    public function getMedicalRecord(): MedicalRecord {
        // Get medical record logic here
    }
}