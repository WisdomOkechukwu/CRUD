<?php 

class DB{
    private $DBhost= "localhost";
    private $DBusername = "root";
    private $DBpass = "";
    private $DBname = "TodoCRUD";

    public function DBConnectionInitializer()
    {
        //? Using PDO for database connection to allow various data connection

        $connection = new PDO("mysql:host=$this->DBhost;dbname=$this->DBname", $this->DBusername,$this->DBpass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }


    public function DBErrorCatcher()
    {
        //? Using the try and catch
        try{
            $this->DBConnectionInitializer();
            return "Connection Successfully";
        }
        catch (PDOException $e) {
            return "Connection Failed". $e->getMessage();
        }
    }

}






?>