<?php
include_once 'db.php';
/*  <label for=""></label>
    <input type="text"> */
if(!empty($_POST['submit'])){
    // get the variable from form through POST method
    $uname = isset($_POST['uname'])?$_POST['uname']:"";
    $pwd = hash('sha1',isset($_POST['pwd'])?$_POST['pwd']:"",false);
    $phone = isset($_POST['phone'])?$_POST['phone']:"";

    $allow = false; // variable allow login

    // get the username data form db
    $stmt=$conn->prepare("SELECT USERNAME FROM abc12users;");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetch all the row of the user table
    foreach($users as $v){
        if($uname == $v['USERNAME']){
            $allow = false; // check if username has already taken then not allow to registration
        } else {
            $allow = true;
        }
    }

    if ($allow == false){
        echo "Username has already taken! Please choose another one.";
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
</head>
<body>
    <form action="" method="POST">
    <h2>Registration form</h2>
    <label for="username">Username</label>
    <input type="text" name="uname" id="uname">
    <label for="password">Password</label>
    <input type="text" name="pwd" id="pwd">
    <label for="phonenumber">Phone Number</label>
    <input type="text" name="phone" id="phone">
    <input type="submit" name="submit" value="Registration">
    </form>
</body>
</html>
