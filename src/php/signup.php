<?php

session_start();
include_once "/home/hounaar/Documents/projects/src/php/connection.php";

if(isset($_POST['id']) && isset($_POST['mail']) && isset($_POST['passcode'])){
    $username = mysqli_real_escape_string($connection, $_POST['id']);
    $email = mysqli_real_escape_string($connection, $_POST['mail']);
    $password = mysqli_real_escape_string($connection, $_POST['passcode']);
    $date = date("Y-m-d H:i:s");

    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $query = $connection->query("SELECT * FROM users WHERE username = '{$username}' AND email = '{$email}'");
        if($query->num_rows>0){
            echo " Username or email already exists";
        } else {
             
            $anon_id = rand(time(),100000000);
            $insert = $connection->query("INSERT INTO users VALUES ('{$anon_id}','{$username}','{$email}','{$password}','{$date}')");
            if($insert){
                $checker = $connection->query("SELECT * FROM users WHERE username = '{$username}' AND email = '{$email}' AND password = '{$password}'");
                if($checker->num_rows > 0){
                    while($row = $checker->fetch_assoc()){
                        $_SESSION['anon_id'] = $row['anon_id'];
                        echo "success";
                    }
                 } else {
                    echo "Something went wrong";
                }
            } else {
                echo "Something is blocking the server";
            }
        }
    } else {
        echo "Please enter a valid email";
    }
}
        

?>