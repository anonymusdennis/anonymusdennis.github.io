<?php
session_start();
header('X-XSS-Protection: 0');
?>
<script>
sessionStorage.removeItem("hallo");
</script>
<?php
if (empty($_SESSION["user"])){
$_SESSION["user"] = $_POST["user"];
$_SESSION["password"] = $_POST["password"];
}

if(!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) {
    if(!empty($_POST["chat"])){
$_SESSION["chat"] = $_POST["chat"];
$_SESSION["color"] = $_POST["color"];
}
}
else{
    $_SESSION["filename"] = $_FILES["file"]["name"];
    $_SESSION["filesize"] = $_FILES["file"]["size"];
    $_SESSION["filetype"] = $_FILES["file"]["type"];
    $_SESSION["filesource"] = $_FILES["file"]["tmp_name"];
    $_SESSION["fileerror"] = $_FILES["file"]["error"];
 echo $_SESSION["user"];
 echo $_SESSION["password"];
 echo $_SESSION["chat"];
 echo $_SESSION["color"];
 echo $_SESSION["filename"];
 $upload_folder = 'upload/';
 $filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
 $extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
 $filename = $_SESSION["filename"];
 $filesize= $_SESSION["filesize"];
 $filetype=$_SESSION["filetype"];
 $filesource = $_SESSION["filesource"];
 $fileerror = $_SESSION["fileerror"];
 $sUploadDir = "/uploads"."/";
 $UploadFilePath = $filename;
 $new_path = $upload_folder.$filename;

 //Neuer Dateiname falls die Datei bereits existiert
 if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
  $id = 1;
  do {
  $new_path = $upload_folder.$filename.'_'.$id;
  $id++;
  } while(file_exists($new_path));
 }

 move_uploaded_file($_FILES['file']['tmp_name'], $new_path);
 echo 'Datei Erfolgreich hochgeladen <a href="'.$new_path.'">'.$new_path.$filename.$_FILES.'</a>';
    $_SESSION["filename"] = $_FILES["file"]["name"];
    $_SESSION["filesize"] = $_FILES["file"]["size"];
    $_SESSION["filetype"] = $_FILES["file"]["type"];
    $_SESSION["filesource"] = $_FILES["file"]["tmp_name"];
    $_SESSION["fileerror"] = $_FILES["file"]["error"];
    if (strstr( $filetype, 'image' )){
        $_SESSION["message"] = "<div><a href='".$new_path."'><img src ='".$new_path."' type='".$filetype."' <br /> Bild:  ".$filename." , Typ: ".$filetype."</a> <br /> <br /><a style='color:blue;' href='".$new_path."' download>Download!</a></div>\r\n";
    }else{
    $_SESSION["message"] = "<div><iframe class='resize' sandbox='allow-scripts' style='width:500px;height:325px; border:none; resize:both;' src='".$new_path."'></iframe><a href='".$new_path."'> Datei:  ".$filename." , Typ: ".$filetype."</a><br/><a style='color:blue;' href='".$new_path."' download>Download!</a></div>\r\n";
    $_SESSION["newmessage"] = "<div><a href='".$new_path."'>Datei:  ".$filename." , Typ: ".$filetype."</a><br/><a style='color:blue;' href='".$new_path."' download>Download!</a></div>\r\n";
}
unset($_FILES);
$_FILES = array();
}
?>
<meta http-equiv="refresh" content="0;url=../chat">