window.onload = function() {

    console.log("Link disabler activated.");
    var anchors = document.getElementsByTagName("a");
    for (var i = 0; i < anchors.length; i++) {
        anchors[i].onclick = function() {console.log("trigger");return(false);};
    }

    // UNCOMMENT THIS IF YOU WANT TO REMOVE ALL ONCLICK EVENTS TOO
    //$("*").unbind("click"); // Removes all click handlers added by javascript from every element
    //$("[onclick]").removeAttr("onclick"); // Finds all elements with an 'onclick' attribute, and removes that attribute
};