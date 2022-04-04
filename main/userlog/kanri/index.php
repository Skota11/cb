<html>

<meta name="viewport" content="width=device-width">
  <head>
    <title>Chat-board 管理者ログイン
      
     </title>
  </head>
  <body>
    <?php require("/app/common/header.php");
    ?>
      
  <script type="text/javascript">    
   function gate() { 
      var UserInput = prompt("管理者IDを入力してください（反応がないときはIDが間違ってる可能性があります）","");
      location.href = UserInput + ".php";
  
   }
</script>
<p>
  管理者ページへ移動するには、下のボタンをクリックorタップしてください。
    </p>
    <a href="#" onclick="gate();">管理者ページへ入室
  </a></html>