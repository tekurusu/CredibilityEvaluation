var howLong = 2000;

t = null;
function closeMe(){
  t = setTimeout("self.close()", howLong);
  self.focus();
}

window.onload = function () {
  closeMe();
  self.focus();
}