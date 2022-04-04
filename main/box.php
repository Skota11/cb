<?php

$result = array_filter(glob("chatlog/*.txt"));
$resultall;
$file = [];
$tag = [];
$res = [];
$size = [];
$count = 0;
foreach($result as $rs){
    $resultall = mb_substr($rs,8,-4);
    if($_GET["q"] == "" || strpos($resultall,$_GET["q"]) !== false){
    $file[] = read($rs);
    $tag[] = $file[$count][0][0];
    $res[] = $resultall;
    $size[] = count($file[$count]);
    $count++;
  }
}
array_multisort($size,SORT_DESC,$file,$tag,$res);

?>

<form action="/main/search.php" method="GET">
  <input
    type="search"
    class="sendName"
    name="q"
    placeholder="ボドネ検索"
    value="<?php print($_GET["q"]); ?>"
    autocomplete="off"
    list="keywords"
  />
  <datalist id="keywords">
    <?php
    
    /*foreach($res as $r){
      echo "<label><option value='".$r."'>".$r."</label>";
    }*/
          
    ?>
  </datalist>
  <input type="submit" class="sendButton" value="検索する" />
</form>