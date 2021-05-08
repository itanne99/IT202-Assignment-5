<?php
    if($_POST['message'] !==  ''){
        require './db/database.php';
        session_start();
        $values = [strval($_SESSION['userID']), strval($_POST['message'])];
        $msgQuery = sprintf("INSERT INTO IT202_webchat_messages (from_user_id, chat_message) VALUES ('%s', '%s')", $values[0], htmlspecialchars($values[1], ENT_QUOTES));
        if(mysqli_query($GLOBALS['con'], $msgQuery)){
            header('location: ../docs/chatroom.php');
            unset($_SESSION['message']);
        } else {
            $_SESSION['message'] = mysqli_error($GLOBALS['con']);
            header('location: ../docs/chatroom.php');
        }
    } else {
        unset($_SESSION['message']);
        header('location: ../docs/chatroom.php');
    }