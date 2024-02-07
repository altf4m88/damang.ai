<?php

namespace App\Services;


class User
{
    public $name;
    public $date_of_birth;
    public $gender;

    public function updateUser(string $name, int $age, string $gender): void {
        // Update user logic here
        // This could be an Eloquent model, so you might want to use Eloquent's built-in update methods
    }
}