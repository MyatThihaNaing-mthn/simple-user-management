<?php

require_once __DIR__ . '/../interface/IAuthService.php';
require_once __DIR__ . '/../service/MySqlDbConnector.php';


define('PASSWORD_SALT', 'e952c84d-844b-4a4d-bc6a-c7407c267939');
class AuthService implements IAuthService {

    private $dbConn;

    public function __construct() {
        try {
            $this->dbConn = MySqlDbConnector::connect(
                DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME
            );
        } catch (Exception $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function register(User $newUser) {
        try {
            $hashedPassword = password_hash($newUser->getPassword(), PASSWORD_DEFAULT);
            $status = $newUser->getStatus()->name;
            $role = $newUser->getRole()->name;

            print_r($newUser->getPassword());
            print_r($hashedPassword);
            print_r($newUser->getUsername());
            
            $sql = "INSERT INTO users (username, password, email, role, status) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->dbConn->prepare($sql);
            $stmt->bind_param("sssss", 
                $newUser->getUsername(), 
                $hashedPassword, 
                $newUser->getEmail(),
                $role,
                $status
            );
            $stmt->execute();
            $stmt->close();
            $this->dbConn->close();
        } catch (Exception $e) {
            throw new Exception("Failed to register user: " . $e->getMessage());
        }
    }

    public function login($username, $password) {
        try {
            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt = $this->dbConn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            
            if ($user && password_verify($password, $user['password'])) {
                $this->dbConn->close();
                return $user;
            }
            
            $this->dbConn->close();
            throw new Exception("Invalid username or password");
        } catch (Exception $e) {
            throw new Exception("Failed to login user: " . $e->getMessage());
        }
    }

    public function logout() {}
}