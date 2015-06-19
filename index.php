<?php

echo("<head>

<title>Remax Database</title>
                <link rel='icon'
                    type='image/png' 
                    href='http://pgunasekara.webege.com/me/img/favicon.ico'>
                <link type='text/css' rel='stylesheet' href='stylesheet.css'/>

</head>");

echo("<h1>Remax Database</h1>");


echo("<p>Welcome to the Remax Database,<br>Select your filtering options:</p>");

echo("<form action='data.php' method='post'>");

echo("<select name='streetName'>");

echo("<option value='none'>Select a Street Name</option>");

$connect = mysql_connect(/*Enter Connection Details here*/);

$db = mysql_select_db("a1626507_pasindu");

$query = "SELECT DISTINCT streetName FROM remax ORDER BY streetName";

$result = mysql_query($query);

while($data = mysql_fetch_array($result))
{
	echo("<option>$data[0]</option><br>");
}

echo("</select>");

echo("<select name='styleOfHouse'>");

echo("<option value='none'>Select a Style of House</option>");

$connect = mysql_connect(/*Enter Connection Details here*/);

$db = mysql_select_db("a1626507_pasindu");

$query = "SELECT DISTINCT styleOfHouse FROM remax ORDER BY styleOfHouse";

$result = mysql_query($query);

while($data = mysql_fetch_array($result))
{
	echo("<option>$data[0]</option><br>");
}

echo("</select>");

echo("<select name='numBedRooms'>");

echo("<option value='none'>Select a Number of Bedrooms</option>");

$connect = mysql_connect(/*Enter Connection Details here*/);

$db = mysql_select_db("a1626507_pasindu");

$query = "SELECT DISTINCT numBedRooms FROM remax ORDER BY numBedRooms";

$result = mysql_query($query);

while($data = mysql_fetch_array($result))
{
	echo("<option>$data[0]</option><br>");
}

echo("</select>");

echo("<p>Select an Order:<p>");

echo("<input type='checkbox' name='OstreetName' >Street Name</input><br>");
echo("<input type='checkbox' name='OstyleOfHouse' >Style of House</input><br>");
echo("<input type='checkbox' name='OnumBedRooms' >Number of Bedrooms</input><br>");



echo("<br><input type='submit'>");

echo("</form>");

echo("<p style='font-family:Tahoma; font-size:14px'><a href='http://pgunasekara.webege.com/me/'>Home</a></p>");

?>