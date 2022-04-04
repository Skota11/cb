var got;
var doc;
got = localStorage.getItem("got");
doc = document.getElementById("got");

function rem() {
  got = localStorage.getItem("got");
  doc = document.getElementById("got");
  localStorage.setItem("got", "true");
  doc.remove();
}
