<?php

namespace Database\Comments;

require_once __DIR__ . "/index.php";

class Comment
{
    public int $id;
    public int $authorID;
    public int $ticketID;
    public string $content;

    public function __construct(array $queryRes)
    {
        $this->id = (int)$queryRes['id'];
        $this->authorID = (int)$queryRes['author_id'];
        $this->ticketID = (int)$queryRes['ticket_id'];
        $this->content = $queryRes['content'];
    }
}

function getAllCommentsByTicketId($ticketId): ?array
{
    // if (!\Database\DatabaseConnection::isConnected()) {
    //     $result = \Database\DatabaseConnection::connect();
    // 
    //     if ($result !== true) {
    //         throw $result;
    //     }
    // }

    // $query = "SELECT * FROM comments WHERE ticket_id = :id";
    // $stmt = \Database\DatabaseConnection::$instance->prepare($query);
    // $stmt->bindParam(':id', $ticketId, \PDO::PARAM_INT);
    // $stmt->execute();
    // 
    // $result = $stmt->fetch(\PDO::FETCH_ASSOC);

    $result = [
        [
            'id' => 0,
            'author_id' => 1,
            'ticket_id' => $ticketId,
            'content' => 'Sample content'
        ],
        [
            'id' => 0,
            'author_id' => 1,
            'ticket_id' => $ticketId,
            'content' => 'Sample content'
        ],
        [
            'id' => 0,
            'author_id' => 1,
            'ticket_id' => $ticketId,
            'content' => 'Sample content'
        ],
    ];

    if ($result) {
        return array_map(fn($res) => new Comment($res), $result);
    }

    return null;
}

function createComment($authorId, $ticketId, $content): int
{
    if (!\Database\DatabaseConnection::isConnected()) {
        $result = \Database\DatabaseConnection::connect();

        if ($result !== true) {
            throw $result;
        }
    }

    $query = "INSERT INTO comments (`author_id`, `ticket_id`, `content`) VALUES (:authorId, :ticketId, :content)";
    $stmt = \Database\DatabaseConnection::$instance->prepare($query);
    $stmt->bindParam(':authorId', $authorId, \PDO::PARAM_INT);
    $stmt->bindParam(':ticketId', $ticketId, \PDO::PARAM_INT);
    $stmt->bindParam(':content', $content, \PDO::PARAM_STR);
    $stmt->execute();

    return 0;
}

function deleteComment($commentId)
{
    if (!\Database\DatabaseConnection::isConnected()) {
        $result = \Database\DatabaseConnection::connect();

        if ($result !== true) {
            throw $result;
        }
    }

    $query = "DELETE FROM comments WHETE id=:id";
    $stmt = \Database\DatabaseConnection::$instance->prepare($query);
    $stmt->bindParam(':id', $commentId, \PDO::PARAM_INT);
    $stmt->execute();
}
