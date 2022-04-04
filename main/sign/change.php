<html>
  <head>
     <meta name="viewport" content="width=device-width">
    <title>Chat-board - パスワードの変更</title>
  </head>
  <body>
    <?php require("/app/common/header.php"); ?>
    <div class="page">
    <h1 class="logo">パスワードの変更</h1>
    
    <?php
      if($_POST['pwd'] == "" and $_POST['new'] == "") {
    echo("２つの項目すべて入力してください");
    }else {
    function readData(){
    $name = $_SESSION["user"];
    $pwd = $_POST["pwd"];
    $new = $_POST["new"];
    
    $json = file_get_contents("../userlog/user.json");
    $user = (json_decode($json, true));
    
    if(array_key_exists($name, $user)){
        if(password_verify($pwd,$user[$name])) {
          $user[$name] = $new;
          
          $json_en = json_encode($user,JSON_UNESCAPED_UNICODE);

          file_put_contents("../userlog/user.json", $json_en);
        }else {
          echo("パスワードが違います。");
        }
    }else{
      echo("そのユーザーは存在しません。");
    }
    
    
    }
  
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
      readData();
    }
}
    ?>
    
    <form onsubmit="saveName()" method="POST" action="/main/sign/change.php">
      <input type="password" class="sendName" spellcheck="false" name="pwd" placeholder="パスワード" required><br>
      <input type="password" class="sendName" spellcheck="false" name="new" placeholder="新しいパスワード" required><br>
      <input type="submit" class="sendButton" value="変更する" > 
    </form>
    <a class="a plus" href="https://chat-board.glitch.me/main/">メインページへ戻る</a>
    </div>
  
  <script src="https://www.google.com/recaptcha/api.js"></script>
 <script>
   function onSubmit(token) {
    
   }
 </script>
 
 <script src="https://www.google.com/recaptcha/api.js?render=6Le2kkccAAAAAL22OlHGPMi4mXZ-b_MMTjWGYMXu"></script> 
 
 <script>
   function onClick(e) {
     e.preventDefault();
     grecaptcha.ready(function() {
       grecaptcha.execute('reCAPTCHA_site_key', {action: 'submit'}).then(function(token) {
           // Add your logic to submit to your backend server here.
       });
     });
   }
 </script>
    
  </body>
</html>