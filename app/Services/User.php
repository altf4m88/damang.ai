<?php

namespace App\Services;


class User
{
    public $name;
    public $date_of_birth;
    public $gender;

    public function __construct(string $name, int $age, string $gender)
    {
        $this->name = $name;
        $this->date_of_birth = $age;
        $this->gender = $gender;
    }

    public function updateUser(string $name, int $age, string $gender): void {
        // Update user logic here
        // This could be an Eloquent model, so you might want to use Eloquent's built-in update methods
    }

    public function createUser(string $name, int $age, string $gender): void {
        // Update user logic here
        // This could be an Eloquent model, so you might want to use Eloquent's built-in update methods

        $user = User::create([
            'name' => $name,
            'date_of_birth' => $age,
            'gender' => $gender
        ]);



    }
}