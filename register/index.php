<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
if (isset($_POST["close"])) {
   unlink($_POST["path"]);
   die();
}
function generateRandomString($length = 10) {
  $characters = '0123456789';
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, strlen($characters) - 1)];
  }
  return $randomString;
}
if (isset($_POST["submit"])) {
  if (!isset($_SESSION["username"])) {
    $username = htmlspecialchars($_POST["username"])."~".generateRandomString(4);
    $_SESSION["username"] = $username;
  } else {
    $_SESSION["username"] = htmlspecialchars($_POST["username"]);
    $username = htmlspecialchars($_POST["username"]);
    
  }
  $_SESSION["age_user"] = htmlspecialchars($_POST["age"]);
  if ($_FILES["avatar"]["name"] != "") {
    $key = "avatar";
    $FileToUpload = $_FILES[$key]["tmp_name"];
    
    if($FileToUpload == ""){
      $FileToUpload = $_FILES[$key]["full_path"];
    }
    $pathFile = $_FILES[$key]["name"];
    //var_dump($FileToUpload);
    //echo $_POST[$key];
    $name = uniqid();
    $eks = pathinfo($pathFile,PATHINFO_EXTENSION);
    $acceptExtensions = ["png","jpg","jpeg","gif","webp"];
    foreach ($acceptExtensions as $extension) {
      if($eks == $extension){
    $timeNow = date("D, d M Y h:i:s A");
    $TargetDirectory = "../avatar/".$name.".".$eks;

    move_uploaded_file($FileToUpload,$TargetDirectory);
    $_SESSION["avatar"] = $TargetDirectory;
    $data = json_decode(file_get_contents("../user/user.json"),true);
    $userObject = new stdClass();
    $userObject->avatar = $TargetDirectory;
    $userObject->name = htmlspecialchars($_POST["username"]);
    $userObject->age = htmlspecialchars($_POST["age"]);
    $userObject->date_join = date("d M, Y h:i:s");
    $total = $data["total"];
    $data["db"]["$username"] = $userObject;
    $data["total"] = $total + 1;
    file_put_contents("../user/user.json",json_encode($data,JSON_PRETTY_PRINT));
    header("Location: ../");
      }
    }
  } else {
    $_SESSION["avatar"] = "avatar.png";
    $data = json_decode(file_get_contents("../user/user.json"),true);
    $userObject = new stdClass();
    $userObject->avatar = "../avatar.png";
    $userObject->name = $username;
    $userObject->age = htmlspecialchars($_POST["age"]);
    $userObject->date_join = date("d M, Y h:i:s");
    $total = $data["total"];
    $data["db"]["$username"] = $userObject;
    $data["total"] = $total + 1;
    file_put_contents("../user/user.json",json_encode($data,JSON_PRETTY_PRINT));
    header("Location: ../");
  }
  
  
  
}
$user_agent = $_SERVER["HTTP_USER_AGENT"];
$domain = $_SERVER["HTTP_HOST"];


$reactApp = "
$('#root').append(`
<form class='container' enctype='multipart/form-data' id='form' target='' method='POST'>
        <div class='right-side'>
          <div class='containte'>
          <div class='login-card'>
            <label for='username'>username :</label>
              <input class='form-input' required id='username' name='username' type='text' placeholder='username' value=''>
              <label for='age'>age :</label>
              <input class='form-input' required name='age' type='number' id='age' placeholder='your age' value=''>
              <label for='avatar'>upload avatar :</label>
              <input class='form-input' name='avatar' type='file' id='avatar' placeholder='your age' value=''>
              <button name='submit' value='send' type='submit'>Next</button>
          </div>
          <div class='esf'>
           
          <p>© <year></year> | <a href='//$domain'><domain>$domain</domain></a></p>
        </div>
          </div>
        </div>
    </form>`);
 ";
$url = "app.".uniqid().".js";
$f = fopen($url,"w");
fwrite($f, $reactApp);
fclose($f);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrasion</title>
    <link rel="shortcut icon" href="" type="image/x-icon" />
    <link rel="stylesheet" href="index.css">

</head>
<body>
  <div id="root"></div>
  <script src="../jquery-3.6.0.min.js"></script>
  <script data-url="<?= $url; ?>" src="<?= $url; ?>"></script>
    <script type="text/javascript" charset="utf-8">
      let form = document.querySelector("#form"),
      checkBox = document.querySelector("#checkbox_remeberMe"),
      year_footer = document.querySelector("year");
      form.addEventListener("change",function(){
        if(checkBox.checked == true){
          form.target = "";
        } else {
          null
        }
      })
      year_footer.innerHTML=new Date().getFullYear();
    </script>
    <script type="text/javascript" src="../clear-wm.js"></script>
    <script type="text/javascript" src="./close.js"></script>
</body>
</html>