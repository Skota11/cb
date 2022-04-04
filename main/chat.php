<html>
   <meta name="viewport" content="width=device-width">
  <head>
  <link rel="icon" href="https://t.gasukaku.net/cb.png">
    <title>Chat-board - <?php print($_GET["board"]); ?></title>
  </head>
  <body>
    <?php require("/app/common/header.php"); ?>
    <div class="page">
    <h1 class="logo" id="top"><xmp><?php echo $_GET["board"]."\n"; ?></xmp></h1>
    <div class="postView" id="pv">
      <?php
      
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(trim($_POST["contents"]) != "" && $_POST["contents"] != null){
          if(strpos($_GET["board"],"/") === false){
            write();
          }else{
            echo "このボードには投稿ができません";
          }
        }
      }
      readData();
      function readData(){
        
        
        $loadmax = 70;

        $page = $_GET["page"];
        if($page == null || $page == 0){
          $page = 1;
        }
        $pagemin = $page - 1;
        $min = $pagemin * $loadmax;
        $max = $page * $loadmax - 1;
        
        $bbb = $_GET["board"];
        
        $log_file = 'chatlog/'.$_GET["board"].'.txt';
        $data = explode("\n",file_get_contents($log_file));
        
        $erai = explode("\n",file_get_contents("/app/main/erai.txt"));
        
        $public = [];
        $count = 0;
        $dc = 0;
        
        foreach($data as $d){
          
          if($d == ""){
            if($dc > 0){
              $count++;
              $dc = 0;
            }else{
              $dc = 0;
            }
          }else{
            
            if($count <= $max && $count >= $min){
              $public[$count][$dc] = str_replace(PHP_EOL, "" ,$d);
            }
            $dc++;
            
          }
        }
        
        
        
        $count = $min;
        $dc = 0;
        $posts = [];
        foreach($public as $p){
          $cot = $count + 1;
          echo "<div class='post' id='com_". $cot ."'>";
          $dc = 0;
          foreach($p as $pp){
            $cp = str_replace("<","＜",$pp);
            $cp = str_replace(">","＞",$cp);
  		      switch($dc){
      			  case 0 : 
                if(in_array($cp,$erai)){
                  echo "<span class='public'><span class='material-icons'>verified</span>".$cp."</span>";
                }else{
                  echo "<xmp class='name inline'>@".$cp."</xmp>";
                }
  	  		    	
  		    	  	break;
        			case count($p) -1 :
    	    			echo "<p class='date'>".$cp."</p>";
  	  		    	break;
              default :
		    	  	  if(filter_var(trim($cp), FILTER_VALIDATE_URL)){
                  $img = file_get_contents($cp);
                  if(!true){
                    echo "<img src='".$cp."'>";
                  }else{
  			  	        echo "<a class='a' href='/main/jump.php?url=".$cp."'><xmp class='a'>".$cp."</xmp></a>";
                  }
         			  }elseif(mb_substr($cp,0,1) == "#"){
      				    echo "<a href='#com_".mb_substr($cp,1)."' class='a'><xmp>".$cp."</xmp></a>";
  	    		    }else{
                  echo "<xmp>".$cp."</xmp>";
                }
  		      	  break;
            }
            $dc++;
          }
  	      $count++;
          echo "<span class='num'>#".$count."</span>";
  	      echo "</div>";
        }
        $count = 0;
        $dc = 0;
        
        
        echo "<div class='hdrspc'>&nbsp;</div>";
        $min = $page-1;
        $max = $page+1;
        if($page > 1 && count($public) == $loadmax){
          echo "<a href='?board=".$bbb."&page=".$min."'>&lt;&lt;previous</a>&nbsp;<a href='?board=".$bbb."&page=".$max."'>next&gt;&gt;</a>";
        }elseif(count($public) != $loadmax && $page <= 1){
          echo "<a class='rd'>&lt;&lt;previous</a>&nbsp;<a class='rd'>next&gt;&gt;</a>";
        }elseif(count($public) != $loadmax){
          echo "<a href='?board=".$bbb."&page=".$min."'>&lt;&lt;previous</a>&nbsp;<a class='rd'>next&gt;&gt;</a>";
        }else{
          echo "<a class='rd'>&lt;&lt;previous</a>&nbsp;<a href='?board=".$bbb."&page=".$max."'>next&gt;&gt;</a>";
        }
        echo "<div class='hdrspc'>&nbsp;</div>";
  /*今日は諦めます。*/
      
      }
      
      function write(){
        
      $pwd = explode("\n",file_get_contents("/app/main/userlog/pwd.txt"));
        $user = explode("\n",file_get_contents("/app/main/userlog/name.txt"));
        $num = array_search($_SESSION["user"],$user);
        
        
        if($_SESSION["user"] != null && in_array($_SESSION["user"],$user) && password_verify($_SESSION['pwd'], $pwd[$num]) == true || $_SESSION["user"] != null && in_array($_SESSION["user"],$user) && $pwd[$num] == hash("sha256",$_SESSION["pwd"]) ){
          $name = $_SESSION["user"];
          $contents = $_POST['contents'];
          $list_c = explode("\n", $contents);
          $body;
          
          foreach($list_c as $lc){
            if(trim($lc) == ""){}else{
              $body = $body.$lc."\n";
            }
          }
          
          
          date_default_timezone_set('Asia/Tokyo');
          $data = $name."\n".$body.date("Y/m/d H:i:s")."\n\n";
          
          $path = 'chatlog/'.$_GET["board"].'.txt';
          
          
          $fp = fopen($path, 'ab');
      
          if ($fp){
              if (flock($fp, LOCK_EX)){
                  if (fwrite($fp,  $data) === FALSE){
                      print('ファイル書き込みに失敗しました');
                  }
                
                  flock($fp, LOCK_UN);
              }else{
                  print('ファイルロックに失敗しました');
              }
          }else{
            echo "FPに失敗しました";
          }
      
          $close = fclose($fp);
          
          if($close){}else{print("クローズに失敗しました");}
          
        }
        header("Location: ".page_url());
      }
      
?>
    </div><br>
    <p><?php 
      if($_SESSION["user"] == null){
        echo "<h3>未ログイン状態です。投稿するには<a class='a' href='/main/sign/in.php'>ログイン</a>または<a class='a' href='/main/sign/up.php'>新規登録</a>してください。</h3>";
      }else{
        echo "<h3>".$_SESSION["user"]."</h3>";
        ?>
      
      <form onsubmit="saveName()" method="POST" action="<?php print($_SERVER['/chat.php?room='.$_GET["board"]]) ?>">
        <textarea class="sendBody" name="contents" wrap="off" spellcheck="false" placeholder="投稿内容" required></textarea><br>
        <br>
        <input type="submit" class="sendButton" value="利用規約に同意して投稿する" > 
        <a href="/main/guide/1.php">利用規約の確認</a>
        <a href="https://chat-board.glitch.me/main/">ダッシュボードへ</a>
      </form>
    
      <?php }
        ?></p>
    </div>
  
    <script src="/main/scripts/log.js"></script>
  
  
  
  
  
  <!--------------------------------------------------------------------------->
  
  <!--
  
  
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
<?php

function page_url(){
  return (((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ) ? "https://" : "http://").$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

?>