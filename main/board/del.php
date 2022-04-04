
<?php

$glob = glob("../chatlog/*");
$data = [];
$dr = [];
foreach($glob as $g){
  $fp = fopen($g,"r");
  if(trim(fgets($fp)) == $_SESSION["user"]){
    $data[] = $g;
    $dr[] = trim(fgets($fp));
  }
  fclose($fp);
}


?>
<html>
  <head>
    <title>Chat-board - ボード削除</title>
  </head>
  <body>
    <?php require("/app/common/header.php"); ?>
    <div class="page">
      <?php
      
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["deldata"] == "null"){
          echo "選択してください";
        }else{
          $open = fopen($_POST["deldata"],"r");
          
          if(trim(fgets($open)) == $_SESSION["user"]){
            unlink($_POST["deldata"]);
            echo "削除が完了しました";
          }else{
            echo "権限がありません";
          }
        
          fclose($open);
        }
      }
      
      ?>
      <form method="POST" action="<?php print($_SERVER["PHP_SELF"]); ?>">
        <select name="deldata">
          <option value="null">選択されていません</option>
          <?php
          foreach($data as $d){
            $td = substr($d,11,-4);
            echo "<option value='".$d."'>ボード - ".$td."</option>";
          }
          ?>
        </select>
        <input type="submit" class="sendButton" value="削除をする">
      </form>
      <a href="https://chat-board.glitch.me/main/">ダッシュボードへ</a>
    </div>
  </body>
</html>