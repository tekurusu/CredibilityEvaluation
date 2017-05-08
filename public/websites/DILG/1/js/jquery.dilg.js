$(window).load(function() {
	$('.imglist img').each(function() {
		$(this).wrap('<div style="display:inline-block;width:' + this.width + 'px;height:' + this.height + 'px;">').clone().addClass('gotcolors').css({'position': 'absolute', 'opacity' : 0 }).insertBefore(this);
		this.src = grayscale(this.src);
	}).animate({opacity: 0.4}, 500);
});	
$(document).ready(function() {
	
		$.ajaxSetup({
			error: function(jqXHR, exception) {
				if (jqXHR.status === 0) {
					alert('Not connect.\n Verify Network.');
				} else if (jqXHR.status == 404) {
					alert('Requested page not found. [404]');
				} else if (jqXHR.status == 500) {
					alert('Internal Server Error [500].');
				} else if (exception === 'parsererror') {
					alert('Requested JSON parse failed.');
				} else if (exception === 'timeout') {
					alert('Time out error.');
				} else if (exception === 'abort') {
					alert('Ajax request aborted.');
				} else {
					alert('Uncaught Error.\n' + jqXHR.responseText);
				}
			}
		});
			
		$(".imglist a").hover(
			function() {
				$(this).find('.gotcolors').stop().animate({opacity: 1}, 200);
			}, 
			function() {
				$(this).find('.gotcolors').stop().animate({opacity: 0}, 500);
			}
		);
		$("#rslider").responsiveSlides({
			  auto: true,
			  pager: true,
			  nav: true,
			  speed: 600,
			  pause: true,
			  namespace:"centered-btns"
		});			
		$("div.news_ticker").css('display','block');
		$("ul#ticker").liScroll();	
		
		$("#result-loader").hide();	
		
		var delay = (function(){
		  var timer = 0;
		  return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		  };
		})();	
		
		$('.searchword').keyup(function() {
			var keyword = $(this).val();
			var type = $('.ktxtBox').val();
			var istype = $('.issuancetype').val();
			var url = $('.url').val();			
			delay(function(){
			  lookup(keyword, type, istype, url);
			}, 400 );
		});
		$(".searhboxBTN").click(function(){
			var keyword = $('.searchword').val();
			var type = $('.ktxtBox').val();
			var istype = $('.issuancetype').val();
			var url = $('.url').val();
			delay(function(){
			  lookup(keyword, type, istype, url);
			}, 400 );
			return false;
		});
		
		$('.searchlegal').keyup(function() {
			var keyword = $(this).val();
			var type = $('.ktxtBox').val();
			var cat = $('.catBox').val();
			var url = $('.url').val();			
			delay(function(){
			  lookup_legal(keyword, type, cat, url);
			}, 400 );
		});	
		
		$(".btn_legal").click(function(){
			var keyword = $('.searchlegal').val();
			var type = $('.ktxtBox').val();
			var cat = $('.catBox').val();
			var url = $('.url').val();
			delay(function(){
			  lookup_legal(keyword, type, cat, url);
			}, 400 );
			return false;
		});	
		
		$(".ktxtBox").change(function(){
			var keyword = $('.searchlegal').val();
			var type = $(this).val();
			var cat = $('.catBox').val();
			var url = $('.url').val();
			delay(function(){
			  lookup_legal(keyword, type, cat, url);
			}, 400 );	
		});	
		
		$(".catBox").change(function(){
			var keyword = $('.searchlegal').val();
			var type = $('.ktxtBox').val();
			var cat = $(this).val();
			var url = $('.url').val();
			delay(function(){
			  lookup_legal_dd(keyword, type, cat, url);
			}, 400 );	
		});					 		
					
//		$('.popup').magnificPopup({
//			  type: 'iframe', 
//			  items: {
//				  src: '404.php?id=10'
//				}
//		});		
		$('.popup').magnificPopup({
			  type: 'iframe',
			  iframe: {
				 markup: '<div class="mfp-iframe-scaler">'+
							'<div class="mfp-close"></div>'+
							'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
						  '</div>'
			  },
			  callbacks: {
				markupParse: function(template, values, item) {
				 values.title = item.el.attr('title');
				}
			  }
		});	
		
		$('.thumbbanner').bxSlider({
		  mode: 'vertical',
		  slideWidth: 300,
		  minSlides: 4,
		  slideMargin: 2,
		  pager:false,
		  controls:false,
		  autoStart:true
		}).startAuto();	
});

function lookup(a, type, istype, url)
{
	if(a.length==0)
	{
	}
	else
	{
		$("#result-loader").show();
		$.post(url+"search-list.php", {  s: a, t: type, i:istype }, function(b)
		{
			$('#search_result').html(b.slist).show();
			$("#result-loader").hide();
		}, "json"); 					
	}
}

function lookup_legal(a, type, cat, url)
{
	if(a.length==0)
	{
	}
	else
	{
		$("#result-loader").show();
		$.post(url+"search-list-legal.php", {  s: a, t: type, c: cat }, function(b)
		{
			$('#search_result').html(b.slist).show();
			$("#result-loader").hide();
		}, "json"); 					
	}
}

function lookup_legal_dd(a, type, cat, url)
{
	$("#result-loader").show();
	$.post(url+"search-list-legal.php", {  s: a, t: type, c: cat }, function(b)
	{
		$('#search_result').html(b.slist).show();
		$("#result-loader").hide();
	}, "json"); 
}

function grayscale(src) {
	var supportsCanvas = !!document.createElement('canvas').getContext;
	if (supportsCanvas) {
		var canvas = document.createElement('canvas'), 
		context = canvas.getContext('2d'), 
		imageData, px, length, i = 0, gray, 
		img = new Image();
		
		img.src = src;
		canvas.width = img.width;
		canvas.height = img.height;
		context.drawImage(img, 0, 0);
			
		imageData = context.getImageData(0, 0, canvas.width, canvas.height);
		px = imageData.data;
		length = px.length;
		
		for (; i < length; i += 4) {
			gray = px[i] * .3 + px[i + 1] * .59 + px[i + 2] * .11;
			px[i] = px[i + 1] = px[i + 2] = gray;
		}
				
		context.putImageData(imageData, 0, 0);
		return canvas.toDataURL();
	} else {
		return src;
	}
}	  