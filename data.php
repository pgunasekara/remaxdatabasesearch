<html>

<head>

<title>Remax Database Results</title>
                <link rel="icon" 
                    type="image/png" 
                    href='http://pgunasekara.webege.com/me/img/favicon.ico'>
                <link type="text/css" rel="stylesheet" href="stylesheet.css"/>

</head>

<!-- ===========================GOOGLE MAP CODE=============================== -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-PlXcr34rJeOqm5SyB4byrQE3FOvPNM0&sensor=false&extension=.js"></script> 
<script> google.maps.event.addDomListener(window, 'load', init);

var map;

function init() {
    var mapOptions = {
        center: new google.maps.LatLng(43.65323,-79.38318),
        zoom: 7,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.DEFAULT,
        },
        disableDoubleClickZoom: true,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        },
        scaleControl: true,
        scrollwheel: true,
        streetViewControl: true,
        draggable : true,
        overviewMapControl: true,
        overviewMapControlOptions: {
            opened: false,
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    
    
    }

    var mapElement = document.getElementById('map');
    var map = new google.maps.Map(mapElement, mapOptions);
    var locations = [
        ['95', 43.6652306, -79.7429411],['3189', 43.3678922, -79.8141151]
    ];

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            icon: '',
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });
    }
}
</script> 




<!-- =========================END GOOGLE MAP CODE=============================== -->


<?php

echo("<h1>Remax Database Results</h1>");

$oSN = $_POST['OstreetName'];
$oNB = $_POST['OnumBedRooms'];
$oSH = $_POST['OstyleOfHouse'];

$streetName = $_POST['streetName'];
$numBedRooms = $_POST['numBedRooms'];
$styleOfHouse = $_POST['styleOfHouse'];

echo("<p style='font-family:Tahoma; font-size:14px'><a href='http://www.pgunasekara.webege.com/remax'>Click Here</a> to run another Query.</p>");

echo("<p style='font-family:Tahoma; font-size:14px'><a href='http://pgunasekara.webege.com/me/'>Home</a></p><br>");

echo("<center><section id='map'>

</section></center>");

$connect = mysql_connect(/*Enter Connection Details here*/);

$db = mysql_select_db("a1626507_pasindu");

$query = "SELECT address, streetName, styleOfHouse, numBedRooms FROM remax";
$fBool = false;

if($streetName != 'none')
{
	$query = $query." WHERE streetName='$streetName'";
	$fBool = true;
}

if($numBedRooms != 'none')
{
	if($fBool == true)
	{
		$query = $query." AND numBedRooms='$numBedRooms'";
	}
	else
	{
		$query = $query." WHERE numBedRooms='$numBedRooms'";
		$fBool=true;
	}
}

if($styleOfHouse != 'none')
{
	if($fBool)
	{
		$query = $query." AND styleOfHouse='$styleOfHouse'";
	}
	else
	{
		$query = $query." WHERE styleOfHouse='$styleOfHouse'";
		$fBool=true;
	}
}

if($oSN)
{
	$query = $query." ORDER BY streetName";
	$oBool = true;
}

if($oSH)
{
	if($oBool)
	{
		$query = $query.", styleOfHouse";
	}
	else
	{
		$query = $query." ORDER BY styleOfHouse";
		$oBool = true;
	}
}

if($oNB)
{
	if($oBool)
	{
		$query = $query.", numBedRooms";
	}
	else
	{
		$query = $query." ORDER BY numBedRooms";
		$oBool = true;
	}
}


$result = mysql_query($query);

echo $query;

echo("<table border=1px>");
echo("<thead><tr><th><font>Address</font></th><th><font>Street Name</font></th><th><font>  Style of House  </font></th><th><font> Number of Bedrooms </font></th><tr></thead>");

echo("<tbody>");

while($data=mysql_fetch_array($result))
{
	echo("<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td></tr>");
}

echo("</tbody>");

echo("</table>");

echo ("<br><br>");
?>


</html>