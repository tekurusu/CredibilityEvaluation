<head>
	<script>
		var howLong = 10000;

		t = null;
		function closeMe(){
		t = setTimeout("self.close()",howLong);
		}
	
	    function previewUrl(url,target){
	        //use timeout coz mousehover fires several times
	        clearTimeout(window.ht);
	        window.ht = setTimeout(function(){
	            var div = document.getElementById(target);
	            div.innerHTML = '<iframe style="width:100%;height:100%;" frameborder="0" src="' + url + '" />';
	        },20);      
	    }   
</script>
</head>

<body onload="closeMe();self.focus()">
	<table>
		<tr>
		<td>
		    <a href="http://www.fb.com">google</a>
		</td>
		<td>
		    <div id="div1" style="width:400px;height:200px;border:1px solid #ddd;"></div>
		</td>
		</tr>
	</table>
</body>

