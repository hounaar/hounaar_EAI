<?php

session_start();
include_once "/home/hounaar/Documents/projects/src/php/connection.php";

if(isset($_POST['username']) && isset($_POST['password'])){
   
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = $connection->query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}'");
    if($query->num_rows > 0){  
        while($row = $query->fetch_assoc()){
            $_SESSION['anon_id'] = $row['anon_id'];
            echo "success";
        }
    } else {
        echo "User not found. You need to signup first.";
    }
}

?>