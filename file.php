<?php
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $file_url = "./upload/$id";
  $imageType = ["jpg","png","gif","jpeg"];
  header('Content-Type: application/octet-stream');
  header("Content-Transfer-Encoding: Binary"); 
  header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
  readfile($file_url); 
  header("Location: /");
}
?>