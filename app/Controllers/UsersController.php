<?php

namespace App\Controllers;

use App\Models\Collections\UsersCollection;
use App\Models\User;
use App\Repositories\CheckUpRepository\CheckUpRepository;

class UsersController
{

    private CheckUpRepository  $checkUpRepository;
    private UsersRepository $usersRepository;

    public function __construct()
    {
        $this->checkUpRepository = new CheckUpRepository();
        $this->usersRepository = new UsersRepository();
    }
    public function register()
    {
        if (!empty($_POST['name']) && !empty($_POST['email']) && $_POST['password'] === $_POST['repeat_password']) {
            if ($this->checkUpRepository->checkUp($_POST['name'], $_POST['email'])) {
                $user = new User(
                    Uuid::uuid4(),
                    $_POST['email'],
                    $_POST['name'],
                    password_hash($_POST['password'], PASSWORD_BCRYPT)
                );
                $this->usersRepository->addUser($user);
            } else {
                echo "User already exist";
            }
        }
    }

}
