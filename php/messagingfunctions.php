<?php
    include "./db/database.php";
    session_start();
    function get_chat_history(){
        $output = "";
        if ($result = mysqli_query($GLOBALS['con'], "SELECT from_user_id, chat_message, timestamp, IT202_webchat_users.username FROM IT202_webchat_messages JOIN IT202_webchat_users WHERE from_user_id=IT202_webchat_users.user_id")) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['from_user_id'] == $_SESSION['userID']) {
                        $output .= '<div id="msg" class="text-right"> <span class="text-info"> ' . $row['username'] . ' - ' . $row['timestamp'] . '</span> <p>' . $row['chat_message'] . '</p> </div>';
                    } else {
                        $output .= '<div id="msg"> <span class="text-info"> ' . $row['username'] . ' - ' . $row['timestamp'] . '</span> <p>' . $row['chat_message'] . '</p> </div>';
                    }
                }
            }
        }
        mysqli_close($GLOBALS['con']);
        return $output;
    }