<?php
class Post {

    //DB connection
    private $conn;
    private $table = 'destinations_car';

    //post properties
    public $priority;
    public $location;
    public $arrivaltime;
    // public $title;
    // public $body;
    // public $author;
    // public $created_at;

    // Constructor with DB
    public function __construct($db){
        $this->conn = $db;
    }

    //Get Posts
    public function read() {

        //create a query
        $query = 'SELECT
                p.priority,
                p.location,
                p.arrivaltime
                FROM
                ' . $this->table . 'p';

        //prepare statment

        $stmt = $this->conn->prepar($query);
        $stmt->execute();

        return $stmt;
    }

    
}