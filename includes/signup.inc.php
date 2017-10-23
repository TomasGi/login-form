<?php

if (isset($_POST['uname-reg']) && ($_POST['email-reg']) && ($_POST['psw-reg'])) {
    include_once 'dbh.inc.php';

    $uname = mysqli_real_escape_string($conn, $_POST['uname-reg']);
    $email = mysqli_real_escape_string($conn, $_POST['email-reg']);
    $psw = mysqli_real_escape_string($conn, $_POST['psw-reg']);
    
    //checks if same data exists in DB
    function checkData($nameInDb, $prop, $conn)
    {
        $sql = "SELECT * FROM users WHERE $nameInDb='$prop'";
        $result = mysqli_query($conn, $sql);
        return $resultCheck = mysqli_num_rows($result);
    }

    //Error handlers
    //check for empty fields
    if (empty($uname) || empty($email) || empty($psw)) {
        echo "You have left some of the fields empty";
        exit();
    } else {
        //check if uname is valid
        if (!preg_match("/^[a-zA-Z 0-9]*$/", $uname)) {
            echo "Invalid characters in username";
            exit();
        } else {
            //check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Wrong email format";
                exit();
            } else {
                if (checkData('user_uname', $uname, $conn) > 0 || checkData('user_email', $email, $conn) > 0) {
                    echo "Usename or email is taken";
                    exit();
                } else {
                    if (!preg_match("/(?=^.{8,}$)(?=.*\d)(?=.*\D)/", $psw)) {
                        echo "Password must be 8-16 characters and include both numbers and letters";
                        exit();
                    } else {
                        //hashing the password
                        $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);
                        //insert user
                        $sql = "INSERT INTO users (user_uname, user_email, user_psw) VALUES ('$uname', '$email', '$hashedPsw');";
                        mysqli_query($conn, $sql);
                        echo "success";
                        exit();
                    }
                }
            }
        }
    }
} else {
    echo "access denied";
    exit();
}
