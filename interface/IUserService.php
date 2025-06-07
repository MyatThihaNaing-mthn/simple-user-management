<?php

interface UserService {
    public function createUser($user);
    public function getUser($id);
    public function updateUser($user);
    public function deleteUser($id);
    public function register($username, $password, $email);
}

