<?php
    require('./db/database.php');
    session_start();
    if(isset($_SESSION['userID'])){
        header("location:../docs/chatroom.php");
    }

    if(isset($_POST["signup"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = sprintf("INSERT INTO IT202_webchat_users (username, password) VALUES ('%s', '%s')", htmlspecialchars($username, ENT_QUOTES), htmlspecialchars($password, ENT_QUOTES));
        $searchUser = mysqli_query($GLOBALS['con'], "SELECT * FROM IT202_webchat_users WHERE username='$username'");
        if($searchUser){
            if(mysqli_num_rows($searchUser) > 0){
                $_SESSION['message'] = "Username already exists. If you forgot password please contact Ido Tanne";
                header("Location:../index.php");
            } else {
                if(mysqli_query($GLOBALS['con'], $query)){
                    login($username, $password);
                } else {
                    echo mysqli_error($GLOBALS['con']);
                }
            }
        } else {
            echo mysqli_error($GLOBALS['con']);
        }
    }

    if(isset($_POST["login"])){
        login($_POST["username"], $_POST['password']);
    }

    function login($username, $password){
        $loginQuery = mysqli_query($GLOBALS['con'], "SELECT * FROM IT202_webchat_users WHERE username='$username'");
        if($loginQuery){
            if(mysqli_num_rows($loginQuery) > 0){
                while($row = mysqli_fetch_array($loginQuery)){
                    if($row['password'] == $password){
                        unset($_SESSION['message']);
                        $_SESSION['userID'] = $row['user_id'];
                        $_SESSION['username'] = $row['username'];
                        header("location:../docs/chatroom.php");
                        exit();
                    } else {
                        $_SESSION['message'] = "Password Incorrect";
                    }
                }
            } else {
                $_SESSION['message'] = "User not found";
            }
            header("Location:../index.php");
        } else {
            echo mysqli_error($GLOBALS['con']);
        }
    }