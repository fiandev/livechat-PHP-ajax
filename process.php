<?php
date_default_timezone_set('Asia/Jakarta');
if (isset($_POST["message"])) {
  session_start();
//var_dump($_FILES);die();
  if ($_FILES["photo"]["name"] != "") {
    $key = "photo";
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
    $TargetDirectory = "./upload/".$name.".".$eks;

    move_uploaded_file($FileToUpload,$TargetDirectory);
    $a = json_decode(file_get_contents("data.json"), true);
    $msg = htmlspecialchars($_POST["message"]);
    $newObject = new stdClass();
    $newObject->name = htmlspecialchars($_POST["name"]);
    $newObject->date = date("D, d M Y h:i:s A");
    $newObject->date2 = date("M d, Y");
    $newObject->message = $msg;
    $newObject->id = $_POST["id"];
    $newObject->avatar = $_SESSION["avatar"];
    $newObject->photo = $TargetDirectory;
    $newObject->filepath = null;
    $newObject->filename = null;
    $newObject->audio = null;
    $newObject->video = null;
    $newObject->locate = null;
    $newObject->sticker = null;
    $i = $a["total"];
    $a["total"] = $i + 1;
    $a["data"][$i] = $newObject;
    file_put_contents("data.json",json_encode($a,JSON_PRETTY_PRINT));
    header("Location: /");
      }
    }
  } else if($_FILES["file"]["name"] != "") {
    $key = "file";
    $FileToUpload = $_FILES[$key]["tmp_name"];
    
    if($FileToUpload == ""){
      $FileToUpload = $_FILES[$key]["full_path"];
    }
    $pathFile = $_FILES[$key]["name"];
    //var_dump($FileToUpload);
    //echo $_POST[$key];
    $name = uniqid();
    $eks = pathinfo($pathFile,PATHINFO_EXTENSION);
    $notAllowed = ["html","js","mjs","php","jpg","png","jpeg","gif"];
    $timeNow = date("D, d M Y h:i:s A");
    $TargetDirectory = "./upload/".$name.".".$eks;
    foreach ($notAllowed as $extension){
      if ($eks == $extension) {
        echo "file [$pathFile] not allowed";
        echo "<script>document.title='403 Forbidden | $pathFile Is not Allowed'</script>";
        die();
      }
    }
    move_uploaded_file($FileToUpload,$TargetDirectory);
    $a = json_decode(file_get_contents("data.json"), true);
    $msg = htmlspecialchars($_POST["message"]);
    $i = $a["total"];
    $newObject = new stdClass();
    $newObject->name = htmlspecialchars($_POST["name"]);
    $newObject->date = date("D, d M Y h:i:s A");
    $newObject->date2 = date("M d, Y");
    $newObject->message = $msg;
    $newObject->id = $_POST["id"];
    $newObject->avatar = $_SESSION["avatar"];
    $newObject->photo = null;
    $newObject->filepath = $TargetDirectory;
    $newObject->filename = $pathFile;
    $newObject->audio = null;
    $newObject->video = null;
    $newObject->locate = null;
    $newObject->sticker = null;
    $a["total"] = $i + 1;
    $a["data"][$i] = $newObject;
    file_put_contents("data.json",json_encode($a,JSON_PRETTY_PRINT));
    header("Location: /");
  } else if($_FILES["audio"]["name"] != ""){
    $key = "audio";
    $FileToUpload = $_FILES[$key]["tmp_name"];
    
    if($FileToUpload == ""){
      $FileToUpload = $_FILES[$key]["full_path"];
    }
    $pathFile = $_FILES[$key]["name"];
    //var_dump($FileToUpload);
    //echo $_POST[$key];
    $name = uniqid();
    $eks = "mp3";
    //var_dump($_FILES["audio"]);die();
    $notAllowed = ["html","js","mjs","php","jpg","png","jpeg","gif"];
    $timeNow = date("D, d M Y h:i:s A");
    $TargetDirectory = "./upload/".$name.".".$eks;
    foreach ($notAllowed as $extension){
      if ($eks == $extension) {
        echo "file [$FileToUpload] not allowed";
        die();
      }
    }
    move_uploaded_file($FileToUpload,$TargetDirectory);
    $a = json_decode(file_get_contents("data.json"), true);
    $i = $a["total"];
    $msg = htmlspecialchars($_POST["message"]);
    $newObject = new stdClass();
    $newObject->name = htmlspecialchars($_POST["name"]);
    $newObject->date = date("D, d M Y h:i:s A");
    $newObject->date2 = date("M d, Y");
    $newObject->message = $msg;
    $newObject->id = $_POST["id"];
    $newObject->avatar = $_SESSION["avatar"];
    $newObject->photo = null;
    $newObject->filepath = null;
    $newObject->filename = $name.".".$eks;
    $newObject->audio = $TargetDirectory;
    $newObject->video = null;
    $newObject->locate = null;
    $newObject->sticker = null;
    $a["total"] = $i + 1;
    $a["data"][$i] = $newObject;
    file_put_contents("data.json",json_encode($a,JSON_PRETTY_PRINT));
    header("Location: /");
  } else if($_FILES["video"]["name"] != ""){
    $key = "video";
    $FileToUpload = $_FILES[$key]["tmp_name"];
    
    if($FileToUpload == ""){
      $FileToUpload = $_FILES[$key]["full_path"];
    }
    $pathFile = $_FILES[$key]["name"];
    //var_dump($FileToUpload);
    //echo $_POST[$key];
    $name = uniqid();
    $eks = pathinfo($pathFile,PATHINFO_EXTENSION);
    //var_dump($_FILES["audio"]);die();
    $notAllowed = ["mov","d"];
    $timeNow = date("D, d M Y h:i:s A");
    $TargetDirectory = "./upload/".$name.".".$eks;
    foreach ($notAllowed as $extension){
      if ($eks == $extension) {
        echo "file [$FileToUpload] not allowed";
        die();
      }
    }
    move_uploaded_file($FileToUpload,$TargetDirectory);
    $a = json_decode(file_get_contents("data.json"), true);
    $i = $a["total"];
    $msg = htmlspecialchars($_POST["message"]);
    $newObject = new stdClass();
    $newObject->name = htmlspecialchars($_POST["name"]);
    $newObject->date = date("D, d M Y h:i:s A");
    $newObject->date2 = date("M d, Y");
    $newObject->message = $msg;
    $newObject->id = $_POST["id"];
    $newObject->avatar = $_SESSION["avatar"];
    $newObject->photo = null;
    $newObject->filepath = null;
    $newObject->filename = $name.".".$eks;
    $newObject->audio = null;
    $newObject->video = $TargetDirectory;
    $newObject->locate = null;
    $newObject->sticker = null;
    $a["total"] = $i + 1;
    $a["data"][$i] = $newObject;
    file_put_contents("data.json",json_encode($a,JSON_PRETTY_PRINT));
    header("Location: /");
  } else if($_POST["locate"] != ""){
    $a = json_decode(file_get_contents("data.json"), true);
    $msg = htmlspecialchars($_POST["message"]);
    $locate = htmlspecialchars($_POST["locate"]);
    $newObject = new stdClass();
    $newObject->name = htmlspecialchars($_POST["name"]);
    $newObject->date = date("D, d M Y h:i:s A");
    $newObject->date2 = date("M d, Y");
    $newObject->message = $msg;
    $newObject->id = $_POST["id"];
    $newObject->avatar = $_SESSION["avatar"];
    $newObject->photo = null;
    $newObject->filepath = null;
    $newObject->filename = null;
    $newObject->audio = null;
    $newObject->video = null;
    $newObject->locate = $locate;
    $newObject->sticker = null;
    $i = $a["total"];
    $a["total"] = $i + 1;
    $a["data"][$i] = $newObject;
    file_put_contents("data.json",json_encode($a,JSON_PRETTY_PRINT));
    header("Location: /");
  } else if($_POST["message"] != ""){
    $a = json_decode(file_get_contents("data.json"), true);
    $msg = htmlspecialchars($_POST["message"]);
    $newObject = new stdClass();
    $newObject->name = htmlspecialchars($_POST["name"]);
    $newObject->date = date("D, d M Y h:i:s A");
    $newObject->date2 = date("M d, Y");
    $newObject->message = $msg;
    $newObject->id = $_POST["id"];
    $newObject->avatar = $_SESSION["avatar"];
    $newObject->photo = null;
    $newObject->filepath = null;
    $newObject->filename = null;
    $newObject->audio = null;
    $newObject->video = null;
    $newObject->locate = null;
    $newObject->sticker = null;
    $i = $a["total"];
    $a["total"] = $i + 1;
    $a["data"][$i] = $newObject;
    file_put_contents("data.json",json_encode($a,JSON_PRETTY_PRINT));
    header("Location: /");
  
  } else if($_POST["sticker"] != ""){
    $a = json_decode(file_get_contents("data.json"), true);
    $msg = htmlspecialchars($_POST["message"]);
    $newObject = new stdClass();
    $newObject->name = htmlspecialchars($_POST["name"]);
    $newObject->date = date("D, d M Y h:i:s A");
    $newObject->date2 = date("M d, Y");
    $newObject->message = $msg;
    $newObject->id = $_POST["id"];
    $newObject->avatar = $_SESSION["avatar"];
    $newObject->photo = null;
    $newObject->filepath = null;
    $newObject->filename = null;
    $newObject->audio = null;
    $newObject->video = null;
    $newObject->locate = null;
    $newObject->sticker = $_POST["sticker"];
    $i = $a["total"];
    $a["total"] = $i + 1;
    $a["data"][$i] = $newObject;
    file_put_contents("data.json",json_encode($a,JSON_PRETTY_PRINT));
    header("Location: /");
  } else {
    header("Location: /");
    die();
  }
}
?>

