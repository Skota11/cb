<html>
  <head>
     <meta name="viewport" content="width=device-width">
    <title>Chat-board - ログイン</title>
  
  </head>
  <body>
    <?php require("/app/common/header.php"); ?>
    <div class="page">
    <h1 class="logo">ログイン</h1>
    
    <?php
     session_start();
    if($_POST['name'] == "" and $_POST['pwd'] == "") {
    echo("２つの項目すべて入力してください");
    }else {
    function readData(){
    $name = $_POST["name"];
    
    $json = file_get_contents("../userlog/user.json");
    $user = (json_decode($json, true));
    
    if(array_key_exists($name, $user)){
        if(password_verify($_POST["pwd"],$user[$name])) {
          echo("ログインしました。");
            $_SESSION["user"] = $name;
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
    
    <form onsubmit="saveName()" method="POST" action="/main/sign/in.php">
      <input type="text" class="sendName" spellcheck="false" name="name" placeholder="ユーザーネーム" required autocomplete="off"><br>
      <input type="password" class="sendName" spellcheck="false" name="pwd" placeholder="パスワード" required><br>
      <input type="submit" class="sendButton" value="ログインする" > 
      <a style="font-size:0.5rem;" href="/main/sign/change.php">パスワードの変更</a>
      <a href="/main/sign/out.php" style="font-size:0.5rem;">ログアウトをする</a>
      <a href="/main/sign/up.php" style="font-size:0.5rem;">新規登録する</a>
    </form>
    <a class="a plus" href="/main/">メインページへ戻る</a>
    </div>
 <!--リキャプチャスクリプト--><!--
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
 </script>-->
  
  </body>
</html>