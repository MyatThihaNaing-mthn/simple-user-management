<?php
require_once __DIR__ . '/../enum/UserRole.php';
require_once __DIR__ . '/../enum/UserStatus.php';

class User {
    private $username;
    private $password;
    private $email;
    private $lastLogin;
    private UserRole $role;
    private UserStatus $status;

    public function __construct($username, $password, $email, UserRole $role = UserRole::MEMBER, UserStatus $status = UserStatus::ACTIVE) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->lastLogin = date('Y-m-d H:i:s');
        $this->role = $role;
        $this->status = $status;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getLastLogin() {
        return $this->lastLogin;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}
?> 