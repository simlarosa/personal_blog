<?php

class User
{
    private $id;
    private $email;
    private $password;
    private $name;
    private $role;

    public function __construct(string $email, string $password, string $name, string $role)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->role = $role;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function setPassword(string $password){
        $this->password = $password;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setRole(string $role) {
        $this->role = $role;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getRole(): string {
        return $this->role;
    }

    public function getId(): int {
        return $this->id;
    }
}
