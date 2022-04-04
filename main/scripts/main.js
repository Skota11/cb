function makeRoom(){
  var text = document.getElementById("RoomName").value;
  var href = document.getElementById("href00");
  href.href = "https://chat-board.glitch.me/main/chat.php?board="+text;
  href.click();
}

function searchRoom(){
  var text = document.getElementById("SearchText").value;
  var href = document.getElementById("href01");
  href.href = "https://chat-board.glitch.me/main/search.php?text="+text;
  href.click();
}