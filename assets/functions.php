<?php
function hashPass($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}
function addUser($login) {
    global $blewIt;
    $sql = "INSERT INTO users (username, displayname, password, email, createdAt) VALUES (:username, :displayname, :password, :email, :createdAt)";
    $stmt = $blewIt->prepare($sql);
    $stmt->bindParam(':username', $login['username']);
    $stmt->bindParam(':displayname', $login['displayname']);
    $stmt->bindParam(':password', $login['password']);
    $stmt->bindParam(':email', $login['email']);
    $stmt->bindParam(':createdAt', $login['createdAt']);
    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getUserId($username) {
    global $blewIt;
    $sql = "SELECT user_Id FROM users WHERE username = :username";
    $stmt = $blewIt->prepare($sql);
    $stmt->bindParam(':username', $username);
    try {
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function login($username, $password) {
    global $blewIt;
    $sql = "SELECT password FROM users WHERE username = :username";
    $stmt = $blewIt->prepare($sql);
    $stmt->bindParam(':username', $username);
    try {
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result && password_verify($password, $result['password'])) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getUserInfo($username) {
    global $blewIt;
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $blewIt->prepare($sql);
    $stmt->bindParam(':username', $username);
    try {
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}