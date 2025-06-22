<?php

namespace Database\Users;

require_once __DIR__ . "/index.php";

class User
{
    public $id;
    public string $username;
    public string $role;
    public string $teamID;

    public function __construct(array $queryRes)
    {
        $this->id = (int)$queryRes['id'];
        $this->username = $queryRes['username'];
        $this->role = $queryRes['role'];
        $this->teamID = (int)$queryRes['team_id'];
    }
}

function getUserById(int $userId): ?User
{
    // if (!\Database\DatabaseConnection::isConnected()) {
    //     $result = \Database\DatabaseConnection::connect();

    //     if ($result !== true) {
    //         throw $result;
    //     }
    // }

    // $query = "SELECT * FROM users WHERE id = :id";
    // $stmt = \Database\DatabaseConnection::$instance->prepare($query);
    // $stmt->bindParam(':id', $userId, \PDO::PARAM_INT);
    // $stmt->execute();

    // $result = $stmt->fetch(\PDO::FETCH_ASSOC);

    $result = [
        'id' => 1,
        'username' => 'Nikodem',
        'role' => 'user',
        'team_id' => 1
    ];

    if ($result) {
        return new User($result);
    }

    return null;
}

function getUserWithCredentials(string $username, string $password)
{
    // if (!DatabaseConnection::isConnected()) {
    //     $result = DatabaseConnection::connect();

    //     if ($result !== true) {
    //         throw $result;
    //     }
    // }

    // $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    // $stmt = self::$instance->prepare($query);
    // $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    // $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    // $stmt->execute();
    // return $stmt->fetch(PDO::FETCH_ASSOC);

    $result = [
        'id' => 1,
        'username' => $username,
        'role' => 'user'
    ];

    if ($result) {
        return new User($result);
    }

    return null;
}

function getUserWithUsername(string $username)
{
    // if (!DatabaseConnection::isConnected()) {
    //     $result = DatabaseConnection::connect();

    //     if ($result !== true) {
    //         throw $result;
    //     }
    // }

    // $query = "SELECT * FROM users WHERE username = :username";
    // $stmt = self::$instance->prepare($query);
    // $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    // $stmt->execute();
    // return $stmt->fetch(PDO::FETCH_ASSOC);

    $result = [
        'id' => 1,
        'username' => $username,
        'role' => 'team_owner'
    ];

    if ($result) {
        return new User($result);
    }

    return null;
}

function getUsersByTeamId($teamId)
{
    // if (!DatabaseConnection::isConnected()) {
    //     $result = DatabaseConnection::connect();

    //     if ($result !== true) {
    //         throw $result;
    //     }
    // }

    // $query = "SELECT * FROM users WHERE team_id = :teamId";
    // $stmt = self::$instance->prepare($query);
    // $stmt->bindParam(':teamId', $teamId, PDO::PARAM_INT);
    // $stmt->execute();
    // return $stmt->fetch(PDO::FETCH_ASSOC);

    $result = [
        [
            'id' => 0,
            'username' => "Some user 0",
            'role' => 'user',
            'team_id' => $teamId
        ],
        [
            'id' => 1,
            'username' => "Some user 1",
            'role' => 'user',
            'team_id' => $teamId
        ],
        [
            'id' => 2,
            'username' => "Some user 1",
            'role' => 'user',
            'team_id' => $teamId
        ]
    ];

    if ($result) {
        return array_map(fn($res) => new User($res), $result);
    }

    return null;
}

function getAllUsers()
{
    // if (!DatabaseConnection::isConnected()) {
    //     $result = DatabaseConnection::connect();

    //     if ($result !== true) {
    //         throw $result;
    //     }
    // }

    // $query = "SELECT * FROM users WHERE team_id = :teamId";
    // $stmt = self::$instance->prepare($query);
    // $stmt->bindParam(':teamId', $teamId, PDO::PARAM_INT);
    // $stmt->execute();
    // return $stmt->fetch(PDO::FETCH_ASSOC);

    $result = [
        [
            'id' => 0,
            'username' => "Some user 0",
            'role' => 'user',
            'team_id' => 1
        ],
        [
            'id' => 1,
            'username' => "Some user 1",
            'role' => 'user',
            'team_id' => 1
        ],
        [
            'id' => 2,
            'username' => "Some user 1",
            'role' => 'user',
            'team_id' => 1
        ]
    ];

    if ($result) {
        return array_map(fn($res) => new User($res), $result);
    }

    return null;
}

function createUser($username, $password)
{
    // if (!DatabaseConnection::isConnected()) {
    //     $result = DatabaseConnection::connect();

    //     if ($result !== true) {
    //         throw $result;
    //     }
    // }

    $passwordHash = hash('sha256', $password);

    // $query = 'INSERT INTO users (`username`, `password`, `role`) VALUES (:username, :password, "user")';
    // $stmt = self::$instance->prepare($query);
    // $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    // $stmt->bindParam(':password', $passwordHash, PDO::PARAM_STR);
    // $stmt->execute();
    // return $stmt->fetch(PDO::FETCH_ASSOC);
}
