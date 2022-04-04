window.onload = function() {
  
  document.getElementById("name").value = localStorage.getItem("name");
  document.getElementById("idview").value = localStorage.getItem("idview");
}

function saveName() {
  localStorage.setItem("name", document.getElementById("name").value);
  localStorage.setItem("idview", document.getElementById("idview").value);
}

function scw(elem) {
  var element = document.getElementById(elem);
  var rect = element.getBoundingClientRect();
  var elemtop = rect.top + window.pageYOffset;
  document.documentElement.scrollTop = elemtop;
}