<?php 
session_start();
require_once 'function.php';
include_once '../DB/DB.php';
include_once '../DB/DBOPerations.php';

$newTask = new DBoperations();

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
    //? Adding Task To database
    if(isset($_POST["taskAdder"])):
        $taskData = $_POST['taskValue'];
        
        //? Instead of using ID value which poses security risk instead use a RandomString for more secure identification
        $RandomString =  makeRandomString(29);
        
        $status =  $newTask->DBInsertion($taskData,$RandomString);
        
        $_SESSION['Created_Task_session'] = "Done";
        header("location: ../index.php");
        
    endif;

    if(isset($_POST["Updater"])):
        $taskDetails = $_POST['Update_Task'];
        $RandomString = $_POST["Update_Random"];
        echo $newTask->DB_Update($RandomString,$taskDetails);
        $_SESSION['update_state'] = "Done";
        header("location: ../index.php");

        
    endif;
    
}

if ($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET['delete'])):
        $RandomString = $_GET['delete'];
        
        $status = $newTask->DBDelete($RandomString);  
        if($status == "Deleted"){
            $_SESSION['Deleted_Task_session'] = "Done";
            header("location: ../index.php");
        }
    endif;

    
    if(isset($_GET['edit'])):
        $RandomString = $_GET['edit'];
        $_SESSION['Update_state'] ="Done";
        $_SESSION['Update_Data'] = $newTask->DB_getUserData($RandomString);
        header("location: ../index.php");
    endif;

}



?>