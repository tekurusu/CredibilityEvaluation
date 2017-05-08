//(function(doc) {
//
//	var addEvent = 'addEventListener',
//	    type = 'gesturestart',
//	    qsa = 'querySelectorAll',
//	    scales = [1, 1],
//	    meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];
//
//	function fix() {
//		meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
//		doc.removeEventListener(type, fix, true);
//	}
//
//	if ((meta = meta[meta.length - 1]) && addEvent in doc) {
//		fix();
//		scales = [.25, 1.6];
//		doc[addEvent](type, fix, true);
//	}
//
//}(document));

$(document).ready(function() {

	$('#mainnav').slicknav({
		prependTo:'#responsivemenu'
	});
	$('#auxnav').slicknav({
		label: 'AUXILIARY',
		prependTo:'#responsivemenuaux'
	});
	
	$("ul.main-nav li li:has(ul)").find("a:first").append('<span class="nav_arrow">&#9658;</span>');
	$("ul.main-nav li").hover(function(){
		 $(this).find('a.mMain').addClass('active');  				
		 $(this).find('ul:first').show();    
		 $(this).children('.menu_arrow').css('display','block');  			 	
		 $(this).find('ul:first').stop().slideDown(100);
    }, function(){
		 $(this).find('a.mMain').removeClass('active');  		
		 $(this).children('.menu_arrow').css('display','none');  			 				
		 $(this).find('ul:first').hide();        	  	
		 $(this).find('ul:first').stop().slideUp(100);	
    });		
	
	$("ul.topnav li").hover(function(){
		 $(this).find('a.user-signin').addClass('active');  				
		 $(this).find('div').show();     			 	
		 $(this).find('div').stop().slideDown(1000);
    }, function(){
		 $(this).find('a').removeClass('active');  					 				
		 $(this).find('div').hide();        	  	
		 $(this).find('div').stop().slideUp(1000);	
    });					

	equalheight = function(container){
	
	var currentTallest = 0,
		 currentRowStart = 0,
		 rowDivs = new Array(),
		 $el,
		 topPosition = 0;
	 $(container).each(function() {
	
	   $el = $(this);
	   $($el).height('auto')
	   topPostion = $el.position().top;
	
	   if (currentRowStart != topPostion) {
		 for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
		   rowDivs[currentDiv].height(currentTallest);
		 }
		 rowDivs.length = 0; // empty the array
		 currentRowStart = topPostion;
		 currentTallest = $el.height();
		 rowDivs.push($el);
	   } else {
		 rowDivs.push($el);
		 currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
	  }
	   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
		 rowDivs[currentDiv].height(currentTallest);
	   }
	 });
	}
	
	$(window).load(function() {
	  equalheight('.cl-column-content');
	});
	
	
	$(window).resize(function(){
	  equalheight('.cl-column-content');
	});

});
