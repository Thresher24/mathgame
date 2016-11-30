<?php
session_start();
$msg = $_GET["msg"];

include("include/header.php");
?>

<h2>Please login to enjoy our Math Game.</h2>

<?php 

    $_SESSION["login"] = false;
    $_SESSION["email"] = "";
    $_SESSION["password"] = "";
    $_SESSION["count"] = 0;
    $_SESSION["score"] = 0;

if(!empty($msg)) {
    
    echo "<div class=\"alert alert-dismissible alert-danger\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  <strong>Whoops!</strong> " . $msg . "</div>"
}

?>

<form class = "form-horizontal" action = "index.php" method = "post">
    <div class = "form-group">
        <div class = "col-sm-3">
            <label class = "control" for = "email">Email:</label>
        </div>
        <div class = "col-sm-9 form-group-req">
            <div>
                <input type = "email" class = "form-control" id = "email" name = "email" placeholder = "i@i.i">
            </div> 
        </div>
        <div class = "form-group">
            <div class = "col-sm-3">
                <label class = "control" for = "password">Password</label>
            </div>
            <div class = "col-sm-9 form-group-req">
                <div>
                    <input type = "password" class = "control" id = "password" name = "password" placeholder = "iii">
                </div>
            </div>
        </div>
        <div class = "form-group">
            <div class = "col-sm-3 col-sm-offset-9">
                <div>
                    <button type = "submit" class = "btn btn-default" name = "submit">
                        Login
                    </button>
                    <button type = "password" class = "btn btn-default" name  = "reset">
                        Clear Page
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>