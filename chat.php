<?php
    session_start();
    if (array_key_exists ('username', $_POST)) 
    {
        $_SESSION['user'] = $_POST['username'];
    }
    $user = $_SESSION['user'];
?>
<html>
    <head>
        <title><?php echo($user)?> - Chatting</title>
        <script src = "prototype.js"></script>
    </head>

    <body>
       <div id = "chat" style = "height : 400; overflow : auto">
       </div>

       <script>
            function addmessage() {
                new Ajax.Updater('chat', 'add.php', 
                {
                    method : 'post', 
                    parameters : $('chatmessage').serialize(), 
                    onSuccess : function () {
                        $('messagetext').value = '';
                    }
                } );
            }
       </script>

       <form id = "chatmessage">
            <textarea name = "message" id = "messagetext">
            </textarea>
       </form>

       <button onClick = "addmessage()">Add</button>
       
       <script>
            function getmessages() {
                new Ajax.Updater('chat', 'messages.php', 
                {
                    onSuccess : function () {
                        window.setTimeout (getmessages, 1000);
                    }
                } );
            }
            getmessages();
       </script>

    </body>
</html>
