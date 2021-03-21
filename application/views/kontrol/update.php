<?php
$api_key_value = "tPmAT5Ab3j7F9";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $api_key = test_input($_POST["api_key"]);
  if ($api_key == $api_key_value) {
    $acx = test_input($_POST["acx"]);
    $acy = test_input($_POST["acy"]);
    $acz = test_input($_POST["acz"]);
    $grx = test_input($_POST["grx"]);
    $gry = test_input($_POST["gry"]);
    $grz = test_input($_POST["grz"]);
    $temp = test_input($_POST["temp"]);
    // GPS Section
    $lat = test_input($_POST["lat"]);
    $lon = test_input($_POST["lon"]);

    $accin = [
      'x' => $acx,
      'y' => $acy,
      'z' => $acz,
      'gx' => $grx,
      'gy' => $gry,
      'gz' => $grz,
      'temp' => $temp,
      'time' => time()
    ];
    $gpsin = [
      'lat' => $lat,
      'lon' => $lon,
      'time' => time()
    ];
    $this->db->insert('acc', $accin);
    $this->db->insert('map', $gpsin);
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
