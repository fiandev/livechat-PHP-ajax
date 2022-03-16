<?php
if (isset($_GET["name"])) {
  error_reporting(E_ERROR | E_PARSE);
  $nameGet = $_GET["name"];
  $data = json_decode(file_get_contents("user.json"),true);
  $db_user = $data["db"][$nameGet];
  if ($db_user == null) {
    readfile("user-404.html");
    die();
  }
}
$avatar = $db_user["avatar"];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>200 | <?= $db_user["name"]; ?></title>
    <link rel="shortcut icon" href="<?= $avatar; ?>" type="image/x-icon" />
    <style type="text/css" media="all">
      * {
        padding: 0;
        margin: 0;
      }
      body {
        background-color: #2b2741;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }
      .container {
        margin: 5px 10px;
        
        text-align: center;
      }
      .container img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: solid 3px #fff;
      }
      .container p {
        color: #fff;
      }
      .name {
        font-size: 18px;
      }
      .age {
        font-size: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <img class="" src="<?= $db_user["avatar"]; ?>" alt="" />
      <p class="name"><?= $db_user["name"]; ?></p>
      <p class="age"><?= $db_user["age"]; ?> years</p>
    </div>
  </body>
</html>