<!doctype html>
<?php session_start(); 
if($_SESSION["user"] == ""){
  header("Location:../main/index.php");
}
?>
<html lang="jp">
    <head>
        <meta charset="utf-8">
        <title>CB-Chat</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="./chat.js"></script>
        <link href="./chat.css" rel="stylesheet">
     </head>
 
    <body>
        <p>CHAT-FREEROOM</p>
       <p><?php echo("ユーザー名:".$_SESSION["user"]);?></p>
         <form method="post" onsubmit="writeMessage(); return false;">
            <input id="message" name="message" type="text" value="" />
            <input type="button" value="送信" onclick="writeMessage()">
        </form>
         <div id="messageTextBox"></div>
    </body>
</html>