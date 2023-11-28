<?php
  /*
   * PDO Database Class
   * Connect to database
   * Create prepared statements
   * Bind values
   * Return rows and results
   */
  class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
      // Set DSN
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      // Create PDO instance
      try {
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        $this->createPublicationsTable();
        $this->createUserTable();
        
      } catch(PDOException $e) {
          $this->error = $e->getMessage();
          die("Connection failed: " . $this->error); // Stop execution and display the error
      }
    }

    // Prepare statement with query
    public function query($sql){
      $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind values
    public function bind($param, $value, $type = null){
      if(is_null($type)){
        switch(true){
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
            $type = PDO::PARAM_STR;
        }
      }

      $this->stmt->bindParam($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute(){
      return $this->stmt->execute();
    }

    // Get result set as array of objects
    public function resultSet(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount(){
      return $this->stmt->rowCount();
    }
    public function createPublicationsTable() {
      $sql = "
          CREATE TABLE IF NOT EXISTS publications (
              id INT AUTO_INCREMENT PRIMARY KEY,
              title VARCHAR(255) NOT NULL,
              description TEXT,
              price DECIMAL(10, 2),
              imgUrl VARCHAR(255)  DEFAULT 'teambg.jpeg',
              user_id INT
          )";
      $this->query($sql);
      return $this->execute();
    }
    public function createUserTable() {
      $sql = "
          CREATE TABLE IF NOT EXISTS users  (
              id INT AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(255) NOT NULL,
              email VARCHAR(255) NOT NULL,
              city VARCHAR(255) NOT NULL,
              imgUrl VARCHAR(255)  DEFAULT 'med hachami.jpg',
              password VARCHAR(255) NOT NULL
          )";
      $this->query($sql);
      return $this->execute();
    }
  }
  ?>