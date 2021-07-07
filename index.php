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

<div class="container" style="padding-top: 3%;">
    <div class="row">
        <div class="col-md-7 offset-md-3">
            <div class="text-center">
                <h5>Add Task</h5>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Add Task">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Add Task</button>
            </div>
        </div>
    </div>
</div>

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
                <tbody>
                    <tr>
                        
                        <td>Otto</td>
                        <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>







<!-- Add Todo task -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="asset/js/bootstrap.min.js"></script>	
</body>
</html>