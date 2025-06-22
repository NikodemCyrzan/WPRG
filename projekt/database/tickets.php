<?php

namespace Database\Tickets;

require_once __DIR__ . "/index.php";

class Ticket
{
    public int $id;
    public string $title;
    public string $description;
    public int $priority;
    public int $status;
    public int $reporterID;
    public int $assigneeID;
    public int $teamID;
    public int $createTimestamp;
    public int $endTimestamp;
    public int $deadlineTimestamp;

    public function __construct(array $queryRes)
    {
        $this->id = (int)$queryRes['id'];
        $this->title = $queryRes['title'];
        $this->description = $queryRes['description'];
        $this->priority = (int)$queryRes['priority'];
        $this->status = (int)$queryRes['status'];
        $this->reporterID = (int)$queryRes['reporter_id'];
        $this->assigneeID = (int)$queryRes['assignee_id'];
        $this->teamID = (int)$queryRes['team_id'];
        $this->createTimestamp = (int)$queryRes['create_timestamp'];
        $this->endTimestamp = (int)$queryRes['end_timestamp'];
        $this->deadlineTimestamp = (int)$queryRes['deadline_timestamp'];
    }
}

function getTicketById(int $ticketId): ?Ticket
{
    // if (!\Database\DatabaseConnection::isConnected()) {
    //     $result = \Database\DatabaseConnection::connect();

    //     if ($result !== true) {
    //         throw $result;
    //     }
    // }

    // $query = "SELECT * FROM tickets WHERE id = :id";
    // $stmt = \Database\DatabaseConnection::$instance->prepare($query);
    // $stmt->bindParam(':id', $ticketId, \PDO::PARAM_INT);
    // $stmt->execute();

    // $result = $stmt->fetch(\PDO::FETCH_ASSOC);

    $result = [
        'id' => $ticketId,
        'title' => 'Sample Ticket',
        'description' => 'This is a sample ticket description.',
        'priority' => 2,
        'status' => 0,
        'reporter_id' => 1,
        'assignee_id' => 2,
        'team_id' => 1,
        'create_timestamp' => 1673728000,
        'end_timestamp' => 1673728000,
        'deadline_timestamp' => 1673728000
    ];

    if ($result) {
        return new Ticket($result);
    }

    return null;
}

function getTicketsByAssigneeId(int $assigneeId): array
{
    // if (!\Database\DatabaseConnection::isConnected()) {
    //     $result = \Database\DatabaseConnection::connect();

    //     if ($result !== true) {
    //         throw $result;
    //     }
    // }

    // $query = "SELECT * FROM tickets WHERE assignee_id = :assignee_id";
    // $stmt = \Database\DatabaseConnection::$instance->prepare($query);
    // $stmt->bindParam(':assignee_id', $assigneeId, \PDO::PARAM_INT);
    // $stmt->execute();

    // return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    return [
        new Ticket([
            'id' => 1,
            'title' => 'Ticket 1',
            'description' => 'Description for ticket 1',
            'priority' => 1,
            'status' => 0,
            'reporter_id' => 1,
            'assignee_id' => $assigneeId,
            'team_id' => 1,
            'create_timestamp' => 1673728000,
            'end_timestamp' => 1673728000,
            'deadline_timestamp' => 1673728000
        ]),
        new Ticket([
            'id' => 2,
            'title' => 'Ticket 2',
            'description' => 'Description for ticket 2',
            'priority' => 2,
            'status' => 1,
            'reporter_id' => 2,
            'assignee_id' => $assigneeId,
            'team_id' => 1,
            'create_timestamp' => 1673728000,
            'end_timestamp' => 1673728000,
            'deadline_timestamp' => 1673728000
        ]),
        new Ticket([
            'id' => 3,
            'title' => 'Ticket 3',
            'description' => 'Description for ticket 3',
            'priority' => 1,
            'status' => 2,
            'reporter_id' => 2,
            'assignee_id' => $assigneeId,
            'team_id' => 1,
            'create_timestamp' => 1673728000,
            'end_timestamp' => 1673728000,
            'deadline_timestamp' => 1673728000
        ])
    ];
}

function getUnassignedTicketsByTeamId(int $teamId): array
{
    // if (!\Database\DatabaseConnection::isConnected()) {
    //     $result = \Database\DatabaseConnection::connect();

    //     if ($result !== true) {
    //         throw $result;
    //     }
    // }

    // $query = "SELECT * FROM tickets WHERE assignee_id IS NULL AND team_id=:teamId";
    // $stmt = \Database\DatabaseConnection::$instance->prepare($query);
    // $stmt->bindParam(':teamId', $teamId, \PDO::PARAM_INT);
    // $stmt->execute();

    // $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    return [
        new Ticket([
            'id' => 1,
            'title' => 'Ticket 1',
            'description' => 'Description for ticket 1',
            'priority' => 1,
            'status' => 0,
            'reporter_id' => 1,
            'assignee_id' => null,
            'team_id' => 1,
            'create_timestamp' => 1673728000,
            'end_timestamp' => 1673728000,
            'deadline_timestamp' => 1673728000
        ]),
        new Ticket([
            'id' => 2,
            'title' => 'Ticket 2',
            'description' => 'Description for ticket 2',
            'priority' => 2,
            'status' => 1,
            'reporter_id' => 2,
            'assignee_id' => null,
            'team_id' => 1,
            'create_timestamp' => 1673728000,
            'end_timestamp' => 1673728000,
            'deadline_timestamp' => 1673728000
        ])
    ];
}

function setTicketAssignee(int $ticketId, int $userId)
{
    if (!\Database\DatabaseConnection::isConnected()) {
        $result = \Database\DatabaseConnection::connect();

        if ($result !== true) {
            throw $result;
        }
    }

    $query = "UPDATE tickets SET assignee_id=:userId WHERE id=:id";
    $stmt = \Database\DatabaseConnection::$instance->prepare($query);
    $stmt->bindParam(':id', $ticketId, \PDO::PARAM_INT);
    $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
    $stmt->execute();
}


function setTicketStatus(int $ticketId, int $status)
{
    if (!\Database\DatabaseConnection::isConnected()) {
        $result = \Database\DatabaseConnection::connect();

        if ($result !== true) {
            throw $result;
        }
    }

    $query = "UPDATE tickets SET `status`=:status WHERE id=:id";
    $stmt = \Database\DatabaseConnection::$instance->prepare($query);
    $stmt->bindParam(':id', $ticketId, \PDO::PARAM_INT);
    $stmt->bindParam(':status', $status, \PDO::PARAM_INT);
    $stmt->execute();
}

function createTicket($title, $description, $priority, $teamId, $reporterId, $deadlineTimestamp): int
{
    if (!\Database\DatabaseConnection::isConnected()) {
        $result = \Database\DatabaseConnection::connect();

        if ($result !== true) {
            throw $result;
        }
    }

    $query = "INSERT INTO tickets (`title`, `description`, `priority`, `status`, `reporter_id`, `team_id`, `create_timestamp`, `deadline_timestamp`) VALUES (:title, :description, :priority, :status, :reporterId, :teamId, :createTimestamp, :deadlineTimestamp)";
    $stmt = \Database\DatabaseConnection::$instance->prepare($query);
    $stmt->bindParam(':title', $title, \PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, \PDO::PARAM_STR);
    $stmt->bindParam(':priority', $priority, \PDO::PARAM_INT);
    $stmt->bindParam(':status', 0, \PDO::PARAM_INT);
    $stmt->bindParam(':reporterId', $reporterId, \PDO::PARAM_INT);
    $stmt->bindParam(':teamId', $teamId, \PDO::PARAM_INT);
    $stmt->bindParam(':createTimestamp', time(), \PDO::PARAM_INT);
    $stmt->bindParam(':deadlineTimestamp', $deadlineTimestamp, \PDO::PARAM_INT);
    $stmt->execute();

    return 0;
}
