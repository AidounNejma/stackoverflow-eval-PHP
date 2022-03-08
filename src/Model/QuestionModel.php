<?php

namespace App\Model;

use PDO;
use App\database\Database;

class QuestionModel{

    protected $id;

    protected $title;

    protected $content;

    protected $note;

    protected $status;

    protected $technology;

    protected $createdAt;

    protected $updatedAt;

    protected $userId;

    protected $pdo;

    const TABLE_NAME = 'questions';

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPDO();
    }

    public function findAll()
    {
        $sql = 'SELECT
                `id`
                ,`title`
                ,`content`
                ,`note`
                ,`status`
                ,`technology`
                ,`created_at`
                ,`updated_at`
                ,`user_id`
                FROM ' . self::TABLE_NAME . '
                ORDER BY `id` ASC;
        ';

        $pdoStatement = $this->pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public function create($title, $content, $note, $status, $technology, $createdAt, $updatedAt, $userId)
    {
        $sql = 'INSERT INTO ' . self::TABLE_NAME . '
                (`title`, `content`, `note`, `status`, `technology`, `created_at`, `updated_at`, `user_id`)
                VALUES
                (:title, :content, :note, :status, :technology, :created_at, :updated_at, :user_id)
        ';

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':title', $title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':content', $content, PDO::PARAM_INT);
        $pdoStatement->bindValue(':note', $note, PDO::PARAM_INT);
        $pdoStatement->bindValue(':status', $status, PDO::PARAM_INT);
        $pdoStatement->bindValue(':technology', $technology, PDO::PARAM_INT);
        $pdoStatement->bindValue(':created_at', $createdAt, PDO::PARAM_INT);
        $pdoStatement->bindValue(':updated_at', $updatedAt, PDO::PARAM_INT);
        $pdoStatement->bindValue(':user_id', $userId, PDO::PARAM_INT);


        $result = $pdoStatement->execute();
        
        if (!$result) {
            return false;
        }

        return $this->pdo->lastInsertId();
    }
    
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of note
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of technology
     */ 
    public function getTechnology()
    {
        return $this->technology;
    }

    /**
     * Set the value of technology
     *
     * @return  self
     */ 
    public function setTechnology($technology)
    {
        $this->technology = $technology;

        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId(int $userId)
    {
        $this->userId = $userId;

        return $this;
    }


}
