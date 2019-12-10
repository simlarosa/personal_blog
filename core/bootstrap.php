<?php
require_once 'core/post-repository.php';

session_start();

// Versione con tabella utenti
const ADMIN_EMAIL = 'admin@admin.it';
const ADMIN_PASSWORD_HASH = '$2y$12$X8oiIDcFef1UdBpSxEZhJO.tO05Ts7BZnMY6Ehsd8EjMTN9O5Z8XW'; //admin

function loginUser($email, $password)
{
    if ($email === ADMIN_EMAIL) {
        if (password_verify($password, ADMIN_PASSWORD_HASH)) {
            $_SESSION['loggedUser'] = [
                'name' => 'Admin',
                'email' => $email,
            ];

            return true;
        }
    }
    return false;
}

function isLogged()
{
    return isset($_SESSION['loggedUser']);
}

function logoutUser()
{
 unset($_SESSION['loggedUser']);
}