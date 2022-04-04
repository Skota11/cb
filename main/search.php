<html>
  <head>
   <meta name="viewport" content="width=device-width">
<link rel="icon" href="https://t.gasukaku.net/cb.png">
    <title>
      <?php
      if($_GET["text"] == ""){?>
        Chat-board - ボドネ一覧
      <?php }else{ ?>
      Chat-board - ボドネ検索：<?php print($_GET["text"]) ?>
      <?php } ?>
    </title>
  </head>
  <body>
    <?php require("/app/common/header.php"); ?>
    <div class="page">
      
      <?php require("/app/main/box.php"); ?>
      
    <p class="date">検索結果は、投稿数が多い順にソートされます。</p>
  <h4>
    
    
     
   <div id="board-name">
     
    
    <?php
      $count = 0;
      foreach($tag as $t){
        
        echo "<a href='/main/chat.php?board=".$res[$count]."' class='a'><xmp>".$res[$count]."</xmp></a><xmp class='maker'>";
        echo $t."</xmp>";
        echo "<xmp class='user'>".count($file[$count])."</xmp>";
        
        $count++;
      }
      
    
      
    
    if(count($file) == 0){
      echo "<div class='cool'><h3>お探しのボードは見つかりませんでした</h3>";
      echo "<p>下に書いていることをすればいいかもしれません。</p>";
      echo "<li>半角・全角を変える</li>";
      echo "<li>変な空白を除く</li>";
      echo "<li>英語であれば大文字小文字を変える</li>";
      echo "<li>単語で検索する</li>";
      echo "<p>それでも出てこない場合は、検索欄を空白にして一覧検索をしてみてください。</p></div>";
    }
      
      
      
      
    function read($file){
  
     $fp = fopen($file, 'r');
  
      $data = [];
  
      while($line = fgets($fp)){
        $data[] = $line;
      }
  
      fclose($fp);
  
      $public = [];
  
      $count = 0;
      $dc = 0;
    
      foreach($data as $d){
  	    if(trim($d) == ""){
  		    $count++;
  		    $dc = 0;
  	    }else{
  		    $public[$count][$dc] = str_replace(PHP_EOL, "" ,$d);
  		    $dc++;
  	    }
      }
      
      return $public;
    }
    ?>
    <a class="a plus" href="/main/">メインページへ戻る</a>
    </div>  </div>   
    
    
    <script type="text/javascript" src="https://chat-board.glitch.me/main/scripts/main.js"></script>
  </body>
</html>
