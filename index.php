<?php
session_start();
if (isset($_POST["close"])) {
  unlink($_POST["path"]);
  die();
}
if (!isset($_SESSION["username"])) {
  header("Location: /register/");
} else {
  $username = $_SESSION["username"];
  $avatar = $_SESSION["avatar"];
}

//session_destroy();
//$username = "unknown"; //this from session after login
$data = json_decode(file_get_contents("data.json"),true);
$dateNow = date("M d, Y");
$total = $data["total"];
$ip = $_SERVER["REMOTE_ADDR"];
$authName = $_SESSION["username"];
$listSticker = array_diff(scandir(__DIR__."/list-sticker"));
$listSticker_json = json_encode($listSticker);
$reactApp = "const dataList_sticker = $listSticker_json; $('#root').append(`<div class='container'> <h1 class='title-top'>live chat</h1> <div class='message-container' id='root_1'></div> <div class='message-container' id='root_2'> <div id='date' class='date-message'><hr /> <span>No Message</span> <hr /></div> </div> <div class='controller'> <div class='plus-item' onclick='addMedia()'> </div> <form onsubmit='return false' method='post' enctype='multipart/form-data' id='form' accept-charset='utf-8'> <textarea type='text' name='message' id='message' class='input' placeholder='type message..' value=''></textarea> <input type='hidden' name='name' id='name' value='$username' /> <input type='hidden' name='id' id='id' value='$ip' /> <input onchange='fileHandle(this)' type='file' style='display:none;' name='photo' id='photo' value='' accept='image/*' /> <input onchange='fileHandle(this)' type='file' style='display:none;' name='file' id='file' value='' /> <input accept='audio/*' onchange='fileHandle(this)' type='file' style='display:none;' name='audio' id='audio' value='' /> <input type='text' style='display:none;' name='locate' id='locate' value='' /> <input accept='video/mp4,video/x-m4v,video/*' onchange='fileHandle(this)' type='file' style='display:none;' name='video' id='video' value='' /> <button id='btn' type='button' onclick='sendMessage()'>send</button> </form> </div>`);const total = $total,ip_user = '$ip',date_now = '$dateNow', name_user = '$authName';$.getScript('script.js');";
 $url = "app.".uniqid().".js";
 $f = fopen($url,"w");
fwrite($f,$reactApp);
fclose($f);
      
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" type="text/css" media="all" />
    <title>live chat</title>
  </head>
  <body>
    <div id="root"></div>
    
    <script src="jquery-3.6.0.min.js" type="text/javascript" charset="utf-8"></script>
    <script data-url="<?= $url; ?>"  src="<?= $url; ?>" type="text/javascript" charset="utf-8"></script>
    <script src='close.js'></script>
    <script>
      $(document).ready(function(){
       $('body').find('img[src$="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]').remove();
      }); 
    </script>
  </body>
</html>