<?php 
session_start();
require_once 'DB/DBOPerations.php';

//! Showing Data
$newTask = new DBoperations();
$result = $newTask->DBShow();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<form action="helpers/helper.php" method="POST">
    <div class="container" style="padding-top: 3%;">
        <div class="row">
        
            <div class="col-md-7 offset-md-3">
                <!---------------------------------UPDATE SECTION------------------------------------->

            <?php if(isset($_SESSION['Update_state']) && $_SESSION['Update_state'] == "Done"){?>
                <div class="text-center">
                    <h5>Update Task (Refresh To Add Task)</h5>
                </div>
                <div class="input-group mb-3">
                <?php
                    $Update_array = $_SESSION['Update_Data'];
                     foreach ($Update_array as $key => $value) {?>
                    <input type="text" class="form-control" value="<?php echo "$value[task]";?>" name="Update_Task" required>
                    <input type="hidden" class="form-control" value="<?php echo "$value[random]";?>" name="Update_Random">
                    <?php }?>
                    <button class="btn btn-outline-warning " name="Updater" type="submit" id="button-addon2">Update Task
                    </button>
                    
                </div>
                <!---------------------------------UPDATE SECTION END------------------------------------->
            <?php }else{?>

                <!---------------------------------CREATE SECTION------------------------------------------>
                <div class="text-center">
                    <h5>Add Task</h5>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="taskValue" placeholder="Add Task" required>
                    <button class="btn btn-outline-success" name="taskAdder" type="submit" id="button-addon2">Add Task</button>
                </div>
                <?php }
                
                $_SESSION['Update_state'] = ""?>
                
                <?php 
                    if(isset($_SESSION['Created_Task_session']) && $_SESSION['Created_Task_session'] == "Done"){
                    
                    ?>
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            Task Created Successfully;
                        </div>
                    </div>
                <?php }
                $_SESSION['Created_Task_session'] = "";?>
                <!---------------------------------cREATE SECTION END---------------------------------------->


                <!---------------------------------DELETE SECTION -------------------------------------------->

                <?php   
                    if(isset($_SESSION['Deleted_Task_session']) && $_SESSION['Deleted_Task_session'] == "Done"){
                    
                    ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            Task Deleted Successfully;
                        </div>
                    </div>
                <?php }
                $_SESSION['Deleted_Task_session'] = "";?>


                <!---------------------------------DELETE SECTION END---------------------------------------->


                <!---------------------------------UPDATE ALERT SECTION---------------------------------------->
                <?php   
                    if(isset($_SESSION['update_state']) && $_SESSION['update_state'] == "Done"){
                    
                    ?>
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            Task Updated Successfully;
                        </div>
                    </div>
                <?php }
                $_SESSION['update_state'] = "";?>
                <!---------------------------------UPDATE ALERT SECTION END-------------------------------------->
            </div>
            
        </div>

        
    </div>
</form>


    <div class="container" style="padding-top: 5%;">
        <div class="row">
            <div class="col-md-7 offset-md-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Action</th>
                        
                        </tr>
                    </thead>
                    <tbody >
                        <!-- ----------------------LOADING DATA IN DATABASE----------------------------------- -->
                   <?php foreach ($result as $key => $value) {
                            ?> 
                        <tr>
                            
                            <td><?php echo $value['task'];  ?></td>
                            <td>
                                <a class="btn btn-warning" href="helpers/helper.php?edit=<?php echo $value['random']; ?>">
                                Edit
                                </a>
                                <a class="btn btn-danger"  href="helpers/helper.php?delete=<?php echo $value['random']; ?>">
                                Delete
                                </a>
                            </td>

                        </tr>
                        <?php } ?>
                        <!-- ----------------------LOADING DATA IN DATABASE END----------------------------------- -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<script src="asset/js/bootstrap.min.js"></script>	
</body>
</html>