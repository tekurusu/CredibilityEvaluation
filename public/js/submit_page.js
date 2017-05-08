function popWindow(site, mod) {
  //var theURL = '../public/websites/<?php echo $short_link; ?>/' + mod + '/index.html';
  var theURL = '../public/websites/' + site + '/' + mod + '/index.html';
  var newWindow = window.open(
    theURL,
    'newWindow',
    'toolbar=no,\
     menubar=no,\
     resizable=no,\
     scrollbars=no,\
     status=no,\
     location=no,\
     width='+window.innerWidth+',\
     height='+window.innerHeight
  );

  setTimeout(function() {
    newWindow.close();
  } , 25000);
}

var warnBeforeUnload = true;

window.onbeforeunload = function() {
  if (warnBeforeUnload) {
    return "Are you sure you want to leave? Changes you made will not be saved."; 
  }
  return undefined;
}

// Form Submit
$(document).on("submit", "form", function(event){
    warnBeforeUnload = false;
});

$(document).ready(function() {
  $("#website_1, #website_2").css("cursor", "pointer");
});