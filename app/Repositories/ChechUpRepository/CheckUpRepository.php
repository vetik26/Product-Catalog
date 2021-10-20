<?php

namespace App\Repositories\CheckUpRepository;


class CheckUpRepository
{
    public function checkUp(string $newUserName, string $newUserEmail): bool
    {
        $row = new UsersRepository();
        $values = $row->getRow(['name', 'email']);
        if (in_array($newUserName, $values[0]) || in_array($newUserEmail, $values[1])) {
            return false;
        } else {
            return true;
        }
    }

    public function loginCheckUp(string $userName, string $password): bool
    {
        $row = new UsersRepository();
        $values = $row->getRow(['name', 'password']);
        if (in_array($userName, $values[0]) && password_verify($password, $values[1][array_search($userName, $values[0])])) {
            return true;
        } else {
            return false;
        }
    }
}