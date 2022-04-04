
<html>
  <head>
    <title>ChatBoard｜トップ</title>
<meta name="viewport" content="width=device-width">
<link rel="icon" href="https://t.gasukaku.net/cb.png">
  </head>
  
  <body>
    <script>
          // location.href="../";
    </script>
   <p class="pic">
     <?php require("/app/common/header.php"); ?></p></div>
    
  
  <div id="news">  
        <h1>
         　 お知らせ 
          <!--お知らせは、2行以下で済む場合は普通に表示、2行以上になる場合は流れる文字で出してください。-->
      </h1>
      <!--<marquee scrolldelay="150" scrollamount="15" width="100%">　-->
     <!--流れる文字にする場合、marqueeタグのコメントアウトを外すと文字が自動的に流れます-->
      
    
    アカウントをオールリセットしました。再登録をお願いします。
   
 </marquee>
  </div>
    
    <?php
    $fp3 = fopen('userlog/mute.txt','a+b');
    
    while (!feof($fp3)) {
      $datas3[] = fgets($fp3);
    }

    foreach($datas3 as $d){
      $trdatas3[] = trim($d);
    }
    
    if(in_array($_SESSION["user"],$trdatas3)){
      echo("BANされています");
      $_SESSION["user"] = "";
      $_SESSION["pwd"] = "";
    }
    ?>
    
    
    <p>
  
      
  
      <a href="/main/guide/">利用規約</a>
      <a href="/main/sign/">アカウント</a>
      <a href="/main/board/">ボード</a>

      <?php
      $user = $_SESSION['user'];
      if($user == null){
        echo "<a href='/main/sign/in.php'>ログイン</a>";
      }else{
        echo "<a href=''>".$user."のダッシュボード</a>"; 
      }
      ?>
    
    
    </p>   
      
      <form action="/main/chat.php" method="GET">
        <input
          type="text"
          class="sendName"
          name="board"
          placeholder="ボード作成・移動"
          autocomplete="off"
        />
        <input type="submit" class="sendButton" value="作成・移動する" />
      </form>

      <?php require("/app/main/box.php"); ?>
      <p>
  <a href="../main/search.php?q=">ボドネ一覧</a>
      </p>
      <h3>新着記事</h3>
      <?php
      
      $file = read("chatlog/chat-board公式ニュースボード.txt");
      $c = count($file) - 1;
      
      $ccc = $c+1;
      
      $cc = 0;
      
      
      foreach($file[$c] as $f){
        
        if($cc < 4 && $cc != 0){
          echo "<xmp class='date'>".$f."</xmp>";
        }
        $cc++;
        
      }
            
      echo "<a class='a' href='/main/chat.php?board=chat-board公式ニュースボード#com_". $ccc ."'>...続きを見る</a>";
      
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
    <h4>ライセンス</h4> 
    <p>
本掲示板はBellomakerによる「Telk」のソースコードを継承して作成されています。      </p>
      <p>
    <h4>
      関連
  </h4>
        <a href="https://live-chat-cb.glitch.me/">リアルタイムチャット(CB-Chat)</a>
      </p>
      <p>
        <a href="../main/contact.php">公式アカウント申請・運営への連絡等はこちら</a>
      
      </p>
<p>
   <a href="https://www.gasukaku.net/chat-board" target="_blank">ChatBoard稼働状況</a>
</p>
    ChatBoardをシェア
    <br>
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="誰でも無料で利用できるオンライン掲示板　#ChatBoard " data-url="https://chat-board.glitch.me/" data-lang="ja" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <br><br>
    <a href="mailto:宛先を指定してください?subject=＜友達に送りたい件名を指定してください＞&body=＜カスタムしてください＞%0D%0A完全無料で誰でも利用できるオンライン掲示板「ChatBoard」%0D%0Ahttps://chat-board.glitch.me">メールでシェア</a>
    <br>
    <br>
<br>
<div id="f">
  <a href="../main/contact.php"class="a"style="color:black">運営へ連絡</a><br><a href="#"class="a"style="color:black">最上部↑</a>
</div>
</div>

</body>

</html>
