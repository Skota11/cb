<html>
  <head>
     <meta name="viewport" content="width=device-width">
    <title>Chat-board - アカウント管理</title>
  </head>
  <body>
    <?php require("/app/common/header.php"); ?>
    <div class="page">
      <?php echo $_SESSION['user']."でログインしています<br><br>"; ?>
      <a href="/main/sign/in.php">ログイン</a>
      <a href="/main/sign/up.php">登録</a>
      <a href="/main/sign/out.php">ログアウト</a>
      <a href="/main/sign/change.php">パスワードの変更</a>
      <a href="https://chat-board.glitch.me/main/userlog/kanri">管理者ページへ入室</a>
<!--       <a href="/main/sign/acount_help.php">アカウント復旧IDを発行</a> -->
      <a href="/main/">ダッシュボードへ</a><br><br>
    </div>
  
  </body>
</html>