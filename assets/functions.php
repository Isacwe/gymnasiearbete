<?php
function hashPass($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}
function addUser($login) {
    global $blewIt;
    $sql = "INSERT INTO User (username, displayname, password, email) VALUES (:username, :displayname, :password, :email)";
    $stmt = $blewIt->prepare($sql);
    $stmt->bindParam(':username', $login['username']);
    $stmt->bindParam(':displayname', $login['displayname']);
    $stmt->bindParam(':password', $login['password']);
    $stmt->bindParam(':email', $login['email']);
    try {
        $stmt->execute();
        $id = getUserId($login['username']);
        return $id;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function sendDirectMessage($sender_Id, $content, $dmId){
    global $blewIt;
    $sql = "INSERT INTO Message (Sender_Id, Content, DM_Id) VALUES (:sender, :content, :dmId)";
    $stmt = $blewIt->prepare($sql);
    $stmt->bindParam(':sender', $sender_Id);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':dmId', $dmId);
    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function sendChannelMessage($sender_Id, $content, $channelId){
    global $blewIt;
    $sql = "INSERT INTO Message (Sender_Id, Content, Channel_Id) VALUES (:sender, :content, :channel_Id)";
    $stmt = $blewIt->prepare($sql);
    $stmt->bindParam(':sender', $sender_Id);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':channel_Id', $channelId);
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
        return $result['user_Id'];
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
function createDM($userId, $userName) {
    $user2 = getUserId($userName);
    if($user2){
        global $blewIt;
        $sql = "INSERT INTO Direct_Message () VALUES ()";
        $stmt = $blewIt->prepare($sql);
        try {
            $dmId = $blewIt->lastInsertId();
            $sql = "INSERT INTO Direct_Message_member (DM_Id, User_Id) VALUES (:dmId, :userId1)";
            $stmt = $blewIt->prepare($sql);
            $stmt->bindParam(':userId1', $userId);
            $stmt->bindParam(':userId2', $user2);
            $stmt->execute();
            return $dmId;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    } else {
        echo "Check added user's username!";
        return false;
    }
}

function getDmList($userId) {
    global $blewIt;
    $sql = "SELECT DM_Id FROM Direct_Message_member WHERE User_Id = :userId";
    $stmt = $blewIt->prepare($sql);
    $stmt->bindParam(':userId', $userId);
    try {
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function createRoom($roomName){
    global $blewIt;
    $sql = "INSERT INTO Room (Name) VALUES (:roomName)";
    $stmt = $blewIt->prepare($sql);
    $stmt->bindParam(':roomName', $roomName);
    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getRoleId($roleName, $room_id) {
    global $blewit;
    $sql = "SELECT Role_Id FROM Role WHERE Name = :roleName AND Room_Id = :room_id";
    $stmt = $blewIt-prepare($sql);
    $stmt->bindParam(':roleName', $roleName);
    $stmt->bindParam(':room_id', $room_id);
    try{
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: ". $e->getMessage();
        return false;
    }
}
function addRoomUser($roomName, $user, $role){
    global $blewIt;
    $sql = "INSERT INTO Room_member (Room_Id, User_Id, Role_Id) VALUES (:room_id, :user_id, :role_id)";
    $stmt = $blewIt->prepare($sql);
    $stmt->bindParam(':Room_id', $room_id);
    $stmt->bindParam(':user:id', getUserId($user));
    $stmt->bindParam(':role_id', getRoleId($role, $roomName));
    try{
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: ". $e->getMessage();
        return false;
    }

}
