<?php

class User
{
    private $id;
    private $email;
    private $password;

    //dichiarazioni costanti
    const ADMIN_EMAIL = 'admin@admin.it';
    const ADMIN_PASSWORD_HASH = '$2y$12$X8oiIDcFef1UdBpSxEZhJO.tO05Ts7BZnMY6Ehsd8EjMTN9O5Z8XW'; //admin

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser(): bool
    {
        if ($this->email === ADMIN_EMAIL) {
            if (password_verify($this->password, ADMIN_PASSWORD_HASH)) {
                $_SESSION['loggedUser'] = [
                    'name' => 'Admin',
                    'email' => $this->email,
                ];
                return true;
            }
        }
        return false;
    }

    public function isLogged()
    {
        return isset($_SESSION['loggedUser']);
    }

    public function logoutUser()
    {
        unset($_SESSION['loggedUser']);
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function setPassword(string $password){
        $this->password = $password;
    }
}
