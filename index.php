<?php session start();
extract($_POST);
$error = "";

// login - wrong
if($_SESSION["login"] == false)
    if(!isset($email)&& !isset($password)) {
        header(Location: login.php)
        die();
    } else if (strcmp($email, "i@i.i") != 0 || strcmp($password, "iii") != 0) {
        $error = "Incorrect login credentials.";
    }
    if (!empty($error)) {
        unset($_SESSION["email"]);
        unset($_SESSION["password"]);
        header("Location: login.php?msg=$error");
        die();
    }
}

// login - right
$_SESSION["login"] = true;
$_SESSION["email"] = $email;
$_SESSION["password"] = $password;

include("include/header.php");

// Mathgame Code
$_SESSION["score"];
if ($_SESSION["score"] == null) {
    $_SESSION["score"] = 0;
    $_SESSION["Scorecount"] = 0;
}

// Fractions
list($up, $down) = explode('/', $answer);
if ($down == 0) {
    $fraction = 0;
} else {
    $fraction = $up / $down;
}

// Mathgame Operators (+,-,*,/)
if ($_SESSION["answer"] == $answer || $fraction == $_SESSION["num1"] / $_SESSION["num2"]) {
    $_SESSION["score"]++;
    $_SESSION["count"]++;
    $mathout = "Correct";
    $correct = true;
    
    //right
} else if ((!is_numeric($answer) || empty($answer)) && $answer != 0) {
    $mathout = "It is required that you input your answer";
    $correct = false;
    
    //wrong
} else {
    $correct = false;
    $_SESSION["count"]++;
    $num1 = $_SESSION["num1"];
    $num2 = $_SESSION["num2"];
    $mathout = "INCORRECT, " . $_SESSION["num1"] . " ";
    
    // add
    if ($_SESSION["operator"] == 0) { 
        $answer = $num1 + $num2;
        $sign = "+";
    // minus
        
    } else if ($_SESSION["operator"] == 1) { 
        $answer = $num1 - $num2;
        $sign = "-";
     // multiply
        
    } else if ($_SESSION["operator"] == 2) {
        $answer = $num1 * $num2;
        $sign = "x";
    // divide
        
    } else if ($_SESSION["operator"] == 3) { 
        $answer = $num1 / $num2;
        $sign = "&#247;";
    }
    $mathout .= $sign . " " . $_SESSION["num2"] . " is " . $answer . ".";
}

// Random Question
$num1 = rand(0, 20);
$num2 = rand(0, 20);
$operator = rand(0, 3);

// add
if ($operator == 0) { 
    $answer = $num1 + $num2;
    $sign = "+";
// minus
    
} else if ($operator == 1) { 
    $answer = $num1 - $num2;
    $sign = "-";
 // multiply
    
} else if ($operator == 2) {
    $answer = $num1 * $num2;
    $sign = "x";
// divide
    
} else if ($operator == 3) { 
    $answer = $num1 / $num2;
    $sign = "&#247;";
}

$_SESSION["answer"] = $answer;
$_SESSION["num1"] = $num1;
$_SESSION["num2"] = $num2;
$_SESSION["operator"] = $operator;

?>

<form class = "form-horizontal" action = "login.php" method = "post">
    <div class = "row">
        <div class = "Col-sm-4 col-sm-offset-4">
            <h1>Math Game</h1>
        </div>
        <div class = "col-sm-4">
            <div class = "form-group">
                <button type = "logout" href = "login.php?msg=&quot;logout&quot;" class = "btn btn-default pull-right" name = "logoutbutton">Logout</button>
            </div>
        </div>
    </div>
</form>
<form class="form-horizontal" action="index.php" method="post">
    <div class="row">
        <label class="col-sm-1 text-right col-sm-offset-6">
            <?php echo $num1 ?>
        </label>
    </div>
    <div class="row">
        <label class="col-sm-1 col-sm-offset-5">
            <?php echo $sign ?>
        </label>
        <label class="col-sm-1 text-right">
            <?php echo $num2 ?>
        </label>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-2 col-sm-offset-5">
                <hr>
                <input type="text" value="" class="form-control" id="answer" name="answer" placeholder="answer" align="right" autofocus></input>
            </div>
        </div>
    </div>
<div class="form-group">
    <div class="col-sm-offset-5 text-center col-sm-2">
        <button type="submit" class="btn btn-success" name="submit">Submit</button>
    </div>
</div>
</form>
<div class="row">
    <div class="col-sm-offset-3 text-center col-sm-6">
        <label>
            <?php
            if ($correct) {
                echo "<span id=\"correct\" >";
            } else {
                echo "<span id=\"incorrect\" >";
            }
                    echo $mathout . "</span>";
            ?> 
        </label>
    </div>
</div>
<div class="row">
    <div class="col-sm-offset-5 text-center col-sm-2">
        <label>
            <?php
            echo "Score: " . $_SESSION["score"] . " / " . $_SESSION["count"];
            ?>
        </label>
    </div>
</div>