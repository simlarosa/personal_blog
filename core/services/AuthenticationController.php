<?php

require_once '/Applications/MAMP/htdocs/personal_blog/core/model/UserRepository.php';

class AutenthicationController
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function loginUser($email, $password)
    {
        if($userForLogin = $this->userRepo->getUserByEmail($email)){
            if(password_verify($password, $userForLogin->getPassword())){
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $userForLogin->getId();
                $_SESSION["email"] = $userForLogin->getEmail();
                return true;
            }
        } else {
            return false;
        }
    }

    public function registerUser($email, $password, $name, $role){
        if(!$this->userRepo->verifyUser($email)){
            $user = new User($email, $password, $name, $role);
            if($this->userRepo->addUser($user)){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isLogged()
    {
        return isset($_SESSION['loggedin']);
    }

    public function logoutUser()
    {
        unset($_SESSION['loggedin']);
    }
}
