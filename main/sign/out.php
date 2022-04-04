<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <title>Chat-board - ログアウト</title>
  </head>
  <body>
    <?php require("/app/common/header.php"); ?>
    <div class="page">
    <h1 class="logo">ログアウト</h1>
    
    <?php
     
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      readData();
    }
    function readData(){
      
      $_SESSION['user'] = "";
      
      echo $_SESSION["user"]."のログアウトを確認しました";
    }
    ?>
    
    <form onsubmit="saveName()" method="POST" action="/main/sign/out.php">
      <input type="submit" class="sendButton" value="ログアウトする" > 
      <a href="/main/sign/in.php" style="font-size:0.5rem;">ログインする</a>
    </form>
    <a class="a plus" href="/main/">メインページへ戻る</a>
    </div>
 
   <!--リキャプチャ--><!--
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