<?php 

class DB{
    private $DBhost= "us-cdbr-east-04.cleardb.com";
    private $DBusername = "bfc4260e5bde9b";
    private $DBpass = "3aba201e";
    private $DBname = "heroku_aca4a7177be583b";

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