<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Time</title>
    <meta http-equiv="refresh" content="180; URL='time.php'"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <script type="text/javascript">
        // Current Server Time script (SSI or PHP)- By JavaScriptKit.com (http://www.javascriptkit.com)
        // For this and over 400+ free scripts, visit JavaScript Kit- http://www.javascriptkit.com/
        // This notice must stay intact for use.

        // Depending on whether your page supports SSI (.shtml) or PHP (.php), UNCOMMENT the line below your page supports and COMMENT the one it does not:
        // Default is that SSI method is uncommented, and PHP is commented:

        //var currenttime = 'July 19, 2016 04:04:15 PM' //SSI method of getting server date
        var currenttime = 'May 16, 2017 09:09:26 AM' //PHP method of getting server date

        // ----- STOP EDITTING HERE ----- //
        var serverdate = new Date(currenttime)
        var weekarray = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        var montharray = new Array("January","February","March","April","May","June","July","August","September","October","November","December")
        var hours = serverdate.getHours();
	var ampm = hours >= 12 ? 'PM':'AM';

        function padlength(what){
            var output=(what.toString().length==1)? "0"+what : what
            return output
        }

        function displaytime(){
            serverdate.setSeconds(serverdate.getSeconds()+1)
            if (padlength(serverdate.getHours()) == "13") var hr="01";
			else if(padlength(serverdate.getHours()) == "14") var hr="02";
			else if(padlength(serverdate.getHours()) == "15") var hr="03";
			else if(padlength(serverdate.getHours()) == "16") var hr="04";
			else if(padlength(serverdate.getHours()) == "17") var hr="05";
			else if(padlength(serverdate.getHours()) == "18") var hr="06";
			else if(padlength(serverdate.getHours()) == "19") var hr="07";
			else if(padlength(serverdate.getHours()) == "20") var hr="08";
			else if(padlength(serverdate.getHours()) == "21") var hr="09";
			else if(padlength(serverdate.getHours()) == "22") var hr="10";
			else if(padlength(serverdate.getHours()) == "23") var hr="11";
			else if(padlength(serverdate.getHours()) == "00") var hr="12";
			else hr = padlength(serverdate.getHours());
            var timestring = hr+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())+" "+ampm
            var datestring = padlength(serverdate.getDate())+" "+montharray[serverdate.getMonth()]+" "+serverdate.getFullYear()+" "+weekarray[serverdate.getDay()]
            document.getElementById("servertime").innerHTML=timestring
            document.getElementById("serverdate").innerHTML=datestring
            if(timestring == "11:59:59 AM") location.reload();
            if(timestring == "11:59:59 PM") location.reload();
        }

        window.onload=function(){
            setInterval("displaytime()", 1000)
        }
    </script>
    <link rel="stylesheet" href="widget.css" type="text/css" media="screen" />
</head>
<body style="background-position:top center; margin: 0px 0px 0px 0px" onClick="window.open('http://www.pagasa.dost.gov.ph/index.php/astronomy/philippine-standard-time')">
<table  class="smalltime" align="center" cellspacing="0" cellpadding="0" style="table-layout:fixed">
<tr style="background-color: #005dd4">
    <td align="right" width="40px" height="25px" ><h1>&nbsp;&nbsp;&nbsp;<img src="pagasa_logo.png" width="24px" height="24px" style="margin-top: 1px" />&nbsp;&nbsp;</h1></td>
    <td align="center"><h1>PHILIPPINE STANDARD TIME</h1></td>
    <td align="left"width="40px"><h1>&nbsp;&nbsp;<img src="phil_flag.png" width="30px" height="15px" style="vertical-align: top; margin-top: 1px;" /></h1></td>
</tr>
<tr>
    <td colspan="3" style="
    background-color: rgba(245, 245, 245, 0.19);
">
        <table align="center" style="margin-top: -40px;table-layout:fixed">
            <tr><td><br /><br />
                <div id="servertime" class="widgettime">
                <script>
                    var serverdate = new Date(currenttime)
                    function padlength(what){
                        var output=(what.toString().length==1)? "0"+what : what
                        return output
                    }
                    serverdate.setSeconds(serverdate.getSeconds()+1)
                    if(padlength(serverdate.getHours()) == "13") var hr="01";
					else if(padlength(serverdate.getHours()) == "14") var hr="02";
					else if(padlength(serverdate.getHours()) == "15") var hr="03";
					else if(padlength(serverdate.getHours()) == "16") var hr="04";
					else if(padlength(serverdate.getHours()) == "17") var hr="05";
					else if(padlength(serverdate.getHours()) == "18") var hr="06";
					else if(padlength(serverdate.getHours()) == "19") var hr="07";
					else if(padlength(serverdate.getHours()) == "20") var hr="08";
					else if(padlength(serverdate.getHours()) == "21") var hr="09";
					else if(padlength(serverdate.getHours()) == "22") var hr="10";
					else if(padlength(serverdate.getHours()) == "23") var hr="11";
					else if(padlength(serverdate.getHours()) == "00") var hr="12";
					else hr = padlength(serverdate.getHours());
                    var hours = serverdate.getHours();
		    var ampm = hours >= 12 ? 'PM':'AM';
                    var timestring = hr+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())+" "+ampm
                    document.writeln(timestring);
                </script>
                </div>
            </td></tr>
        </table>
        <br />
        <table align="center" style="margin-top: -45px;table-layout:fixed">
            <tr><td><br /><h4>
                <div id="serverdate">
                <script>
                    var serverdate = new Date(currenttime)
                    var datestring = padlength(serverdate.getDate())+" "+montharray[serverdate.getMonth()]+" "+serverdate.getFullYear()+" "+weekarray[serverdate.getDay()]
                    document.writeln(datestring);
                </script>
                </div><br /></h4>
            </td></tr>
        </table>
    </td>
</tr>
</table>
</body>
</html>