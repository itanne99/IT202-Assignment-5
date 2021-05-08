<?php
function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="nav-item active"';
    else
        echo 'class="nav-item"';
}

$domain = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].'/~it49/it202/assignment_5';
?>
<!doctype html >
<html lang = "en" >
<head>
    <?php echo '<title>'. $Title .'</title>' ?>
    <!-- Required meta tags-->
    <meta charset = "utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $domain."/css/bootstrap.css"?>">
    <link rel="stylesheet" href="<?php echo $domain."/css/custom.css"?>">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="d-flex justify-content-between d-inline w-100">
        <span class="navbar-brand align-middle d-none d-lg-block d-xl-none">Ido Tanne's Web Chat</span>
        <?php
        if(isset($_SESSION['userID'])){
            echo '<span class="navbar-brand align-middle">Hello ',$_SESSION['username'],'</span>';
            echo '<span class="navbar-brand align-middle"><a class="text-danger nav-item" href="',$domain,'/php/logout.php','">Logout</a></span>';
        }
        ?>
    </div>


</nav>
<div class="container-fluid vh-100" style="padding-top: 100px;">
