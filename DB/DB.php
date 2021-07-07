<?php 

class DB{
    protected $DBhost;
    protected $DBusername;
    protected $DBpass;
    protected $DBname;

    public function __construct($Dbhost,$DBusername,$DBpass,$DBname)
    {
        $this->DBhost = $Dbhost;
        $this->DBusername = $DBusername;
        $this->DBpass = $DBpass;
        $this->DBname = $DBname;
    }

    public function DBConnectionInitializer()
    {
        //? Using PDO for database connection to allow various data connection

        $connection = new PDO("mysql:host=$this->DBhost;port=3306;dbname=$this->DBname", $this->DBusername,$this->DBpass);
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

$host = "localhost";
$username = "root";
$pass = "";
$name = "TodoCRUD";

$database = new DB($host,$username,$pass,$name);

$connection = $database->DBConnectionInitializer();

if($database->DBErrorCatcher()){
    echo $database->DBErrorCatcher();
}






?>