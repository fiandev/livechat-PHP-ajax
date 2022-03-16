<?php
if ($_GET["ping"]) {
  $ip = $_GET["ping"];
  exec("ping -n 3 $ip", $output, $status);
  print_r($output);
} else {
}
?>