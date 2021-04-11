<?php
echo "<a href='https://github.com/355Q/As18'>Link to GitHub repo</a><br>";

$arr = json_decode(file_get_contents('https://api.covid19api.com/summary'));
$deathsArray = [];

foreach ($arr->Countries as $obj) {
	$deathsArray[$obj->Country] = $obj->TotalDeaths;
}
arsort($deathsArray);
$topTenDeathsObj = json_decode(json_encode(array_slice($deathsArray, 0, 9)));

echo '<style>th,td{border:1px solid black;}</style>';
echo '<table style="border:1px solid black;border-spacing:5px;border-collapse: collapse;">
  <tr>
    <th>Country</th>
    <th>Total Deaths</th>
  </tr>';

foreach ($topTenDeathsObj as $country => $deaths) {
	echo "<tr><td>$country</td><td>$deaths</td></tr>";
}

echo "</table>";
