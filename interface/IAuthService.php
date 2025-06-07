<?php
require_once __DIR__ . '/../model/User.php';

interface IAuthService {
    public function register(User $newUser);
    public function login($username, $password);
    public function logout();
}