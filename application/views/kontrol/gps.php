<?php
$api_key_value = "tPmAT5Ab3j7F9";
$acx = $acy = $acz = $grx = $gry = $grz = $temp = $api_key = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $api_key = test_input($_POST["api_key"]);
  if ($api_key == $api_key_value) {
    $lat = test_input($_POST["lat"]);
    $lon = test_input($_POST["lon"]);
    $sat = test_input($_POST["sat"]);
    $hdop = test_input($_POST["hdop"]);

    $gpsin = [
      'sat' => $sat,
      'hdop' => $hdop,
      'lat' => $lat,
      'lon' => $lon,
      'time' => time()
    ];
    $this->db->insert('gps', $gpsin);
    header("HTTP/1.1 202 Accepted");
  } else {
    header("HTTP/1.1 406 Not Acceptable");
  }
} else {
  header("HTTP/1.1 411 Length Required");
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
