<?php

class Database{

	private $dbpath = DB_PATH;
	private $dbh;
	private $stmt;

	function __construct(){
		// Set DSN
		 $dsn = 'sqlite:'. $this->dbpath;
		 // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try{
            $this->dbh = new PDO($dsn);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
	}

	public function query($query){
    	$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null){
	    if (is_null($type)) {
	        switch (true) {
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
	    $this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
	    return $this->stmt->execute();
	}

	public function resultset(){
	    $this->execute();
	    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function single(){
	    $this->execute();
	    return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}


	public function rowCount(){
	    return $this->stmt->rowCount();
	}


}

class Cijfer extends Database{

	public function addGrade($cijferVak, $studentId, $cijfer){
		$this->query('INSERT INTO cijfers (cijfer_vak, student_id, cijfer, Gender) VALUES (:cijfer_vak, :student_id, :cijfer)');

		$this->bind(':cijfer_vak', $cijferVak);
		$this->bind(':student_id', $studentId);
		$this->bind(':cijfer', $cijfer);
	}

	public function getGrade(){

		$this->query('SELECT * FROM cijfers LEFT JOIN user ON cijfers.student_id = user.user_id');

		$this->execute();
		return $this->resultset();

	}

	public function returnMessage($message){
		return $message;
	}

}