<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION['loggedin'])) {
        header('Location: ../index.html');
        exit;
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Task - Get it done!</title>
</head>
<body>
    <div class="jumbotron jumbotron-fluid mb-0">
        <div class="container">
            <div class="row">
                <h1 class="display-4 col">Hi, <?=$_SESSION['fname']?></h1>
                <div class="pt-2">
                    <h2 class="float" id="temprature"></h2>
                    <h2 class="lead float" id="place"></h2>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0" style="padding-left: 12.5%;">Task - Get it done!</span>
        <span class="navbar-brand mb-0"><a style="text-decoration:none;" href="logout.php">Logout</a></span>
        <span class="navbar-brand mb-0" style="padding-right: 12%;" id="today"> </span>
    </nav>
    <div class="container-fluid bg-light" style="min-height: 100vh">
        <div class="container pt-5">
            <div class="jumbotron">
                <div class="input-group mb-5">
                    <input
                        type="text"
                        class="form-control"
                        id="inputTask"
                        placeholder="Task"
                        aria-label="Task"
                        aria-describedby="task"
                        required="required"
                    />
                    <div class="input-group-append">
                        <span class="input-group-text" id="task"><i class="fas fa-tasks"></i></span>
                    </div>
                    <div class="invalid-tooltip">
                        Please check the input
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="task desc">@</span>
                    </div>
                    <input
                        type="text"
                        class="form-control"
                        id="inputDesc"
                        placeholder="Task desc"
                        aria-label="Task desc"
                        aria-describedby="task desc"
                        required="required"
                    />
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" id="btnAddTask">Add</button>
                    </div>
                    <div class="invalid-tooltip">
                        Please check the input
                    </div>
                </div>
            </div>
            <div>
                <ul class="list-group" id="TaskTable"></ul>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/weather-api.js"></script>
    <script src="../js/task.js"></script>
</body>
</html>