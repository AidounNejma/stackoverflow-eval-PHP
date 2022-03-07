<?php

namespace App\Model;

use PDO;
use App\database\Database;

class TagModel
{
    protected $id;

    protected $tag;

    protected $questionId;

    protected $pdo;

    const TABLE_NAME = 'tags';

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPDO();
    }

    public function findAll()
    {
        $sql = 'SELECT
                `id`
                ,`tag`
                ,`question_id`
                FROM ' . self::TABLE_NAME . '
                ORDER BY `question_id` ASC;
        ';

        $pdoStatement = $this->pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public function create($tag, $questionId)
    {
        $sql = 'INSERT INTO ' . self::TABLE_NAME . '
                (`tag`, `question_id`)
                VALUES
                (:tag, :question_id)
        ';

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':tag', $tag, PDO::PARAM_STR);
        $pdoStatement->bindValue(':question_id', $questionId, PDO::PARAM_STR);

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
     * Get the value of tag
     */ 
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set the value of tag
     *
     * @return  self
     */ 
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get the value of questionId
     */ 
    public function getQuestionId()
    {
        return $this->questionId;
    }

    /**
     * Set the value of questionId
     *
     * @return  self
     */ 
    public function setQuestionId($questionId)
    {
        $this->questionId = $questionId;

        return $this;
    }
}
