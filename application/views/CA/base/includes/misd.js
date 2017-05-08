/* 
 * Court of Appeals
 * Manila, Philippines    
 * Written by Gaffar Mua, MISD
 * June 28, 2012
 *
 */

		$(window).ready(function() {
			
		    $('#slideImages img:not(:first)').hide();
		    // position images
		    $('#slideImages img').css('position', 'absolute');
			
		   function doRotateImages() {
			      $('#slideImages img').first().fadeOut().appendTo($('#slideImages'));
			      
			      $('#slideImages img').first().fadeIn();
		    }
		    
		    var rotate = setInterval(doRotateImages, 5000);
		});

