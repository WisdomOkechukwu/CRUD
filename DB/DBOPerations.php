<?php 
require_once 'DB.php';

class DBoperations extends DB
{
    public function __construct()
    {
        
    }

    public function DBShow()
    {
        try{
            $connection = $this->DBConnectionInitializer();
            $sql = "SELECT * FROM task ORDER BY id DESC";
            
            $statement = $connection->query($sql);
            $statement->execute();

            $result = $statement->fetchAll();

            return $result;
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function DBInsertion($TaskString, $RandomString)
    {
        try{
            $connection = $this->DBConnectionInitializer();
            
            $statement = $connection->prepare("INSERT INTO task (task, random)
                                                 VALUES (:taskString, :randomString)");

            $statement->bindParam(':taskString',$Task);
            $statement->bindParam(':randomString', $Random);

            $Task = $TaskString;
            $Random = $RandomString;
            $statement -> execute();
            $connection = null;

            return "Success";

        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function DB_getUserData($RandomString)
    {
        try{
            $connection = $this->DBConnectionInitializer();

            $sql = "SELECT * FROM task WHERE random='$RandomString'";

            $statement = $connection->query($sql);
            $statement->execute();

            $result = $statement->fetchAll();

            return $result;
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function DB_Update($RandomString,$newTaskDetails)
    {
        try{
            $connection = $this->DBConnectionInitializer();
            $sql = "UPDATE task SET task='$newTaskDetails' WHERE random = '$RandomString'";
            $connection->exec($sql);
            return "Updated";

        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function DBDelete($RandomString){
        try{
            $connection = $this->DBConnectionInitializer();

            $sql = "DELETE FROM task WHERE random='$RandomString'";
            $connection->exec($sql);
            return "Deleted";
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

?>