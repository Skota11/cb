<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <title>Chat-board - 利用規約</title>
  </head>
  <body>
    <?php require("/app/common/header.php"); ?>
    <div class="page">
<p class="read">
<?php
  foreach(explode("\n",file_get_contents("term.txt")) as $file){
    echo $file."<br>";
  }
?>
</p><br>
    <a href="https://chat-board.glitch.me/main/" class="a plus">メインページへ戻る</a>
    </div>
  </body>
</html>