<?php

session_start();

if (isset($_POST['submit'])) {
    
    include 'dbh.inc.php';

    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $psw = mysqli_real_escape_string($conn, $_POST['psw']);
    
    //check if inputs are empty
    if (empty($uname) || empty($psw)) {
        //empty fields
        header("Location: ../index.php?login=empty");
        exit();        
    } else {
        $sql = "SELECT * FROM users WHERE user_uname='$uname' OR user_email='$uname'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            //no results in DB
            header("Location: ../index.php?login=nores");        
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                // echo $row['user_uname'];
                //dehashing password
                echo $psw;
                echo $row['user_psw'];
                $hashedPswCheck = password_verify($psw, $row['user_psw']);
                if ($hashedPswCheck == false) {
                    //incorect password
                    //header("Location: ../index.php?login=p" . $resultCheck);
                   // exit();
                } elseif ($hashedPswCheck == true) {
                    //log in
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_uname'] = $row['user_uname'];
                    $_SESSION['u_email'] = $row['user_email'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }

} else {
	header("Location: ../index.php?login=error");
	exit();
}