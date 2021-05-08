<?php
    require "./docs/template/header.php";
    $title = "IT202: Web Chat Login";
    ?>
<!-- Content Here-->
<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1 class="text-center">Web Chat Login Portal</h1>
            <div class="d-flex flex-column align-items-center">
                <form class="col-sm-7" method="post" action="./php/loginscript.php">
                    <div class="form-group">
                        <label for="username">Username: </label>
                        <input type="text" class="form-control" name="username" id="username" aria-describedby="username" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="password" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                            <button type="submit" name="signup" class="btn btn-success">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "./php/displayerror.php"; ?>

</div>

<?php
require "./docs/template/footer.php";
?>