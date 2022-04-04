<html>
  <head>
    <title>ChatBoardテスト公開｜トップ</title>
  <link rel="icon" href="https://cdn.glitch.me/513643b9-ee3f-4ca6-92d8-a3381cd75d76%2F%E3%83%95%E3%82%A1%E3%83%93%E3%82%B3%E3%83%B3.png?v=1637581277140">
  <meta name="viewport" content="width=device-width">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>



  </head>
  
  <body>
   <p class="pic">
    <?php require("/app/common/header.php"); ?></p>
    
  <p>
    スパム防止の為、チェックボックスにチェックを入れてください。
  <br>チェックが入ると自動で転送されます。</p>
    <div class="g-recaptcha" data-sitekey="6LfOqkQcAAAAAPafs2f2rb1yRBNB2EO5a2ek5E7u"></div>
   <style>if (isset($_POST['recaptchaResponse']) && !empty($_POST['recaptchaResponse'])) {
    $secret = '6LfOqkQcAAAAAGhooTRVumZIFwde7UuqmWH85Gcz';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['recaptchaResponse']);
    $reCAPTCHA = json_decode($verifyResponse);
    if ($reCAPTCHA->success) {
        // たぶん人間
    } else {url("https://live-chat-cb.glitch.me/");
        // ボットかも
          return;
    }
}</style>