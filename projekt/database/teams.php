<?php

namespace Database\Teams;

require_once __DIR__ . "/index.php";

class Team
{
    public int $id;
    public string $name;

    public function __construct(array $queryRes)
    {
        $this->id = (int)$queryRes['id'];
        $this->name = $queryRes['name'];
    }
}

function getTeamById(int $teamId): ?Team
{
    // if (!\Database\DatabaseConnection::isConnected()) {
    //     $result = \Database\DatabaseConnection::connect();
    // 
    //     if ($result !== true) {
    //         throw $result;
    //     }
    // }

    // $query = "SELECT * FROM teams WHERE id = :id";
    // $stmt = \Database\DatabaseConnection::$instance->prepare($query);
    // $stmt->bindParam(':id', $teamId, \PDO::PARAM_INT);
    // $stmt->execute();
    // 
    // $result = $stmt->fetch(\PDO::FETCH_ASSOC);

    $result = [
        'id' => $teamId,
        'name' => 'Sample Team',
    ];

    if ($result) {
        return new Team($result);
    }

    return null;
}

function getAllTeams(): array
{
    // if (!\Database\DatabaseConnection::isConnected()) {
    //     $result = \Database\DatabaseConnection::connect();
    // 
    //     if ($result !== true) {
    //         throw $result;
    //     }
    // }

    // $query = "SELECT * FROM teams";
    // $stmt = \Database\DatabaseConnection::$instance->prepare($query);
    // $stmt->execute();
    // 
    // $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    $result = [
        ['id' => 1, 'name' => 'Team A'],
        ['id' => 2, 'name' => 'Team B'],
        ['id' => 3, 'name' => 'Team C'],
        ['id' => 1, 'name' => 'Team A'],
        ['id' => 2, 'name' => 'Team B'],
        ['id' => 3, 'name' => 'Team C'],
        ['id' => 1, 'name' => 'Team A'],
        ['id' => 2, 'name' => 'Team B'],
        ['id' => 3, 'name' => 'Team C'],
        ['id' => 1, 'name' => 'Team A'],
        ['id' => 2, 'name' => 'Team B'],
        ['id' => 3, 'name' => 'Team C'],
        ['id' => 1, 'name' => 'Team A'],
        ['id' => 2, 'name' => 'Team B'],
        ['id' => 3, 'name' => 'Team C'],
        ['id' => 1, 'name' => 'Team A'],
        ['id' => 2, 'name' => 'Team B'],
        ['id' => 3, 'name' => 'Team C'],
    ];

    return array_map(fn($res) => new Team($res), $result);
}
