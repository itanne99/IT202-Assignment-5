<?php
session_start();
if(isset($_SESSION['message'])){
    echo '<div class="alert alert-danger" role="alert">';
    echo '<strong>'.$_SESSION['message'].'</strong>';
    echo '</div>';
}
?>
