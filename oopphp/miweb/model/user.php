<?php
require_once 'connection.php';

class User extends Connection{

    protected function setUser($username, $password, $email){
        $error = false;
        $stmt = $this->connect()->prepare("INSERT INTO users (username, password, email) VALUES (?,?,?)");

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $hashedPwd, $email))){
            $error = true;
        }
        $stmt = null;
        return $error;

    }

    protected function checkUser($username, $email){
        $stmt = $this->connect()->prepare("SELECT username FROM users WHERE username = ? OR email = ?;");
        if(!$stmt->execute(array($username, $email))){
            $stmt = null;
            header("Location: .../view/signup.html?error=stmtfailed");
            exit();
        }
        $resultCheck = false;
        if($stmt->rowCount()>0){
            $resultCheck = true;
        }

        return $resultCheck;
    }

    protected function showUsers() {
        try {
            // Prepare the SQL statement
            $stmt = $this->connect()->prepare("SELECT username, email FROM users;");
            $results = [];
    
            // Execute the statement
            if (!$stmt->execute()) {
                // Log the error if execution fails
                error_log("Failed to execute query: " . implode(", ", $stmt->errorInfo()));
                $stmt = null;
                return $results;
            }
    
            // Fetch and return the results as an associative array
            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
    
            // Close the statement
            $stmt = null;
            return $results;
    
        } catch (PDOException $e) {
            // Log any exceptions
            error_log("Database error: " . $e->getMessage());
            return [];
        }
    }
    
    
}
