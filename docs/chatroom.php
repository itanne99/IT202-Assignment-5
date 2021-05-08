<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        $_SESSION['message'] = "You're not logged in";
        header("location:../index.php");
    }
    require './template/header.php';
    $title = "Main Chatroom";
    ?>
<div class="container d-flex flex-column justify-content-between" style="height: 75vh">
    <div class="border pl-2 pr-2 overflow-auto h-100" id="chatBox">
    </div>
    <form action="../php/sendmsg.php" method="post">
        <div class="form-group">
            <div class="d-flex">
                <label for="message"></label>
                <input type="text" class="form-control" name="message" id="message" aria-describedby="helpId" placeholder="">
                <button type="submit" name="submit" id="submit" class="ml-4 btn btn-primary">Submit</button>
            </div>
            <?php include '../php/displayerror.php' ?>
        </div>
    </form>
</div>


<?php
require './template/footer.php';
?>

<script>
    <!-- #TODO: Implement auto update -->
    $(document).ready(function(){
        initial_chat_setup();
        bottom_of_chatbox();
        $('#message').focus();

        setInterval(function (){
            update_chatroom();

        }, 1000)
    });

    function bottom_of_chatbox(){
        $('#chatBox').scrollTop($('#chatBox')[0].scrollHeight);
    }

    function initial_chat_setup()
    {
        $.ajax({
            url:"../php/getmsgs.php",
            method:"GET",
            success:function(data){
                $('#chatBox').html(data);
            }
        })
    }

    function update_chatroom()
    {
        $('#chatBox').each(function(){
            initial_chat_setup();
        });
    }
</script>
