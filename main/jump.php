<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <title>Chat-board - URLジャンプ</title>
  </head>
 
  
<body>
    <?php require("/app/common/header.php"); ?>
    <div class="page">
    <a href="<?php print($_GET["url"]); ?>" class="a"><xmp><?php print($_GET["url"]); ?></xmp></a>
    <p>上記のサイトにジャンプしようとしています。よろしければ上のリンクをクリックしてください。</p>
   <p>
     現在広告は工事中です。
      </p>
   <!--
      <iframe src="https://ads.bellomaker.repl.co/app?id=29661889" class="ads" width="700" height="700" frameborder="0" style="margin: 0 auto; display: block;">Loading...</iframe>
    -->
    </div>
  </body>
</html>