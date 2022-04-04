<html>
  <head>
     <meta name="viewport" content="width=device-width">
    <title>Chat-board - 新規登録</title>
  	
  </head>
 
  <body>
    <?php require("/app/common/header.php"); ?>
    <div class="page">
    <h1 class="logo">新規登録</h1>
    
    <?php
     
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(trim($_POST["name"]) != "" && $_POST["name"] != null && trim($_POST["pwd"]) != "" && $_POST["pwd"] != null){
        readData();
      }else{
        echo "文字を入力してください";
      }
    }
    function readData(){
    $name = $_POST["name"];
    $pwd = $_POST["pwd"];
    
    $json = file_get_contents("../userlog/user.json");
    $user = (json_decode($json, true));
    
    if(array_key_exists($name, $user)){
      echo("そのアカウントは現在、登録されています。");
    }else {
          $options = [
            'cost' => 12,
          ];

          $hash = password_hash($pwd, PASSWORD_BCRYPT, $options);

          $user[$name] = $hash;

          $json_en = json_encode($user,JSON_UNESCAPED_UNICODE);

          file_put_contents("../userlog/user.json", $json_en);
          
          $_SESSION["user"] = $name;
      
          echo("登録しました。");
         }
        }
    ?>
    
    <form onsubmit="saveName()" method="POST" action="/main/sign/up.php"action="signup" >
      <input type="text" class="sendName" spellcheck="false" name="name" placeholder="ユーザーネーム" required autocomplete="off"><br>
      <input type="password" class="sendName" spellcheck="false" name="pwd" placeholder="パスワード" required><br>
     
      
      <input type="submit" name="bot" class="sendButton" value="新規登録する" > 
      <a style="font-size:0.5rem;" href="../sign/in.php">既存のIDでログインする</a>
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