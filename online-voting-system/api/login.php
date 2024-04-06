<?php
    session_start();
    include("connection.php");

    $email = $_POST['uname'];
    $pass = $_POST['psw'];

    $check = mysqli_query($connect, "select * from reg_details where email='$uname' and password='$psw'");

    if(mysqli_num_rows($check)>0){
        $getGroups = mysqli_query($connect, "select email, pass from reg_details where email=? ");
        if(mysqli_num_rows($getGroups)>0){
            $groups = mysqli_fetch_all($getGroups, MYSQLI_ASSOC);
            $_SESSION['groups'] = $groups;
        }
        $data = mysqli_fetch_array($check);
        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;
        echo '<script>
                window.location = "../routes/dashboard.php";
            </script>';
    }
    else{
        echo '<script>
                alert("Invalid credentials!");
                window.location = "../";
            </script>';
    }
    
?>