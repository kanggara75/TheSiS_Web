<?php
$api_key_value = "tPmAT5Ab3j7F9";
$acx = $acy = $acz = $grx = $gry = $grz = $temp = $api_key = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $api_key = test_input($_POST["api_key"]);
  if ($api_key == $api_key_value) {
    $temp = test_input($_POST["temp"]);
    $acx = test_input($_POST["acx"]);
    $acy = test_input($_POST["acy"]);
    $acz = test_input($_POST["acz"]);
    $grx = test_input($_POST["grx"]);
    $gry = test_input($_POST["gry"]);
    $grz = test_input($_POST["grz"]);

    $accin = [
      'Ax' => $acx,
      'Ay' => $acy,
      'Az' => $acz,
      'Gx' => $grx,
      'Gy' => $gry,
      'Gz' => $grz,
      'Tmp' => $temp,
      'time' => time()
    ];
    $this->db->insert('acc', $accin);
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
