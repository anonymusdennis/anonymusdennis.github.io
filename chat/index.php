<?php
session_start();

header('X-XSS-Protection: 0');
if(!empty($_POST["user"]) && !empty($_POST["password"])){
    $user = $_POST["user"];
    $password = $_POST["password"];

}else{
    if(!empty($_SESSION["user"]) && !empty($_SESSION["password"])){
        $user = $_SESSION["user"];
        $password = $_SESSION["password"];

    }else{
        $user = "";
        $password = "";

    }
}
//fopen("benutzer/benutzer.txt","w");
$lines = file("files/users.txt",FILE_IGNORE_NEW_LINES);

$key = array_search($user,$lines);

if ($key != false){

    if ($lines[$key+2]==$password){
        if ($lines[$key+1]== "pw"){
        }else{
echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        }
    } else {
echo "<meta http-equiv='refresh' content='0;url=login.php'>";
    }
}else {
echo "um dich anzumelden; Klicke bitte hier: <a href='login.php'> Zur Anmeldung:</a>";
echo "<meta http-equiv='refresh' content='0;url=login.php'>";
}
?>

<!DOCTYPE html>
<html>


<head>

    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>IT-Chat</title>
    <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">

    <style>
    @media screen and (max-width: 420px) {
        
    #lately{
        top:200px;
            left:100px;
            width:1000px;
            height:400px;
                overflow-x: hidden;
            overflow: auto;
            position:absolute;
        position: relative;
        z-index: 20;
        display:none;
        border:2px solid black;
        background-color: rgb(0,0,0,0.60);
    }
    .visible{
        display:block !important;
    }
    .Server{
        text-align: center;
    }
        #emoji{
            font-size:2em;
        }
        body *{
            font-family:Verdana, sans-serif;
        }
        input {
            margin: auto;
        }
        #chat{
            top: 20px;
            width:100%;
            height:326px;
            text-align: left;
            text-indent: 20px;
            margin:auto;
            overflow: auto;

        }
        #wrap{
            overflow-x: hidden;
            overflow: auto;
            position:absolute;
            top:200px;
            left:calc(50% - 500px);
            margin:auto;
            width:1000px;
            height:656px;
            border:2px solid black;
            margin:auto;
            margin-bottom:20px;
            resize: both !important;
            }
        #space{
            resize: both !important;
            width:494px;
            height:20px;
            resize: none;
  background-color: rgb(44,44,44) !important;
        }
        #color{
            position:relative;
            width:35px;
            height:22px;
            top:-6px;
            left:-5px;
        }
        #btnsubmit{
            width:70px;
            position:relative;
            left:-11px;
            top: -8px;
            height:26px;
 background-color: rgb(44,44,44) !important;
        }
        #file{
            position:relative;
            left:-16px;
            top: -10px;
 background-color: rgb(44,44,44) !important;
        }
        iframe *{
            pointer-events:none;
        }
        #input{
            z-index:1000;
        background-color: unset !important;
        position:absolute;
        top: 834px; left: calc(50% - 484px);
        bottom:5px;
        height:20px;
        }
        body.dark-mode #input *{
            border:1px solid white;
        }
        body.light-mode #input *{
            border:1px solid black;
        }
        #reload{
            background-color: rgb(255,255,255, 0.5);
            position:relative;
            top: -326.2px;
            left:-151px;
        }
        .automl{
            background-color: rgb(255,255,255, 0.5);
            position:relative;
            top: -326.2px;
            left:-151px;
        }
        .rand{
            text-indent: 1px;
            margin-top:20px;
            border:1px solid green;
            border-radius: 5px;
            width:300px;
            display:inline-block;
            position:relative;
        }
        .sourr{
            margin-bottom:30px;
            width:100%;
            display:flex;
        }
        
        #anmelden{
            position:absolute;
            top: 98px; calc(50% - 160px);
        }
        #em {
            font-size: 2em;
        }
#reloads{
    background-color: unset !important;
    position:absolute;
    top: 533px; left: 1036px;
}
        body.dark-mode {
  background-color: rgb(44,44,44,0.5);
  color: #eee;
}
body.dark-mode #wrap{

  border:2px solid white;}

body.dark-mode a {
  color: rgb(44,44,44);
}
body.dark-mode * :not(#chat)  {
  background-color: rgb(44,44,44, 0.5);
  color: white;
}
body.dark-mode #chat *,
body.dark-mode #wrap
 {
    background-color: rgb(153, 153, 153, 0.97);
    color:currentColor;
}
body.light-mode #chat *,
body.light-mode #wrap
 {
    background-color: rgb(255, 255, 255, 0.97);
    color:currentColor;
}
body.dark-mode button {
  background-color: rgb(153, 153, 153, 0.5);
  color: #eee;
}

body.light-mode {
  background-color: rgb(238, 238, 238, 0.9);
  color: rgb(44,44,44);
}
body.light-mode a {
  color: rgb(44,44,44);
}
body.light-mode *:not(.chat *) {
  background-color: rgb(211, 211, 211, 0.9);
  color: black;
}
body.light-mode button {
  background-color: rgb(238, 238, 238, 0.9);
  color: rgb(44,44,44);
}
body.light-mode h1{
color: rgb(251, 255, 254);}
.resizable:active{
cursor:move;
}
#userbuttons{
    position:absolute;
    top:30px;
    left:20px;
}
body.dark-mode #console {
            background-color: rgb(44,44,44,0);
        }
        body.light-mode #console {
            background-color: #eee;
        }
        .names{
            background-color: rgb(12,12,12,0) !important;
            position:relative;
            display:inline-block;
            width:fit-content;
            font-family: cursive !important;
        }
        .resize{
            resize: both !important;
            overflow:auto;
        }
        .time{
            background-color: rgb(12,12,12,0) !important;
            position:relative;
            right: 70px; 
            bottom: -7px;
            font-size:11px;
        }
    </style>
<style>
/* ============================================================================================== 
SED Innovations
https://sed.am
https://mkrtchyan.ga
================================================================================================= */
* {
    margin: 0;
    padding: 0;
}
header {
    background-color:rgba(33, 33, 33, 0.9);
    color:#ffffff;
    display:block;
    font: 14px/1.3 Arial,sans-serif;
    height:50px;
    position:relative;
    z-index:-1;
}
h2{
    margin-top: 30px;
    text-align: center;
}
header h2{
    font-size: 22px;
    margin: 0 auto;
    padding: 10px 0;
    width: 80%;
    text-align: center;
}
header a, a:visited {
    text-decoration:none;
    color:#fcfcfc;
}

@keyframes move-twink-back {
    from {background-position:0 0;}
    to {background-position:-10000px 5000px;}
}
@-webkit-keyframes move-twink-back {
    from {background-position:0 0;}
    to {background-position:-10000px 5000px;}
}
@-moz-keyframes move-twink-back {
    from {background-position:0 0;}
    to {background-position:-10000px 5000px;}
}
@-ms-keyframes move-twink-back {
    from {background-position:0 0;}
    to {background-position:-10000px 5000px;}
}

@keyframes move-clouds-back {
    from {background-position:0 0;}
    to {background-position:10000px 0;}
}
@-webkit-keyframes move-clouds-back {
    from {background-position:0 0;}
    to {background-position:10000px 0;}
}
@-moz-keyframes move-clouds-back {
    from {background-position:0 0;}
    to {background-position:10000px 0;}
}
@-ms-keyframes move-clouds-back {
    from {background-position: 0;}
    to {background-position:10000px 0;}
}

.stars, .twinkling, .clouds {
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
  width:100%;
  height:100%;
  display:block;
}

.stars {
  background:#000 url(http://www.script-tutorials.com/demos/360/images/stars.png) repeat top center;
  z-index:-6;
}

.twinkling{
  background:transparent url(http://www.script-tutorials.com/demos/360/images/twinkling.png) repeat top center;
  z-index:-5;

  -moz-animation:move-twink-back 200s linear infinite;
  -ms-animation:move-twink-back 200s linear infinite;
  -o-animation:move-twink-back 200s linear infinite;
  -webkit-animation:move-twink-back 200s linear infinite;
  animation:move-twink-back 200s linear infinite;
}

.clouds{
    background:transparent url(http://www.script-tutorials.com/demos/360/images/clouds3.png) repeat top center;
    z-index:-3;

  -moz-animation:move-clouds-back 200s linear infinite;
  -ms-animation:move-clouds-back 200s linear infinite;
  -o-animation:move-clouds-back 200s linear infinite;
  -webkit-animation:move-clouds-back 200s linear infinite;
  animation:move-clouds-back 200s linear infinite;
}
}

    #lately{
        top:200px;
            left:100px;
            width:1000px;
            height:400px;
                overflow-x: hidden;
            overflow: auto;
            position:absolute;
        position: relative;
        z-index: 20;
        display:none;
        border:2px solid black;
        background-color: rgb(0,0,0,0.60);
    }
    .visible{
        display:block !important;
    }
    .Server{
        text-align: center;
    }
        #emoji{
            font-size:2em;
        }
        body *{
            font-family:Verdana, sans-serif;
        }
        input {
            margin: auto;
        }
        #chat{
            top: 20px;
            width:100%;
            height:326px;
            text-align: left;
            text-indent: 20px;
            margin:auto;
            overflow: auto;

        }
        #wrap{
            overflow-x: hidden;
            overflow: auto;
            position:absolute;
            top:200px;
            left:calc(50% - 500px);
            margin:auto;
            width:1000px;
            height:656px;
            border:2px solid black;
            margin:auto;
            margin-bottom:20px;
            resize: both !important;
            }
        #space{
            resize: both !important;
            width:494px;
            height:20px;
            resize: none;
  background-color: rgb(44,44,44) !important;
        }
        #color{
            position:relative;
            width:35px;
            height:22px;
            top:-6px;
            left:-5px;
        }
        #btnsubmit{
            width:70px;
            position:relative;
            left:-11px;
            top: -8px;
            height:26px;
 background-color: rgb(44,44,44) !important;
        }
        #file{
            position:relative;
            left:-16px;
            top: -10px;
 background-color: rgb(44,44,44) !important;
        }
        iframe *{
            pointer-events:none;
        }
        #input{
            z-index:1000;
        background-color: unset !important;
        position:absolute;
        top: 834px; left: calc(50% - 484px);
        bottom:5px;
        height:20px;
        }
        body.dark-mode #input *{
            border:1px solid white;
        }
        body.light-mode #input *{
            border:1px solid black;
        }
        #reload{
            background-color: rgb(255,255,255, 0.5);
            position:relative;
            top: -326.2px;
            left:-151px;
        }
        .automl{
            background-color: rgb(255,255,255, 0.5);
            position:relative;
            top: -326.2px;
            left:-151px;
        }
        .rand{
            text-indent: 1px;
            margin-top:20px;
            border:1px solid green;
            border-radius: 5px;
            width:300px;
            display:inline-block;
            position:relative;
        }
        .sourr{
            margin-bottom:30px;
            width:100%;
            display:flex;
        }
        
        #anmelden{
            position:absolute;
            top: 98px; calc(50% - 160px);
        }
        #em {
            font-size: 2em;
        }
#reloads{
    background-color: unset !important;
    position:absolute;
    top: 533px; left: 1036px;
}
        body.dark-mode {
  background-color: rgb(44,44,44,0.5);
  color: #eee;
}
body.dark-mode #wrap{

  border:2px solid white;}

body.dark-mode a {
  color: rgb(44,44,44);
}
body.dark-mode * :not(#chat)  {
  background-color: rgb(44,44,44, 0.5);
  color: white;
}
body.dark-mode #chat *,
body.dark-mode #wrap
 {
    background-color: rgb(153, 153, 153, 0.97);
    color:currentColor;
}
body.light-mode #chat *,
body.light-mode #wrap
 {
    background-color: rgb(255, 255, 255, 0.97);
    color:currentColor;
}
body.dark-mode button {
  background-color: rgb(153, 153, 153, 0.5);
  color: #eee;
}

body.light-mode {
  background-color: rgb(238, 238, 238, 0.9);
  color: rgb(44,44,44);
}
body.light-mode a {
  color: rgb(44,44,44);
}
body.light-mode *:not(.chat *) {
  background-color: rgb(211, 211, 211, 0.9);
  color: black;
}
body.light-mode button {
  background-color: rgb(238, 238, 238, 0.9);
  color: rgb(44,44,44);
}
body.light-mode h1{
color: rgb(251, 255, 254);}
.resizable:active{
cursor:move;
}
#userbuttons{
    position:absolute;
    top:30px;
    left:20px;
}
body.dark-mode #console {
            background-color: rgb(44,44,44,0);
        }
        body.light-mode #console {
            background-color: #eee;
        }
        .names{
            background-color: rgb(12,12,12,0) !important;
            position:relative;
            display:inline-block;
            width:fit-content;
            font-family: cursive !important;
        }
        .resize{
            resize: both !important;
            overflow:auto;
        }
        .time{
            background-color: rgb(12,12,12,0) !important;
            position:relative;
            right: 70px; 
            bottom: -7px;
            font-size:11px;
        }
    </style>
<!--
<style>
/* ============================================================================================== 
SED Innovations
https://sed.am
https://mkrtchyan.ga
================================================================================================= */
* {
    margin: 0;
    padding: 0;
}
header {
    background-color:rgba(33, 33, 33, 0.9);
    color:#ffffff;
    display:block;
    font: 14px/1.3 Arial,sans-serif;
    height:50px;
    position:relative;
    z-index:-1;
}
h2{
    margin-top: 30px;
    text-align: center;
}
header h2{
    font-size: 22px;
    margin: 0 auto;
    padding: 10px 0;
    width: 80%;
    text-align: center;
}
header a, a:visited {
    text-decoration:none;
    color:#fcfcfc;
}

@keyframes move-twink-back {
    from {background-position:0 0;}
    to {background-position:-10000px 5000px;}
}
@-webkit-keyframes move-twink-back {
    from {background-position:0 0;}
    to {background-position:-10000px 5000px;}
}
@-moz-keyframes move-twink-back {
    from {background-position:0 0;}
    to {background-position:-10000px 5000px;}
}
@-ms-keyframes move-twink-back {
    from {background-position:0 0;}
    to {background-position:-10000px 5000px;}
}

@keyframes move-clouds-back {
    from {background-position:0 0;}
    to {background-position:10000px 0;}
}
@-webkit-keyframes move-clouds-back {
    from {background-position:0 0;}
    to {background-position:10000px 0;}
}
@-moz-keyframes move-clouds-back {
    from {background-position:0 0;}
    to {background-position:10000px 0;}
}
@-ms-keyframes move-clouds-back {
    from {background-position: 0;}
    to {background-position:10000px 0;}
}

.stars, .twinkling, .clouds {
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
  width:100%;
  height:100%;
  display:block;
}

.stars {
  background:#000 url(http://www.script-tutorials.com/demos/360/images/stars.png) repeat top center;
  z-index:-6;
}

.twinkling{
  background:transparent url(http://www.script-tutorials.com/demos/360/images/twinkling.png) repeat top center;
  z-index:-5;

  -moz-animation:move-twink-back 200s linear infinite;
  -ms-animation:move-twink-back 200s linear infinite;
  -o-animation:move-twink-back 200s linear infinite;
  -webkit-animation:move-twink-back 200s linear infinite;
  animation:move-twink-back 200s linear infinite;
}

.clouds{
    background:transparent url(http://www.script-tutorials.com/demos/360/images/clouds3.png) repeat top center;
    z-index:-3;

  -moz-animation:move-clouds-back 200s linear infinite;
  -ms-animation:move-clouds-back 200s linear infinite;
  -o-animation:move-clouds-back 200s linear infinite;
  -webkit-animation:move-clouds-back 200s linear infinite;
  animation:move-clouds-back 200s linear infinite;
}
</style>-->
</head>

<body id="body" class="dark-mode">
<button id="butt" onclick="toggleusr();" > Zuletzt gesehene User anzeigen/verstecken!</button>
<div id="lately" style="display:none;">
<?php
if (!empty($_SESSION["checkerb"])){
                $checker = $_SESSION["checkerb"];}else{
                    $_SESSION["checkerb"] = "false";
                    $checker = "false";
                }
                
                $doc = file_get_contents("lately.txt");
$file = file("lately.txt",FILE_IGNORE_NEW_LINES);
$key = array_search("Uhr",$file);

if($checker == "true"){
    if (!empty($_SESSION["user"])){
$user = $_SESSION["user"];
$lately = file("files/lately.txt",FILE_IGNORE_NEW_LINES);
$content = file_get_contents("files/lately.txt");
if(!array_search($user , $lately)){
$late = fopen("files/lately.txt","w");
$timestamp = time();
$o = date("H",$timestamp);
$hour = date(":i:s ",$timestamp);
$o++;
$text = "<br>Es wurde  um \r\n$o$hour\r\nUhr\r\n Zuletzt der Benutzer: \r\n$user\r\n gesichtet <br>";
fwrite($late, $text);
fwrite($late, $content);
fclose($late);}
}
$_SESSION["checkerb"] = "false";
}else{
    $_SESSION["checkerb"] = "true";
}




$content = file_get_contents("files/lately.txt");
echo $content;

?>
</div>
<?php function write() {
    $chat = file_get_contents("files/chat.chat");return $chat;
}?>
    <div style="width:100%; text-align:center;  top:100px; z-index:-1; margin:auto;">
        <h1>chat-Anmeldung</h1>
        <div>
        <div id="wrap" class="resizable">
        <div id="chat">
<?php

$doc = file_get_contents("files/chat.chat");
if(!empty($_POST["user"]) && !empty($_POST["password"])){
    $user = $_POST["user"];
    $password = $_POST["password"];

}else{
    if(!empty($_SESSION["user"]) && !empty($_SESSION["password"])){
        $user = $_SESSION["user"];
        $password = $_SESSION["password"];

    }else{
        $user = "";
        $password = "";
    }
}
//fopen("benutzer/benutzer.txt","w");
$lines = file("files/users.txt",FILE_IGNORE_NEW_LINES);

$key = array_search($user,$lines);

if ($key != false){
    if ($lines[$key+1]== "pw"){
if ($lines[$key+2]==$password){
echo write();
}}
}else {if ($key == false){
    echo "<h1 style='margin:auto;width:200px; margin-top:30px'>Bitte Anmelden!!!</h1>";
}}
?>

        </div>
<lable style="
    left: calc(50% - 500px);
    width: 100px;
    position: relative;
top:5px;
"><input type="color" id="colorb" >Irgedeine Farbe</lable>
    </div><div id="reloads">
        <button onclick="reload()" id="reload" title="reload">&#x1f5d8;</button>
        <input type="checkbox" id="automl" class="automl" onchange="check();"><label class="automl">Automatisch laden</label></div>
        <form method="POST" action="redirect.php" name="input" id="input" enctype="multipart/form-data" class="resizable">
        <textarea name="chat" id="space" placeholder="hier Nachricht eingeben!"></textarea>
        <input type="color" name="color" id="color">
        <button type="button" onclick="convert();" id="btnsubmit">Senden</button>
        <input type="file" id="file" name="file" placeholder="Dateien Senden">
        </form></div>
    <div class="resizable" id="anmelden">
<a href="login.php"><button>Zur Anmeldeseite!</button></a>
            <div id="console">
            <?php
$count = file_get_contents("files/count.count");

        $liste = file_get_contents("files/chat.chat");




        if(!empty($_POST["user"]) && !empty($_POST["password"])){
                $user = $_POST["user"];
                $password = $_POST["password"];

        }else{
                if(!empty($_SESSION["user"]) && !empty($_SESSION["password"])){
                    $user = $_SESSION["user"];
                    $password = $_SESSION["password"];

                }else{
                    $user = "";
                    $password = "";

                }
            }
            //fopen("benutzer/benutzer.txt","w");
			$lines = file("files/users.txt",FILE_IGNORE_NEW_LINES);

            $key = array_search($user,$lines);

            if ($key != false){

                if ($lines[$key+2]==$password){
                    if ($lines[$key+1]== "pw"){
$lvl = $lines[$key+3];
                echo "<b>----Angemeldet als Lvl: $lvl : $user!----</b>";
                        if(empty($_SESSION["message"]) && empty($_SESSION["newmessage"])){
                if(!empty($_SESSION["chat"])&& isset($_SESSION["chat"])){

                $color = $_SESSION["color"];
                $text = $_SESSION["chat"];

                if (!empty($_SESSION["checker"])){
                $checker = $_SESSION["checker"];}
                else{$checker="false";};
                $fp = fopen("files/chat.chat","w");
                str_replace("<br&nbsp;/>","\r\n",$text);
                fwrite($fp,$liste);
                if(strstr($text, " !list")){
                    if($checker=="true"){
                    $length = count(array_diff(scandir("upload/",SCANDIR_SORT_DESCENDING), array('..', '.')));
                    $arr = array_diff(scandir("upload/",SCANDIR_SORT_DESCENDING), array('..', '.'));
                    echo "<br/><br/>---------------------------LISTE ALLER Dateien:----------------------------<br/>";
                    echo  "_________________Es gibt insgesamt $length  Dateien:_____________________________<br/>";
                    $old = $length;
                    while ($length > 0){
                        $true = $old-($length-1);
                        $path = "upload/".$arr[$true-1];
                        $name = $arr[$true -1];
                        echo "<a href = '".$path."'> $true. Datei: $name </a> <span style='color:red;'>Download: <a href = '".$path."'download> &#x2B73;</a></span><br/>";
                        $length--;

                    }
                    $_SESSION["chat"] = "";
                    $_SESSION["checker"] = "false";
                    }
                        else{
                            $_SESSION["checker"] = "true";
                        }
                }else {
                    if (strstr($text, " !Benutzer")|| strstr($text, " !users")|| strstr($text, " !benutzer")|| strstr($text, " !Users") || strstr($text, " !user")|| strstr($text, " !User")){
                        if($checker=="true"){
                        echo "<br/><br/>---------------------------LISTE ALLER Benutzer:----------------------------<br/>";
                        $lines = file("files/users.txt",FILE_IGNORE_NEW_LINES);
                        $keys = array_keys($lines, "pw");
                        $coun = count($keys);
                        $part = "";
                        $menge = "0";
                        while($coun > 0){
                            $is = $keys[$coun -1];
                            $levl = $lines[$is+2];
                            if($lines[$is+2]== 1 ||$lines[$is + 2]== 2 ||$lines[$is + 2]== 3 ||$lines[$is + 2]== 4 ||$lines[$is + 2]== 5 ||$lines[$is + 2]== 6 ||$lines[$is + 2]== 7 ||$lines[$is + 2]== 8 ||$lines[$is + 2]== 9){  
                                $menge = $menge + 1;
                                switch ($levl){
                                    case 1:  $rank = "<span style='color:rgb(154,95,69);'>Degradierter</span>"; break;
                                    case 2:  $rank = "<span style='color:rgb(111,111,111);'>Verbrecher</span>"; break;
                                    case 3:  $rank = "Normalo"; break;
                                    case 4:  $rank = "<span style='color:rgb(95,162,62);'>/Mitglied/</span>"; break;
                                    case 5:  $rank = "<span style='color:rgb(168,55,95);'>/&Auml;ltester/</span>"; break;
                                    case 6:  $rank = "<span style='color:rgb(16,55,95);'>/Premium/</span>"; break;
                                    case 7:  $rank = "<span style='color:rgb(226,107,29);'>/Moderator/</span>"; break;
                                    case 8:  $rank = "<span style='color:rgb(208,150,15);'>/ADMIN/</span>"; break;
                                    case 9:  $rank = "<span style='color:rgb(168,0,4);'>/OWNER/</span>"; break;
                                    default: $rank = "Fehler"; break;
                                }
                                $part =  "--->                ".$coun.". Benutzer :        ".$lines[$is - 1]."<br/>          Rang: ".$rank."<br/>    Level: ".$levl."<br/><br/>".$part;

                            }
                            $coun--;
                        }
                        echo "------Es gibt insgesamt $menge User:    ------ <br/>".$part;
                        $_SESSION["chat"] = "";
                        $_SESSION["checker"] = "false";}
                        else{
                            $_SESSION["checker"] = "true";
                        }}else {
                    if (strstr($text, " !strike")){
                        // !strike Dennis 1
                        // ["!strike","Dennis","1"]
                        //Funktion für strikes!!!:
                        //jeder Durchlauf:
                        //!strike admin 1
                        if($lvl > 6){
                        $array = explode(" " ,$text);
                        if (empty($array[2])){
                            $array[2] = 1;
                        }
                        $keys = array_keys($array, "!strike");
                        $countb = count($keys);
                        //erster Durchlauf:
                        
                        if ($checker == "false"){
                        while($countb > 0){
                            $lines = file("files/strikes.txt",FILE_IGNORE_NEW_LINES);
                            if(empty($lines)){
                                $lines = array();
                            }
                            $file = file_get_contents("files/strikes.txt");
                            $keyb = array_search($array[$keys[$countb-1]+1] , $lines);
                            $cunt = "";
                            $userb = $array[$keys[$countb-1] +1];
                            $users = file("files/users.txt",FILE_IGNORE_NEW_LINES);
                            $old = file_get_contents("files/chat.chat");
                            echo "userb: $userb ;";
                            if(!empty($userb)){
                                $options = array(
                            'options' => array('min_range' => 0)
                            );

$str = (int) $array[$keys[$countb-1] + 2];
$true ="false";
if ($str == 1||$str == 2||$str == 3||$str == 4||$str == 5||$str == 6||$str == 7||$str == 8||$str == 9||$str == 10||$str == 11||$str == 12){
    echo "das ist hier:";
    $true= "true";}
                                if($true == "true"){
                                 // you're good
                                 echo "success";
                                 $cunt = (int) $array[$keys[$countb-1] + 2];
                                }else{
                                    $cunt = 1;

                                }

                            if ($keyb){
                                    
                                    $all = (int) $lines[$keyb + 1] + $cunt;
                                    $lines[$keyb + 1] = $all;
                                    $combined = implode("\r\n",$lines);
                                    $wr = fopen("files/strikes.txt","w");
                                    fwrite($wr , $combined);
                                    fclose($wr);
                                    $old = file_get_contents("files/chat.chat");
                                    
                                    $count++;
                            $qr = fopen("files/count.count","w");
                            fwrite($qr,$count);
                            fclose($qr);
$output = "\r\n<div dergeheimestartcodeist12238433845".$count.">\r\n</div><form method='POST' action='admin/delete.php'><input type='text' style='display:none' name='start' class='start' value='dergeheimestartcodeist12238433845".$count."'><input type='text' name='end' class='end' style='display:none' value='dergeheimeendcodeist12238433845".$count."'><button style='display:none' class='delete'type='submit'name='button'>'löschen'</button></form>";
                                    $output = $output."<div class='Server'><b>---------------<span style='color:rgb(168,0,4);'>///Server///:</span>---------------</b><br />";
                                    $output = $output."---- Der User ".$userb." hat ".$cunt." Strafpunkte für ein Vergehen bekommen ---- <br />";
                                    $output = $output."----- $userb hat jetzt $all Strafpunkte für Bestrafungen !punish oder !punishments eingeben!! ----- <br/>";
                                    $output = $output."----- Aktion gestartet durch ".$user." Power Level: ".$lvl." ----- <br/>";
                                    $outputb = "";
                                    $uskey = "";
                                    $users = file("files/users.txt",FILE_IGNORE_NEW_LINES);
                                    $uskey = array_search($array[$keys[$countb-1]+1] , $users);
                                    if($uskey){
                                    if($lines[$keyb + 1] > 5){
                                    $users = file("files/users.txt",FILE_IGNORE_NEW_LINES);
                                    
                                    if($users[$uskey + 3] != 2){
                                    $users[$uskey + 3] = 2;
                                    $outputb ="<b>-------<span style='color:rgb(168,0,4);'> Der User ".$userb." hat als Bestrafung den Namen Verbrecher bekommen!!!</span> ------- </b><br/>";}
                                    else{
                                        $outputb ="<b>-------<span style='color:rgb(168,0,4);'> Der User ".$userb." Muss dringend aufpassen, was er macht!!!</span> ------- </b><br/>";
                                    }
                                    }
                                    if($lines[$keyb + 1] > 8){
                                    $users = file("files/users.txt",FILE_IGNORE_NEW_LINES);
                                    $uskey = array_search($array[$keys[$countb-1]+1] , $users);
                                    if ($users[$uskey + 3] != 1){
                                    $users[$uskey + 3] = 1;
                                    $newpass = random_int( 1000000000 , 9999999999 );
                                    $users[$uskey + 2] = $newpass;
                                    $outputb =$outputb."<b>-------<span style='color:rgb(168,0,4);'> Der User ".$userb." hat als Bestrafung einen Bann bekommen!!! </span>------- </b><br/>";}
                                    else{
                                    $outputb =$outputb."<b>-------<span style='color:rgb(168,0,4);'> Der User ".$userb." Ist trotz dass er gebannt ist nocheinmal gebannt worden !!!... Warte was !?!?!? </span>------- </b><br/>";}
                                        
                                    }
                                    $combi = implode("\r\n",$users);
                                    $usr = fopen("files/users.txt","w");
                                    fwrite($usr , $combi);
                                    fclose($usr);
                                    $br = fopen("files/chat.chat","w");
                                    $output = $output.$outputb."<b>----------------------------------------------------------------------</b><br/></div>";
                                    $output = $output."\r\n<div dergeheimeendcodeist12238433845".$count."></div>\r\n";
                                    
                                    fwrite($br,$old."<br>".$output);
                                    fclose($br);
                                    }else{echo "Fehler!";}
                                    
                                    }else{

                                    $lines[0] = $userb;
                                    $lines[1] = $cunt;
                                    $all = $cunt;
                                    $combined = implode("\r\n",$lines);
                                    $wr = fopen("files/strikes.txt","w");
                                    fwrite($wr , $file."\r\n".$combined."\r\n");
                                    fclose($wr);

                                    $old = file_get_contents("files/chat.chat");
                                    
                                    $count++;
                            $qr = fopen("files/count.count","w");
                            fwrite($qr,$count);
                            fclose($qr);
$output = "\r\n<div dergeheimestartcodeist12238433845".$count.">\r\n</div><form method='POST' action='admin/delete.php'><input type='text' style='display:none' name='start' class='start' value='dergeheimestartcodeist12238433845".$count."'><input type='text' name='end' class='end' style='display:none' value='dergeheimeendcodeist12238433845".$count."'><button style='display:none' class='delete'type='submit'name='button'>'löschen'</button></form>";
                                    $output = $output."<div class='Server'><b>---------------<span style='color:rgb(168,0,4);'>///Server///:</span>---------------</b><br />";
                                    $output = $output."---- Der User ".$userb." hat ".$cunt." Strafpunkte für ein Vergehen bekommen ---- <br />";

                                    $output = $output."----- $userb hat jetzt $all Strafpunkte für Bestrafungen !punish oder !punishments eingeben!! ----- <br/>";
                                    $output = $output."----- Aktion gestartet durch ".$user." Power Level: ".$lvl." ----- <br/>";
                                    $outputb = "";
                                    $uskey ="";
                                    $users = file("files/users.txt",FILE_IGNORE_NEW_LINES);
                                    $uskey = array_search($array[$keys[$countb-1]+1] , $users);
                                    if($lines[$keyb + 1] > 5){
                                    
                                   $uskey = array_search($array[$keys[$countb-1]+1] , $users);
                                    if($users[$uskey + 3] != 2){
                                    $users[$uskey + 3] = 2;
                                    $outputb ="<b>-------<span style='color:rgb(168,0,4);'> Der User ".$userb." hat als Bestrafung den Namen Verbrecher bekommen!!!</span> ------- </b><br/>";}
                                    else{
                                        $outputb ="<b>-------<span style='color:rgb(168,0,4);'> Der User ".$userb." Muss dringend aufpassen, was er macht!!!</span> ------- </b><br/>";
                                    
                                    }
                                    }
                                    
                                    if($uskey){
                                    if($lines[$keyb + 1] > 8){
                                    $users = file("files/users.txt",FILE_IGNORE_NEW_LINES);
                                    $uskey = array_search($array[$keys[$countb-1]+1] , $users);
                                    $users[$uskey + 3] = 2;
                                    $newpass = random_int( 1000000000 , 9999999999 );
                                    $users[$uskey + 2] = $newpass;
                                    $outputb =$outputb."<b>-------<span style='color:rgb(168,0,4);'> Der User ".$userb." hat als Bestrafung einen Bann bekommen!!!</span> ------- </b><br/>";
                                    }
                                    $combi = implode("\r\n",$users);
                                    $usr = fopen("files/users.txt","w");
                                    fwrite($usr , $combi);
                                    fclose($usr);
                                    $output = $output.$outputb."<b>----------------------------------------------------------------------</b><br/></div>";
                                    $output = $output."\r\n<div dergeheimeendcodeist12238433845".$count."></div>\r\n";
                                    
                                    $br = fopen("files/chat.chat","w");
                                    fwrite($br,$old."\r\n".$output);
                                    fclose($br);
                                    
                                    }else{
                                    }
                            }
                            

                        }$countb--;}
                                    
                                    
                            
                        
                        }}
                        else{
                            if($checker=="true"){
                                echo "<b><b> Hallo $user Du kannst leider nur mit Powerlevel 7 oder höher hier rein !!!</b></b>";
                        }}
                        
                        
                        // zweiter Durchlauf:
                        if($checker=="true"){

                        $_SESSION["chat"] = "";
                        $_SESSION["checker"] = "false";
                        }
                        else{
                            $_SESSION["checker"] = "true";
                        }
                    }else {
                    if (strstr($text, " !punish")|| strstr($text, " !punishment")){
                        if($checker=="true"){
                        echo "<br/><br/>---------------------------LISTE ALLER Strafen:----------------------------<br/>";
                        echo "      Ab 5 Strafpunkten bekommt man den Namen 'Verbrecher' und wird somit bloßgestellt.<br> jedoch ab 9 Leveln wirst du degradiert, und wirst gebannt also sei achtsam!!!<br> Bei einem bann mit einem Admin                                    reden!, vlt. vergibt er nocheinmal";
                      
                        $_SESSION["chat"] = "";
                        $_SESSION["checker"] = "false";
                        }
                        else{
                            $_SESSION["checker"] = "true";
                        }
                    }
                    else {
                    if (strstr($text, " !rules")|| strstr($text, " !regeln")|| strstr($text, " !Regeln")|| strstr($text, " !Rules")|| strstr($text, " !Vertrag")|| strstr($text, " !vertrag")){
                        if($checker=="true"){
                        echo "<br/><br/>---------------------------Regeln:----------------------------<br/>";
                        echo "   1.      ----->        Kein Spam !!!!!  <br/>";
                        echo "   2.      ----->        Keine Beleidigungen<br/>";
                        echo "   3.      ----->        Keine unangebrachte Themen!!!<br/>";
                        echo "   4.      ----->        Keine nicht jugendfreie Medien!!<br/>";
                        echo "   5.      ----->        Spass haben und Wissen teilen<br/>";
                        echo "   6.      ----->        nicht in den Chat schreien!! Keine übergroßen Texte und keinen Nerven!!!<br/>";
                        echo "          Für Befehle und insider gib !help ein !!!<br/>";
                        echo "   ----------------- bei Verstoß werden die Mods/Admins über eine gute Strafe nachdenken( evtl. vlt sogar einen Punkt oder mehrere!!!)-----------------<br/>";
                        $_SESSION["chat"] = "";
                        $_SESSION["checker"] = "false";
                        }
                        else{
                            $_SESSION["checker"] = "true";
                        }
                    }
                    else {
                    if (strstr($text, " !help")|| strstr($text, " !hilfe")){
                        if($checker=="true"){
                        echo "<br/><br/>---------------------------LISTE ALLER COMMANDS:----------------------------<br/>";
                        echo "      1.: !list               || gibt eine Liste aller globalen Dateien aus!<br/>";
                        echo "      2.: !help / !hilfe      || zeigt diesen Text an!<br/>";
                        echo "      3.: !ranks              || zeigt alle Ränge an! (sind sowieso nur Schmuck)<br/>";
                        echo "      4.: !R/rules / !R/regeln              || zeigt die Regeln an! <br/>";
                        echo "      5.: !B/benutzer / !U/users / !U/user  || Zeigt alle Benutzer und ihre Ränge an! <br/>";
                        echo "      6.: !punish / !punishment             || Zeigt alle Bestrafungen an! <br/>";
                        echo "      7.: !strike <\benutzer\> <\Anzahl\>           || Zum Bestrafen von usern (Admin/Mod only)! <br/><br/><br/><br/>";
                        echo "      ---------- Chat- Ping- Commands:  -------------- <br/>";
                        echo "      1.: @Benutzer               || einen Bestimmten user anpingen <br/>";
                        echo "      2.: @all/All/alle/Alle/Chat/chat/everyone/Everyone/A               || alle anpingen <br/>";
                        echo "      3.: @Admin/Mod/Moderator .....              || eine bestimmte Gruppe anpingen <br/>";



                        $_SESSION["chat"] = "";
                        $_SESSION["checker"] = "false";
                        }
                        else{
                            $_SESSION["checker"] = "true";
                        }
                    }else{

                        if (strstr($text, " !ranks")){
                            if($checker=="true"){
                            echo "<br/><br/>---------------------------LISTE ALLER Ranks:----------------------------<br/>";
                        echo "      1: <span style='color:rgb(154,95,69);'>Degradierter</span><br/>";
                        echo "      2: <span style='color:rgb(111,111,111);'>Verbrecher</span><br/>";
                        echo "      3: Normalo<br/>";
                        echo "      4: <span style='color:rgb(95,162,62);'>Mitglied</span><br/>";
                        echo "      5: <span style='color:rgb(168,55,95);'>Ältester</span><br/>";
                        echo "      6: <span style='color:rgb(16,55,95);'>Premium</span><br/>";
                        echo "      7: <span style='color:rgb(226,107,29);'>Moderator</span><br/>";
                        echo "      8: <span style='color:rgb(208,150,15);'>Admin</span><br/>";
                        echo "      9: <span style='color:rgb(168,0,4);'>Owner</span><br/>";
                        $_SESSION["chat"] = "";
                        $_SESSION["checker"] = "false";
                        }else{
                            $_SESSION["checker"] = "true";
                        }

                        }else{
                            $count++;
                            $wr = fopen("files/count.count","w");
                            fwrite($wr,$count);
                            fclose($wr);
$pastext = "\r\n<div dergeheimestartcodeist12238433845".$count.">\r\n</div><form method='POST' action='admin/delete.php'><input type='text' style='display:none' name='start' class='start' value='dergeheimestartcodeist12238433845".$count."'><input type='text' name='end' class='end' style='display:none' value='dergeheimeendcodeist12238433845".$count."'><button style='display:none' class='delete'type='submit'name='button'>'löschen'</button></form>";
$timestamp = time();
$hour = date("H:i:s ",$timestamp);
                if ($lvl == 9){
                $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(168,0,4);">/OWNER/</span>:]---></div><div class="rand"><span style="color:'.$color.';">'.$text.'</span></div></p><span class="time">'.$hour.'</span></div>';}
                if ($lvl == 8){
                    $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(208,150,15);">/ADMIN/</span>:]---></div><div class="rand"><span style="color:'.$color.';">'.$text.'</span></div></p><span class="time">'.$hour.'</span></div>';}
                    if ($lvl == 7){
                        $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(226,107,29);">/Moderator/</span>:]---></div><div class="rand"><span style="color:'.$color.';">'.$text.'</span></div></p><span class="time">'.$hour.'</span></div>';}
                        if ($lvl == 6){
                            $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(16,55,95);">/Premium/</span>:]---></div><div class="rand"><span style="color:'.$color.';">'.$text.'</span></div></p><span class="time">'.$hour.'</span></div>';}
                            if ($lvl == 5){
                                $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(168,55,95);">/&Auml;ltester/</span>:]---></div><div class="rand"><span style="color:'.$color.';">'.$text.'</span></div></p><span class="time">'.$hour.'</span></div>';}
                                if ($lvl == 4){
                                    $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(95,162,62);">/Mitglied/</span>:]---></div><div class="rand"><span style="color:'.$color.';">'.$text.'</span></div></p><span class="time">'.$hour.'</span></div>';}
                                    if ($lvl == 3){
                                        $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span>/Normalo/</span>:]---></div><div class="rand"><span style="color:'.$color.';">'.$text.'</span></div></p><span class="time">'.$hour.'</span></div>';}
                                        if ($lvl == 2){
                                            $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(111,111,111);">/Verbrecher/</span>:]---></div><div class="rand"><span style="color:'.$color.';">'.$text.'</span></div></p><span class="time">'.$hour.'</span></div>';}
                                            if ($lvl == 1){
                                                $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(154,95,69);">/Degradierter/</span>:]---></div><div class="rand"><div class="rand"><span style="color:'.$color.';">'.$text.'</span></div></p><span class="time">'.$hour.'</span></div>';}

                                                $pastext = $pastext."\r\n<div dergeheimeendcodeist12238433845".$count."></div>";
                $_SESSION["chat"] = "";

                fwrite($fp,$pastext."\r\n");
                fclose($fp);}
            }
        }}}}
            }}}else{
                $filename = $_SESSION["filename"];
                $filesize= $_SESSION["filesize"];
                $filetype = $_SESSION["filetype"];
                $filesource = $_SESSION["filesource"];
                $fileerror = $_SESSION["fileerror"];
                $message = $_SESSION["message"];
                $newmessage = $_SESSION["newmessage"];
                $fp = fopen("files/chat.chat","w");
                fwrite($fp,$liste);
                $count = file_get_contents("files/count.count");
                            $count++;
                            $wr = fopen("files/count.count","w");
                            fwrite($wr,$count);
                            fclose($wr);
                            $type = $filetype;
                            $contains = strstr($type, 'image');
if (strstr($type,"text")|| strstr($filename,"php")|| $contains){
    $message = $message;
}else {
$message = $newmessage;
}
$timestamp = time();
$hour = date("H:i:s ",$timestamp);
$pastext = "\r\n<div dergeheimestartcodeist12238433845".$count.">\r\n</div><form method='POST' action='admin/delete.php'><input type='text' style='display:none' name='start' class='start' value='dergeheimestartcodeist12238433845".$count."'><input type='text' name='end' class='end' style='display:none' value='dergeheimeendcodeist12238433845".$count."'><button style='display:none' class='delete'type='submit'name='button'>'löschen'</button></form>";
                    if ($lvl == 9){
                        $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(168,0,4);">/OWNER/</span>:]---></div><div class="rand"><span>'.$message.'</span></div></p><span class="time">'.$hour.'</span></div>';
                        }
                        if ($lvl == 8){
                            $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(208,150,15);">/ADMIN/</span>:]---></div><div class="rand"><span>'.$message.'</span></div><span class="time">'.$hour.'</span></div>';}
                            if ($lvl == 7){
                                $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(226,107,29);">/Moderator/</span>:]---></div><div class="rand"><span>'.$message.'</span></div><span class="time">'.$hour.'</span></div>';}
                                if ($lvl == 6){
                                    $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(16,55,95);">/Premium/</span>:]---></div><div class="rand"><span>'.$message.'</span></div><span class="time">'.$hour.'</span></div>';}
                                    if ($lvl == 5){
                                        $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(168,55,95);">/&Auml;ltester/</span>:]---></div><div class="rand"><span>'.$message.'</span></div><span class="time">'.$hour.'</span></div>';}
                                        if ($lvl == 4){
                                            $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(95,162,62);">/Mitglied/</span>:]---></div><div class="rand"><span>'.$message.'</span></div><span class="time">'.$hour.'</span></div>';}
                                            if ($lvl == 3){
                                                $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span>/Normalo/</span>:]---></div><div class="rand"><span>'.$message.'</span></div></div>';}
                                                if ($lvl == 2){
                                                    $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(111,111,111);">/Verbrecher/</span>:]---></div><div class="rand"><span>'.$message.'</span></div><span class="time">'.$hour.'</span></div>';}
                                                    if ($lvl == 1){
                                                        $pastext = $pastext.'<div class="sourr"><div class="names"><p>['.$user.' <span style="color:rgb(154,95,69);">/Degradierter/</span>:]---></div><div class="rand"><span>'.$message.'</span></div><span class="time">'.$hour.'</span></div>';}
$pastext = $pastext."\r\n<div dergeheimeendcodeist12238433845".$count."></div>";
                    fwrite($fp,$pastext."\r\n");
                    fclose($fp);
                    $_SESSION["filename"] = "";
                    $_SESSION["filesize"] = "";
                    $_SESSION["filetype"] = "";
                    $_SESSION["filesource"] = "";
                    $_SESSION["fileerror"] = "";
                    $_SESSION["message"] = "";
                    $_SESSION["newmessage"] = "";
                    $_SESSION["File"] = "";
            }
                $_SESSION["user"] = $user;
                $_SESSION["password"] = $password;

        }else{echo"<h2 style='color:red;'>FEHLER!</h2>";}
            }else{
                $_SESSION["user"] = "";
                $_SESSION["password"] = "";
            echo "<h3>Das Passwort oder der Benutzername war falsch!!!</h3>";}
        }else {if ($key == false){


                if(!empty($user)){
                    $_SESSION["user"] = "";
                    $_SESSION["password"] = "";
                echo "<h3>Das Passwort oder der Benutzername war falsch!!!</h3>";}
            }else{
                echo "<h1 style='margin:auto;width:200px; margin-top:30px'>Ein Fehler ist aufgetreten!</h1>";
            }}
            ?></div>
    </div></div>
    <footer style="float: right; font-size: 0.5em; color:#4b4b70d7"><a href="../../../Liste.html">Zurück zur Hauptnavigatinsleiste</a></footer>
    
    
    
    
    
    
    <figure>
  <label for="schiebe">Anzahl der Bälle</label>
  <input id="schiebe" type="range" min="0" max="300" value="100"/>
</figure>




    <script>

/*    function splitarr( arr, splitter){
        if (typeof splitter === 'string' || splitter instanceof String){}
        else JSON.stringify(splitter);
        var length = arr.length;
        var adder = 0;
        var old = length;
        var spilit = 0;
        var blength;
        var bold;
        var back = arr;
        var sub;
        while (length > 0){
            sub = back[old - (length - 1)];
            if (typeof sub === 'string' || sub instanceof String){}
            else JSON.stringify(sub);
            spilit = sub.split(splitter);
            blength = split.length;
            bold = blength;
            while (blength > 0){
            arr[old - (length - 1) + adder] = spilit[bold - (blength - 1)];
            blength--;
            }
            length--;
        }
        return arr;
    }*/
document.getElementById("color").addEventListener("change", function(){
    document.getElementById("space").style.color = document.getElementById("color").value;
})
var element = document.getElementById("chat");
element.scrollTop = element.scrollHeight;
function collectionHas(a, b) { //helper function (see below)
    for(var i = 0, len = a.length; i < len; i ++) {
        if(a[i] == b) return true;
    }
    return false;
}
//setTimeout(function(){splitarr([213123,123,123,1,23,123,12,312323453,56,234,63,44],3)},3)
function findParentBySelector(elm, selector) {
    var all = document.querySelectorAll(selector);
    var cur = elm.parentNode;
    while(cur && !collectionHas(all, cur)) { //keep going up until you find a match
        cur = cur.parentNode; //go up
    }
    return cur; //will return null if not found
}
function convert(){
    
    var messagetoSend = document.getElementById('space').value;
    var isthat = document.getElementById("file").files.length == 0
    if(messagetoSend!=""||!isthat){
        messagetoSend = messagetoSend.replace(/<\s*br[^>]*>|\n/gi," <br>");
        document.getElementById("space").value = messagetoSend;
        var messagetoSend = document.getElementById('space').value;
    var arr = messagetoSend.split(/ /);

    var lengt = arr.length;
    var length = arr.length;
    var arrb = arr;
    while (length > 0){
    arrb[length-1]  = " " + arr[length - 1];
    length--;
    }
    var randum = Math.round(Math.random()*100000000000);

    var gotset = 0;
    var lego = " <a id='" + randum + "'></a>";
    while (lengt > 0){
        if (arrb[lengt-1].search(" @") != -1){
            var ran = Math.round(Math.random()*100000000000);
            var str = arr[lengt-1];
            var name = str.replace(" @","");
            if(name== "everyone"||name== "all"||name== "All"||name== "A"|| name == "alle" || name== "Chat"|| name == "Everyone" ||name== "chat"|| name == "Alle"){
gotset = 1;
                lego = " <a id='" + ran + "'><u>@"+ name + "<\/u><\/a><script> document.getElementById('" + ran + "').setAttribute('style','color:darkblue;'); setTimeout(function(){var ele = findParentBySelector(document.getElementById(" + ran + "),'.sourr'); ele.setAttribute('style','background-color:#4a6aec !important;');},1000);<\/script>" + " " + lego;
            }else{
                if (name=="Admin"|| name=="admin"|| name == "Owner" || name == "owner" || name == "9" || name == "8"){
gotset = 1;
lego = " <a id='" + ran + "'><u>@"+ name + "<\/u><\/a><script> document.getElementById('" + ran + "').setAttribute('style','color:green;'); setTimeout(function(){var inh = document.getElementById('console').innerHTML;var index= inh.indexOf('Angemeldet als Lvl: 9') + inh.indexOf('Angemeldet als Lvl: 8'); if(index> -1){ var ele = findParentBySelector(document.getElementById(" + ran + "),'.sourr'); ele.setAttribute('style','background-color:rgb(26,107,29) !important;');}},1000);<\/script>" + " " + lego;}
else{
                if (name=="mod"|| name=="Mod"|| name == "moderator" || name == "Moderator" || name == "7"){
gotset = 1;
lego = " <a id='" + ran + "'><u>@"+ name + "<\/u><\/a><script> document.getElementById('" + ran + "').setAttribute('style','color:green;'); setTimeout(function(){var inh = document.getElementById('console').innerHTML;var index= inh.indexOf('Angemeldet als Lvl: 7'); if(index> -1){ var ele = findParentBySelector(document.getElementById(" + ran + "),'.sourr'); ele.setAttribute('style','background-color:rgb(26,107,29) !important;');}},1000);<\/script>" + " " + lego;}
else{
                if (name=="Premium"|| name=="promo"|| name == "Promo" || name == "premium" || name == "6"){
gotset = 1;
lego = " <a id='" + ran + "'><u>@"+ name + "<\/u><\/a><script> document.getElementById('" + ran + "').setAttribute('style','color:green;'); setTimeout(function(){var inh = document.getElementById('console').innerHTML;var index= inh.indexOf('Angemeldet als Lvl: 6'); if(index> -1){ var ele = findParentBySelector(document.getElementById(" + ran + "),'.sourr'); ele.setAttribute('style','background-color:rgb(26,107,29) !important;');}},1000);<\/script>" + " " + lego;}

else{
                if (name=="Ältester"|| name=="ältester"|| name == "old" || name == "Old" || name == "5"){
gotset = 1;
lego = " <a id='" + ran + "'><u>@"+ name + "<\/u><\/a><script> document.getElementById('" + ran + "').setAttribute('style','color:green;'); setTimeout(function(){var inh = document.getElementById('console').innerHTML;var index= inh.indexOf('Angemeldet als Lvl: 5'); if(index> -1){ var ele = findParentBySelector(document.getElementById(" + ran + "),'.sourr'); ele.setAttribute('style','background-color:rgb(26,107,29) !important;');}},1000);<\/script>" + " " + lego;}

else{
                if (name=="Mitglied"|| name=="Member"|| name == "member" || name == "mitglied" || name == "4"){
gotset = 1;
lego = " <a id='" + ran + "'><u>@"+ name + "<\/u><\/a><script> document.getElementById('" + ran + "').setAttribute('style','color:green;'); setTimeout(function(){var inh = document.getElementById('console').innerHTML;var index= inh.indexOf('Angemeldet als Lvl: 4'); if(index> -1){ var ele = findParentBySelector(document.getElementById(" + ran + "),'.sourr'); ele.setAttribute('style','background-color:rgb(26,107,29) !important;');}},1000);<\/script>" + " " + lego;}
else{
                if (name=="norm"|| name=="Normalo"|| name == "normalo" || name == "Norm" || name == "3"){
gotset = 1;
lego = " <a id='" + ran + "'><u>@"+ name + "<\/u><\/a><script> document.getElementById('" + ran + "').setAttribute('style','color:green;'); setTimeout(function(){var inh = document.getElementById('console').innerHTML;var index= inh.indexOf('Angemeldet als Lvl: 3'); if(index> -1){ var ele = findParentBySelector(document.getElementById(" + ran + "),'.sourr'); ele.setAttribute('style','background-color:rgb(26,107,29) !important;');}},1000);<\/script>" + " " + lego;}
else{
                if (name=="verbrecher"|| name=="prison"|| name == "Prison" || name == "Verbrecher" || name == "2"){
gotset = 1;
lego = " <a id='" + ran + "'><u>@"+ name + "<\/u><\/a><script> document.getElementById('" + ran + "').setAttribute('style','color:green;'); setTimeout(function(){var inh = document.getElementById('console').innerHTML;var index= inh.indexOf('Angemeldet als Lvl: 2'); if(index> -1){ var ele = findParentBySelector(document.getElementById(" + ran + "),'.sourr'); ele.setAttribute('style','background-color:rgb(26,107,29) !important;');}},1000);<\/script>" + " " + lego;}
else{
                if (name=="Degr"|| name=="degradierter"|| name == "degr" || name == "Degradierter" || name == "1"){
                    gotset = 1;
lego = " <a id='" + ran + "'><u>@"+ name + "<\/u><\/a><script> document.getElementById('" + ran + "').setAttribute('style','color:green;'); setTimeout(function(){var inh = document.getElementById('console').innerHTML;var index= inh.indexOf('Angemeldet als Lvl: 1'); if(index> -1){ var ele = findParentBySelector(document.getElementById(" + ran + "),'.sourr'); ele.setAttribute('style','background-color:rgb(26,107,29) !important;');}},1000);<\/script>" + " " + lego;}
else{
gotset = 1;
lego = " <a id='" + ran + "'><u>@"+ name + "<\/u><\/a><script> document.getElementById('" + ran + "').setAttribute('style','color:green;'); setTimeout(function(){var inh = document.getElementById('console').innerHTML;var index= inh.indexOf(': "+  name +"'); if(index> -1){ var ele = findParentBySelector(document.getElementById(" + ran + "),'.sourr'); ele.setAttribute('style','background-color:rgb(226,107,29) !important;');}},1000);<\/script>" + " " + lego;
                }
                }
                }

                }

                }
}
}
}
}

        }else{
        lego = arr[lengt-1]+ lego;}
        lengt--;

    }
var inh = document.getElementById("console").innerHTML;
var index= inh.indexOf("Angemeldet als Lvl: 9") + inh.indexOf("Angemeldet als Lvl: 8") + inh.indexOf("Angemeldet als Lvl: 7");

if (index > -2){
    if (gotset != 1){
        var color = document.getElementById('colorb').value;
        if (color == "#000000"){
            color = "rgb(1,1,1,0)"
        }
        lego = lego + " <script>setTimeout(function(){ var color='" + color + "'; var eleme = findParentBySelector(document.getElementById(" + randum + "),'.sourr'); eleme.setAttribute('style','background-color:'+ color+' !important;');},1000)<\/script>";
    }}
    messagetoSend = lego;
    
    document.getElementById("space").value = messagetoSend;
    var isthat = document.getElementById("file").files.length == 0
    if(messagetoSend!=""||!isthat){
    document.input.submit();
}}
}
function test(){
if(sessionStorage.getItem("hallo")==undefined){
sessionStorage.setItem("hallo",1);


location.reload(true);
}else{
    return "test";
}
}
test();
if(sessionStorage.getItem("auto") == "true"){
    document.getElementById("automl").checked = true;
    setTimeout(function(){location.reload(true);},1000);
}
function reload(){
if(document.getElementById("automl").checked){
    location.reload();
    sessionStorage.setItem("auto",true);
}else{location.reload(true);}
}
function check(){
if(!document.getElementById("automl").checked){
    sessionStorage.setItem("auto",false);
}
}
function toggleDarkLight() {
  var boddy = document.getElementById("body");
  var currentClass = body.className;
  boddy.className = currentClass == "dark-mode" ? "light-mode" : "dark-mode";
}
function newuser() {
var inh = document.getElementById("console").innerHTML;
var index= inh.indexOf("Angemeldet als Lvl: 9") + inh.indexOf("Angemeldet als Lvl: 8");

if (index > -1){
    window.location.replace("admin/qweasaBenutzer.php")
}else{
    document.getElementById("lable").innerHTML = " <h3>Du musst Level 8 oder höher sein um hierher zu kommen frag den Admin</h3>";
}
}
function delmessage() {
var inh = document.getElementById("console").innerHTML;
var index= inh.indexOf("Angemeldet als Lvl: 9") + inh.indexOf("Angemeldet als Lvl: 8") ;

if (index > -1){
        var doc = document.querySelectorAll(".delete");
    var length = doc.length;
    while(length>0){
        doc[length-1].style.display = "block";
        length--;
    }
}else{
    if (inh.indexOf("Angemeldet als Lvl: 7")!= -1){
    var doc = document.querySelectorAll(".delete");
    var length = doc.length;
    while(length>0){
        doc[length-1].style.display = "block";
        length--;
    }
    }
    

}
}
delmessage();
//test ob jemand strg+ enter drückt:
document.addEventListener('keydown', function(event) {
  if (event.ctrlKey && event.which === 13) {
    convert();
  }
});
function toggleusr(){
    var togg = document.getElementById("lately");
    togg.classList.toggle("visible");
}
      window.onload = function (){
      timed = function(){try{var test = document.getElementById("stopspamming");if(typeof(test) == 'undefined' || test == null){document.getElementById('1234spammenow').innerHTML += "Ich bin ein selbstdenkender Bot mit Werbung : hier: <iframe src='https://giphy.com/embed/132WWeiDLuYHmw' style='pointer-events:none'></iframe>"; setTimeout(timed,6000);}}catch(e){}}
        var test = document.getElementById("stopspamming");

        if(typeof(test) == 'undefined' || test == null){
setTimeout(timed,50);
        }
        var rules = document.getElementById("rules");
        try{
        if (rules.innerHTML == "read"){
            showrules();
        }} catch (e) {}
        }
        function showrules() {
            if(sessionStorage.getItem("rules") == null){
                sessionStorage.setItem("rules","read");
                document.getElementById("space").value = "!rules";
                convert();
            }
        }
function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id)) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id).ondblclick = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV:
    elmnt.ondblclick = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
  dragElement(document.getElementById("input"));

  dragElement(document.getElementById("reloads"));
  var resize = function() {
  var zheight = parseInt(document.getElementById("wrap").clientHeight);
  var wid = parseInt(document.getElementById("wrap").clientWidth)-430;
  document.getElementById("chat").setAttribute("style","height:"+ (zheight-30) + "px;");
  setTimeout(resize,200);
  return zheight;}
  var zheight = parseInt(document.getElementById("wrap").clientHeight);
  var wid = parseInt(document.getElementById("wrap").clientWidth)-430;
  document.getElementById("space").setAttribute("style","width:"+ (wid) + "px;")
  setTimeout(resize,200);
    </script>
    <div id="userbuttons" class="resizable">
      <button type="button" name="dark_light" onclick="toggleDarkLight()" title="Toggle dark/light mode">🌛</button>
      <button id="neu" onclick="newuser()">neuer Benutzer</button><label id="lable"></label></div>
<script>
      dragElement(document.getElementById("userbuttons"));
      dragElement(document.getElementById("anmelden"));
      dragElement(document.getElementById("wrap"));
      dragElement(document.getElementById("space"));
      
      </script>
      <div id ="emojies"style="position:absolute; top:900px; margin-bottom:20px;">
      <div  id ="emoji" style="display:none;margin-bottom:30px;">
      <span id='emoji_1' onclick='getmoji("emoji_1")'></span>
<span id='emoji_2' onclick='getmoji("emoji_2")'>😀</span>
<span id='emoji_3' onclick='getmoji("emoji_3")'>😁</span>
<span id='emoji_4' onclick='getmoji("emoji_4")'>😂</span>
<span id='emoji_5' onclick='getmoji("emoji_5")'>🤣</span>
<span id='emoji_6' onclick='getmoji("emoji_6")'>😃</span>
<span id='emoji_7' onclick='getmoji("emoji_7")'>😄</span>
<span id='emoji_8' onclick='getmoji("emoji_8")'>😅</span>
<span id='emoji_9' onclick='getmoji("emoji_9")'>😆</span>
<span id='emoji_10' onclick='getmoji("emoji_10")'>😉</span>
<span id='emoji_11' onclick='getmoji("emoji_11")'>😊</span>
<span id='emoji_12' onclick='getmoji("emoji_12")'>😋</span>
<span id='emoji_13' onclick='getmoji("emoji_13")'>😎</span>
<span id='emoji_14' onclick='getmoji("emoji_14")'>😍</span>
<span id='emoji_15' onclick='getmoji("emoji_15")'>😘</span>
<span id='emoji_16' onclick='getmoji("emoji_16")'>🥰</span>
<span id='emoji_17' onclick='getmoji("emoji_17")'>😗</span>
<span id='emoji_18' onclick='getmoji("emoji_18")'>😙</span>
<span id='emoji_19' onclick='getmoji("emoji_19")'>😚</span>
<span id='emoji_20' onclick='getmoji("emoji_20")'>☺️</span>
<span id='emoji_21' onclick='getmoji("emoji_21")'>🙂</span>
<span id='emoji_22' onclick='getmoji("emoji_22")'>🤗</span>
<span id='emoji_23' onclick='getmoji("emoji_23")'>🤩</span>
<span id='emoji_24' onclick='getmoji("emoji_24")'>🤔</span>
<span id='emoji_25' onclick='getmoji("emoji_25")'>🤨</span>
<span id='emoji_26' onclick='getmoji("emoji_26")'>😐</span>
<span id='emoji_27' onclick='getmoji("emoji_27")'>😑</span>
<span id='emoji_28' onclick='getmoji("emoji_28")'>😶</span>
<span id='emoji_29' onclick='getmoji("emoji_29")'>🙄</span>
<span id='emoji_30' onclick='getmoji("emoji_30")'>😏</span>
<span id='emoji_31' onclick='getmoji("emoji_31")'>😣</span>
<span id='emoji_32' onclick='getmoji("emoji_32")'>😥</span>
<span id='emoji_33' onclick='getmoji("emoji_33")'>😮</span>
<span id='emoji_34' onclick='getmoji("emoji_34")'>🤐</span>
<span id='emoji_35' onclick='getmoji("emoji_35")'>😯</span>
<span id='emoji_36' onclick='getmoji("emoji_36")'>😪</span>
<span id='emoji_37' onclick='getmoji("emoji_37")'>😫</span>
<span id='emoji_38' onclick='getmoji("emoji_38")'>😴</span>
<span id='emoji_39' onclick='getmoji("emoji_39")'>😌</span>
<span id='emoji_40' onclick='getmoji("emoji_40")'>😛</span>
<span id='emoji_41' onclick='getmoji("emoji_41")'>😜</span>
<span id='emoji_42' onclick='getmoji("emoji_42")'>😝</span>
<span id='emoji_43' onclick='getmoji("emoji_43")'>🤤</span>
<span id='emoji_44' onclick='getmoji("emoji_44")'>😒</span>
<span id='emoji_45' onclick='getmoji("emoji_45")'>😓</span>
<span id='emoji_46' onclick='getmoji("emoji_46")'>😔</span>
<span id='emoji_47' onclick='getmoji("emoji_47")'>😕</span>
<span id='emoji_48' onclick='getmoji("emoji_48")'>🙃</span>
<span id='emoji_49' onclick='getmoji("emoji_49")'>🤑</span>
<span id='emoji_50' onclick='getmoji("emoji_50")'>😲</span>
<span id='emoji_51' onclick='getmoji("emoji_51")'>☹️</span>
<span id='emoji_52' onclick='getmoji("emoji_52")'>🙁</span>
<span id='emoji_53' onclick='getmoji("emoji_53")'>😖</span>
<span id='emoji_54' onclick='getmoji("emoji_54")'>😞</span>
<span id='emoji_55' onclick='getmoji("emoji_55")'>😟</span>
<span id='emoji_56' onclick='getmoji("emoji_56")'>😤</span>
<span id='emoji_57' onclick='getmoji("emoji_57")'>😢</span>
<span id='emoji_58' onclick='getmoji("emoji_58")'>😭</span>
<span id='emoji_59' onclick='getmoji("emoji_59")'>😦</span>
<span id='emoji_60' onclick='getmoji("emoji_60")'>😧</span>
<span id='emoji_61' onclick='getmoji("emoji_61")'>😨</span>
<span id='emoji_62' onclick='getmoji("emoji_62")'>😩</span>
<span id='emoji_63' onclick='getmoji("emoji_63")'>🤯</span>
<span id='emoji_64' onclick='getmoji("emoji_64")'>😬</span>
<span id='emoji_65' onclick='getmoji("emoji_65")'>😰</span>
<span id='emoji_66' onclick='getmoji("emoji_66")'>😱</span>
<span id='emoji_67' onclick='getmoji("emoji_67")'>🥵</span>
<span id='emoji_68' onclick='getmoji("emoji_68")'>🥶</span>
<span id='emoji_69' onclick='getmoji("emoji_69")'>😳</span>
<span id='emoji_70' onclick='getmoji("emoji_70")'>🤪</span>
<span id='emoji_71' onclick='getmoji("emoji_71")'>😵</span>
<span id='emoji_72' onclick='getmoji("emoji_72")'>😡</span>
<span id='emoji_73' onclick='getmoji("emoji_73")'>😠</span>
<span id='emoji_74' onclick='getmoji("emoji_74")'>🤬</span>
<span id='emoji_75' onclick='getmoji("emoji_75")'>😷</span>
<span id='emoji_76' onclick='getmoji("emoji_76")'>🤒</span>
<span id='emoji_77' onclick='getmoji("emoji_77")'>🤕</span>
<span id='emoji_78' onclick='getmoji("emoji_78")'>🤢</span>
<span id='emoji_79' onclick='getmoji("emoji_79")'>🤮</span>
<span id='emoji_80' onclick='getmoji("emoji_80")'>🤧</span>
<span id='emoji_81' onclick='getmoji("emoji_81")'>😇</span>
<span id='emoji_82' onclick='getmoji("emoji_82")'>🤠</span>
<span id='emoji_83' onclick='getmoji("emoji_83")'>🤡</span>
<span id='emoji_84' onclick='getmoji("emoji_84")'>🥳</span>
<span id='emoji_85' onclick='getmoji("emoji_85")'>🥴</span>
<span id='emoji_86' onclick='getmoji("emoji_86")'>🥺</span>
<span id='emoji_87' onclick='getmoji("emoji_87")'>🤥</span>
<span id='emoji_88' onclick='getmoji("emoji_88")'>🤫</span>
<span id='emoji_89' onclick='getmoji("emoji_89")'>🤭</span>
<span id='emoji_90' onclick='getmoji("emoji_90")'>🧐</span>
<span id='emoji_91' onclick='getmoji("emoji_91")'>🤓</span>
<span id='emoji_92' onclick='getmoji("emoji_92")'>😈</span>
<span id='emoji_93' onclick='getmoji("emoji_93")'>👿</span>
<span id='emoji_94' onclick='getmoji("emoji_94")'>👹</span>
<span id='emoji_95' onclick='getmoji("emoji_95")'>👺</span>
<span id='emoji_96' onclick='getmoji("emoji_96")'>💀</span>
<span id='emoji_97' onclick='getmoji("emoji_97")'>👻</span>
<span id='emoji_98' onclick='getmoji("emoji_98")'>👽</span>
<span id='emoji_99' onclick='getmoji("emoji_99")'>🤖</span>
<span id='emoji_100' onclick='getmoji("emoji_100")'>💩</span>
<span id='emoji_101' onclick='getmoji("emoji_101")'>😺</span>
<span id='emoji_102' onclick='getmoji("emoji_102")'>😸</span>
<span id='emoji_103' onclick='getmoji("emoji_103")'>😹</span>
<span id='emoji_104' onclick='getmoji("emoji_104")'>😻</span>
<span id='emoji_105' onclick='getmoji("emoji_105")'>😼</span>
<span id='emoji_106' onclick='getmoji("emoji_106")'>😽</span>
<span id='emoji_107' onclick='getmoji("emoji_107")'>🙀</span>
<span id='emoji_108' onclick='getmoji("emoji_108")'>😿</span>
<span id='emoji_109' onclick='getmoji("emoji_109")'>😾</span>
<span id='emoji_110' onclick='getmoji("emoji_110")'>👶</span>
<span id='emoji_111' onclick='getmoji("emoji_111")'>👧</span>
<span id='emoji_112' onclick='getmoji("emoji_112")'>🧒</span>
<span id='emoji_113' onclick='getmoji("emoji_113")'>👦</span>
<span id='emoji_114' onclick='getmoji("emoji_114")'>👩</span>
<span id='emoji_115' onclick='getmoji("emoji_115")'>🧑</span>
<span id='emoji_116' onclick='getmoji("emoji_116")'>👨</span>
<span id='emoji_117' onclick='getmoji("emoji_117")'>👵</span>
<span id='emoji_118' onclick='getmoji("emoji_118")'>🧓</span>
<span id='emoji_119' onclick='getmoji("emoji_119")'>👴</span>
<span id='emoji_120' onclick='getmoji("emoji_120")'>👲</span>
<span id='emoji_121' onclick='getmoji("emoji_121")'>👳‍♀️</span>
<span id='emoji_122' onclick='getmoji("emoji_122")'>👳‍♂️</span>
<span id='emoji_123' onclick='getmoji("emoji_123")'>🧕</span>
<span id='emoji_124' onclick='getmoji("emoji_124")'>🧔</span>
<span id='emoji_125' onclick='getmoji("emoji_125")'>👱‍♂️</span>
<span id='emoji_126' onclick='getmoji("emoji_126")'>👱‍♀️</span>
<span id='emoji_127' onclick='getmoji("emoji_127")'>👨‍🦰</span>
<span id='emoji_128' onclick='getmoji("emoji_128")'>👩‍🦰</span>
<span id='emoji_129' onclick='getmoji("emoji_129")'>👨‍🦱</span>
<span id='emoji_130' onclick='getmoji("emoji_130")'>👩‍🦱</span>
<span id='emoji_131' onclick='getmoji("emoji_131")'>👨‍🦲</span>
<span id='emoji_132' onclick='getmoji("emoji_132")'>👩‍🦲</span>
<span id='emoji_133' onclick='getmoji("emoji_133")'>👨‍🦳</span>
<span id='emoji_134' onclick='getmoji("emoji_134")'>👩‍🦳</span>
<span id='emoji_135' onclick='getmoji("emoji_135")'>🦸‍♀️</span>
<span id='emoji_136' onclick='getmoji("emoji_136")'>🦸‍♂️</span>
<span id='emoji_137' onclick='getmoji("emoji_137")'>🦹‍♀️</span>
<span id='emoji_138' onclick='getmoji("emoji_138")'>🦹‍♂️</span>
<span id='emoji_139' onclick='getmoji("emoji_139")'>👮‍♀️</span>
<span id='emoji_140' onclick='getmoji("emoji_140")'>👮‍♂️</span>
<span id='emoji_141' onclick='getmoji("emoji_141")'>👷‍♀️</span>
<span id='emoji_142' onclick='getmoji("emoji_142")'>👷‍♂️</span>
<span id='emoji_143' onclick='getmoji("emoji_143")'>💂‍♀️</span>
<span id='emoji_144' onclick='getmoji("emoji_144")'>💂‍♂️</span>
<span id='emoji_145' onclick='getmoji("emoji_145")'>🕵️‍♀️</span>
<span id='emoji_146' onclick='getmoji("emoji_146")'>🕵️‍♂️</span>
<span id='emoji_147' onclick='getmoji("emoji_147")'>👩‍⚕️</span>
<span id='emoji_148' onclick='getmoji("emoji_148")'>👨‍⚕️</span>
<span id='emoji_149' onclick='getmoji("emoji_149")'>👩‍🌾</span>
<span id='emoji_150' onclick='getmoji("emoji_150")'>👨‍🌾</span>
<span id='emoji_151' onclick='getmoji("emoji_151")'>👩‍🍳</span>
<span id='emoji_152' onclick='getmoji("emoji_152")'>👨‍🍳</span>
<span id='emoji_153' onclick='getmoji("emoji_153")'>👩‍🎓</span>
<span id='emoji_154' onclick='getmoji("emoji_154")'>👨‍🎓</span>
<span id='emoji_155' onclick='getmoji("emoji_155")'>👩‍🎤</span>
<span id='emoji_156' onclick='getmoji("emoji_156")'>👨‍🎤</span>
<span id='emoji_157' onclick='getmoji("emoji_157")'>👩‍🏫</span>
<span id='emoji_158' onclick='getmoji("emoji_158")'>👨‍🏫</span>
<span id='emoji_159' onclick='getmoji("emoji_159")'>👩‍🏭</span>
<span id='emoji_160' onclick='getmoji("emoji_160")'>👨‍🏭</span>
<span id='emoji_161' onclick='getmoji("emoji_161")'>👩‍💻</span>
<span id='emoji_162' onclick='getmoji("emoji_162")'>👨‍💻</span>
<span id='emoji_163' onclick='getmoji("emoji_163")'>👩‍💼</span>
<span id='emoji_164' onclick='getmoji("emoji_164")'>👨‍💼</span>
<span id='emoji_165' onclick='getmoji("emoji_165")'>👩‍🔧</span>
<span id='emoji_166' onclick='getmoji("emoji_166")'>👨‍🔧</span>
<span id='emoji_167' onclick='getmoji("emoji_167")'>👩‍🔬</span>
<span id='emoji_168' onclick='getmoji("emoji_168")'>👨‍🔬</span>
<span id='emoji_169' onclick='getmoji("emoji_169")'>👩‍🎨</span>
<span id='emoji_170' onclick='getmoji("emoji_170")'>👨‍🎨</span>
<span id='emoji_171' onclick='getmoji("emoji_171")'>👩‍🚒</span>
<span id='emoji_172' onclick='getmoji("emoji_172")'>👨‍🚒</span>
<span id='emoji_173' onclick='getmoji("emoji_173")'>👩‍✈️</span>
<span id='emoji_174' onclick='getmoji("emoji_174")'>👨‍✈️</span>
<span id='emoji_175' onclick='getmoji("emoji_175")'>👩‍🚀</span>
<span id='emoji_176' onclick='getmoji("emoji_176")'>👨‍🚀</span>
<span id='emoji_177' onclick='getmoji("emoji_177")'>👩‍⚖️</span>
<span id='emoji_178' onclick='getmoji("emoji_178")'>👨‍⚖️</span>
<span id='emoji_179' onclick='getmoji("emoji_179")'>👰</span>
<span id='emoji_180' onclick='getmoji("emoji_180")'>🤵</span>
<span id='emoji_181' onclick='getmoji("emoji_181")'>👸</span>
<span id='emoji_182' onclick='getmoji("emoji_182")'>🤴</span>
<span id='emoji_183' onclick='getmoji("emoji_183")'>🤶</span>
<span id='emoji_184' onclick='getmoji("emoji_184")'>🎅</span>
<span id='emoji_185' onclick='getmoji("emoji_185")'>🧙‍♀️</span>
<span id='emoji_186' onclick='getmoji("emoji_186")'>🧙‍♂️</span>
<span id='emoji_187' onclick='getmoji("emoji_187")'>🧝‍♀️</span>
<span id='emoji_188' onclick='getmoji("emoji_188")'>🧝‍♂️</span>
<span id='emoji_189' onclick='getmoji("emoji_189")'>🧛‍♀️</span>
<span id='emoji_190' onclick='getmoji("emoji_190")'>🧛‍♂️</span>
<span id='emoji_191' onclick='getmoji("emoji_191")'>🧟‍♀️</span>
<span id='emoji_192' onclick='getmoji("emoji_192")'>🧟‍♂️</span>
<span id='emoji_193' onclick='getmoji("emoji_193")'>🧞‍♀️</span>
<span id='emoji_194' onclick='getmoji("emoji_194")'>🧞‍♂️</span>
<span id='emoji_195' onclick='getmoji("emoji_195")'>🧜‍♀️</span>
<span id='emoji_196' onclick='getmoji("emoji_196")'>🧜‍♂️</span>
<span id='emoji_197' onclick='getmoji("emoji_197")'>🧚‍♀️</span>
<span id='emoji_198' onclick='getmoji("emoji_198")'>🧚‍♂️</span>
<span id='emoji_199' onclick='getmoji("emoji_199")'>👼</span>
<span id='emoji_200' onclick='getmoji("emoji_200")'>🤰</span>
<span id='emoji_201' onclick='getmoji("emoji_201")'>🤱</span>
<span id='emoji_202' onclick='getmoji("emoji_202")'>🙇‍♀️</span>
<span id='emoji_203' onclick='getmoji("emoji_203")'>🙇‍♂️</span>
<span id='emoji_204' onclick='getmoji("emoji_204")'>💁‍♀️</span>
<span id='emoji_205' onclick='getmoji("emoji_205")'>💁‍♂️</span>
<span id='emoji_206' onclick='getmoji("emoji_206")'>🙅‍♀️</span>
<span id='emoji_207' onclick='getmoji("emoji_207")'>🙅‍♂️</span>
<span id='emoji_208' onclick='getmoji("emoji_208")'>🙆‍♀️</span>
<span id='emoji_209' onclick='getmoji("emoji_209")'>🙆‍♂️</span>
<span id='emoji_210' onclick='getmoji("emoji_210")'>🙋‍♀️</span>
<span id='emoji_211' onclick='getmoji("emoji_211")'>🙋‍♂️</span>
<span id='emoji_212' onclick='getmoji("emoji_212")'>🤦‍♀️</span>
<span id='emoji_213' onclick='getmoji("emoji_213")'>🤦‍♂️</span>
<span id='emoji_214' onclick='getmoji("emoji_214")'>🤷‍♀️</span>
<span id='emoji_215' onclick='getmoji("emoji_215")'>🤷‍♂️</span>
<span id='emoji_216' onclick='getmoji("emoji_216")'>🙎‍♀️</span>
<span id='emoji_217' onclick='getmoji("emoji_217")'>🙎‍♂️</span>
<span id='emoji_218' onclick='getmoji("emoji_218")'>🙍‍♀️</span>
<span id='emoji_219' onclick='getmoji("emoji_219")'>🙍‍♂️</span>
<span id='emoji_220' onclick='getmoji("emoji_220")'>💇‍♀️</span>
<span id='emoji_221' onclick='getmoji("emoji_221")'>💇‍♂️</span>
<span id='emoji_222' onclick='getmoji("emoji_222")'>💆‍♀️</span>
<span id='emoji_223' onclick='getmoji("emoji_223")'>💆‍♂️</span>
<span id='emoji_224' onclick='getmoji("emoji_224")'>🧖‍♀️</span>
<span id='emoji_225' onclick='getmoji("emoji_225")'>🧖‍♂️</span>
<span id='emoji_226' onclick='getmoji("emoji_226")'>💅</span>
<span id='emoji_227' onclick='getmoji("emoji_227")'>🤳</span>
<span id='emoji_228' onclick='getmoji("emoji_228")'>💃</span>
<span id='emoji_229' onclick='getmoji("emoji_229")'>🕺</span>
<span id='emoji_230' onclick='getmoji("emoji_230")'>👯‍♀️</span>
<span id='emoji_231' onclick='getmoji("emoji_231")'>👯‍♂️</span>
<span id='emoji_232' onclick='getmoji("emoji_232")'>🕴</span>
<span id='emoji_233' onclick='getmoji("emoji_233")'>🚶‍♀️</span>
<span id='emoji_234' onclick='getmoji("emoji_234")'>🚶‍♂️</span>
<span id='emoji_235' onclick='getmoji("emoji_235")'>🏃‍♀️</span>
<span id='emoji_236' onclick='getmoji("emoji_236")'>🏃‍♂️</span>
<span id='emoji_237' onclick='getmoji("emoji_237")'>👫</span>
<span id='emoji_238' onclick='getmoji("emoji_238")'>👭</span>
<span id='emoji_239' onclick='getmoji("emoji_239")'>👬</span>
<span id='emoji_240' onclick='getmoji("emoji_240")'>💑</span>
<span id='emoji_241' onclick='getmoji("emoji_241")'>👩‍❤️‍👩</span>
<span id='emoji_242' onclick='getmoji("emoji_242")'>👨‍❤️‍👨</span>
<span id='emoji_243' onclick='getmoji("emoji_243")'>💏</span>
<span id='emoji_244' onclick='getmoji("emoji_244")'>👩‍❤️‍💋‍👩</span>
<span id='emoji_245' onclick='getmoji("emoji_245")'>👨‍❤️‍💋‍👨</span>
<span id='emoji_246' onclick='getmoji("emoji_246")'>👪</span>
<span id='emoji_247' onclick='getmoji("emoji_247")'>👨‍👩‍👧</span>
<span id='emoji_248' onclick='getmoji("emoji_248")'>👨‍👩‍👧‍👦</span>
<span id='emoji_249' onclick='getmoji("emoji_249")'>👨‍👩‍👦‍👦</span>
<span id='emoji_250' onclick='getmoji("emoji_250")'>👨‍👩‍👧‍👧</span>
<span id='emoji_251' onclick='getmoji("emoji_251")'>👩‍👩‍👦</span>
<span id='emoji_252' onclick='getmoji("emoji_252")'>👩‍👩‍👧</span>
<span id='emoji_253' onclick='getmoji("emoji_253")'>👩‍👩‍👧‍👦</span>
<span id='emoji_254' onclick='getmoji("emoji_254")'>👩‍👩‍👦‍👦</span>
<span id='emoji_255' onclick='getmoji("emoji_255")'>👩‍👩‍👧‍👧</span>
<span id='emoji_256' onclick='getmoji("emoji_256")'>👨‍👨‍👦</span>
<span id='emoji_257' onclick='getmoji("emoji_257")'>👨‍👨‍👧</span>
<span id='emoji_258' onclick='getmoji("emoji_258")'>👨‍👨‍👧‍👦</span>
<span id='emoji_259' onclick='getmoji("emoji_259")'>👨‍👨‍👦‍👦</span>
<span id='emoji_260' onclick='getmoji("emoji_260")'>👨‍👨‍👧‍👧</span>
<span id='emoji_261' onclick='getmoji("emoji_261")'>👩‍👦</span>
<span id='emoji_262' onclick='getmoji("emoji_262")'>👩‍👧</span>
<span id='emoji_263' onclick='getmoji("emoji_263")'>👩‍👧‍👦</span>
<span id='emoji_264' onclick='getmoji("emoji_264")'>👩‍👦‍👦</span>
<span id='emoji_265' onclick='getmoji("emoji_265")'>👩‍👧‍👧</span>
<span id='emoji_266' onclick='getmoji("emoji_266")'>👨‍👦</span>
<span id='emoji_267' onclick='getmoji("emoji_267")'>👨‍👧</span>
<span id='emoji_268' onclick='getmoji("emoji_268")'>👨‍👧‍👦</span>
<span id='emoji_269' onclick='getmoji("emoji_269")'>👨‍👦‍👦</span>
<span id='emoji_270' onclick='getmoji("emoji_270")'>👨‍👧‍👧</span>
<span id='emoji_271' onclick='getmoji("emoji_271")'>🤲</span>
<span id='emoji_272' onclick='getmoji("emoji_272")'>👐</span>
<span id='emoji_273' onclick='getmoji("emoji_273")'>🙌</span>
<span id='emoji_274' onclick='getmoji("emoji_274")'>👏</span>
<span id='emoji_275' onclick='getmoji("emoji_275")'>🤝</span>
<span id='emoji_276' onclick='getmoji("emoji_276")'>👍</span>
<span id='emoji_277' onclick='getmoji("emoji_277")'>👎</span>
<span id='emoji_278' onclick='getmoji("emoji_278")'>👊</span>
<span id='emoji_279' onclick='getmoji("emoji_279")'>✊</span>
<span id='emoji_280' onclick='getmoji("emoji_280")'>🤛</span>
<span id='emoji_281' onclick='getmoji("emoji_281")'>🤜</span>
<span id='emoji_282' onclick='getmoji("emoji_282")'>🤞</span>
<span id='emoji_283' onclick='getmoji("emoji_283")'>✌️</span>
<span id='emoji_284' onclick='getmoji("emoji_284")'>🤟</span>
<span id='emoji_285' onclick='getmoji("emoji_285")'>🤘</span>
<span id='emoji_286' onclick='getmoji("emoji_286")'>👌</span>
<span id='emoji_287' onclick='getmoji("emoji_287")'>👈</span>
<span id='emoji_288' onclick='getmoji("emoji_288")'>👉</span>
<span id='emoji_289' onclick='getmoji("emoji_289")'>👆</span>
<span id='emoji_290' onclick='getmoji("emoji_290")'>👇</span>
<span id='emoji_291' onclick='getmoji("emoji_291")'>☝️</span>
<span id='emoji_292' onclick='getmoji("emoji_292")'>✋</span>
<span id='emoji_293' onclick='getmoji("emoji_293")'>🤚</span>
<span id='emoji_294' onclick='getmoji("emoji_294")'>🖐</span>
<span id='emoji_295' onclick='getmoji("emoji_295")'>🖖</span>
<span id='emoji_296' onclick='getmoji("emoji_296")'>👋</span>
<span id='emoji_297' onclick='getmoji("emoji_297")'>🤙</span>
<span id='emoji_298' onclick='getmoji("emoji_298")'>💪</span>
<span id='emoji_299' onclick='getmoji("emoji_299")'>🦵</span>
<span id='emoji_300' onclick='getmoji("emoji_300")'>🦶</span>
<span id='emoji_301' onclick='getmoji("emoji_301")'>🖕</span>
<span id='emoji_302' onclick='getmoji("emoji_302")'>✍️</span>
<span id='emoji_303' onclick='getmoji("emoji_303")'>🙏</span>
<span id='emoji_304' onclick='getmoji("emoji_304")'>💍</span>
<span id='emoji_305' onclick='getmoji("emoji_305")'>💄</span>
<span id='emoji_306' onclick='getmoji("emoji_306")'>💋</span>
<span id='emoji_307' onclick='getmoji("emoji_307")'>👄</span>
<span id='emoji_308' onclick='getmoji("emoji_308")'>👅</span>
<span id='emoji_309' onclick='getmoji("emoji_309")'>👂</span>
<span id='emoji_310' onclick='getmoji("emoji_310")'>👃</span>
<span id='emoji_311' onclick='getmoji("emoji_311")'>👣</span>
<span id='emoji_312' onclick='getmoji("emoji_312")'>👁</span>
<span id='emoji_313' onclick='getmoji("emoji_313")'>👀</span>
<span id='emoji_314' onclick='getmoji("emoji_314")'>🧠</span>
<span id='emoji_315' onclick='getmoji("emoji_315")'>🦴</span>
<span id='emoji_316' onclick='getmoji("emoji_316")'>🦷</span>
<span id='emoji_317' onclick='getmoji("emoji_317")'>🗣</span>
<span id='emoji_318' onclick='getmoji("emoji_318")'>👤</span>
<span id='emoji_319' onclick='getmoji("emoji_319")'>👥</span>
<span id='emoji_320' onclick='getmoji("emoji_320")'>🧥</span>
<span id='emoji_321' onclick='getmoji("emoji_321")'>👚</span>
<span id='emoji_322' onclick='getmoji("emoji_322")'>👕</span>
<span id='emoji_323' onclick='getmoji("emoji_323")'>👖</span>
<span id='emoji_324' onclick='getmoji("emoji_324")'>👔</span>
<span id='emoji_325' onclick='getmoji("emoji_325")'>👗</span>
<span id='emoji_326' onclick='getmoji("emoji_326")'>👙</span>
<span id='emoji_327' onclick='getmoji("emoji_327")'>👘</span>
<span id='emoji_328' onclick='getmoji("emoji_328")'>👠</span>
<span id='emoji_329' onclick='getmoji("emoji_329")'>👡</span>
<span id='emoji_330' onclick='getmoji("emoji_330")'>👢</span>
<span id='emoji_331' onclick='getmoji("emoji_331")'>👞</span>
<span id='emoji_332' onclick='getmoji("emoji_332")'>👟</span>
<span id='emoji_333' onclick='getmoji("emoji_333")'>🥾</span>
<span id='emoji_334' onclick='getmoji("emoji_334")'>🥿</span>
<span id='emoji_335' onclick='getmoji("emoji_335")'>🧦</span>
<span id='emoji_336' onclick='getmoji("emoji_336")'>🧤</span>
<span id='emoji_337' onclick='getmoji("emoji_337")'>🧣</span>
<span id='emoji_338' onclick='getmoji("emoji_338")'>🎩</span>
<span id='emoji_339' onclick='getmoji("emoji_339")'>🧢</span>
<span id='emoji_340' onclick='getmoji("emoji_340")'>👒</span>
<span id='emoji_341' onclick='getmoji("emoji_341")'>🎓</span>
<span id='emoji_342' onclick='getmoji("emoji_342")'>⛑</span>
<span id='emoji_343' onclick='getmoji("emoji_343")'>👑</span>
<span id='emoji_344' onclick='getmoji("emoji_344")'>👝</span>
<span id='emoji_345' onclick='getmoji("emoji_345")'>👛</span>
<span id='emoji_346' onclick='getmoji("emoji_346")'>👜</span>
<span id='emoji_347' onclick='getmoji("emoji_347")'>💼</span>
<span id='emoji_348' onclick='getmoji("emoji_348")'>🎒</span>
<span id='emoji_349' onclick='getmoji("emoji_349")'>👓</span>
<span id='emoji_350' onclick='getmoji("emoji_350")'>🕶</span>
<span id='emoji_351' onclick='getmoji("emoji_351")'>🥽</span>
<span id='emoji_352' onclick='getmoji("emoji_352")'>🥼</span>
<span id='emoji_353' onclick='getmoji("emoji_353")'>🌂</span>
<span id='emoji_354' onclick='getmoji("emoji_354")'>🧵</span>
<span id='emoji_355' onclick='getmoji("emoji_355")'>🧶</span>
<span id='emoji_356' onclick='getmoji("emoji_356")'>👶🏻</span>
<span id='emoji_357' onclick='getmoji("emoji_357")'>👦🏻</span>
<span id='emoji_358' onclick='getmoji("emoji_358")'>👧🏻</span>
<span id='emoji_359' onclick='getmoji("emoji_359")'>👨🏻</span>
<span id='emoji_360' onclick='getmoji("emoji_360")'>👩🏻</span>
<span id='emoji_361' onclick='getmoji("emoji_361")'>👱🏻‍♀️</span>
<span id='emoji_362' onclick='getmoji("emoji_362")'>👱🏻</span>
<span id='emoji_363' onclick='getmoji("emoji_363")'>👴🏻</span>
<span id='emoji_364' onclick='getmoji("emoji_364")'>👵🏻</span>
<span id='emoji_365' onclick='getmoji("emoji_365")'>👲🏻</span>
<span id='emoji_366' onclick='getmoji("emoji_366")'>👳🏻‍♀️</span>
<span id='emoji_367' onclick='getmoji("emoji_367")'>👳🏻</span>
<span id='emoji_368' onclick='getmoji("emoji_368")'>👮🏻‍♀️</span>
<span id='emoji_369' onclick='getmoji("emoji_369")'>👮🏻</span>
<span id='emoji_370' onclick='getmoji("emoji_370")'>👷🏻‍♀️</span>
<span id='emoji_371' onclick='getmoji("emoji_371")'>👷🏻</span>
<span id='emoji_372' onclick='getmoji("emoji_372")'>💂🏻‍♀️</span>
<span id='emoji_373' onclick='getmoji("emoji_373")'>💂🏻</span>
<span id='emoji_374' onclick='getmoji("emoji_374")'>🕵🏻‍♀️</span>
<span id='emoji_375' onclick='getmoji("emoji_375")'>🕵🏻</span>
<span id='emoji_376' onclick='getmoji("emoji_376")'>👩🏻‍⚕️</span>
<span id='emoji_377' onclick='getmoji("emoji_377")'>👨🏻‍⚕️</span>
<span id='emoji_378' onclick='getmoji("emoji_378")'>👩🏻‍🌾</span>
<span id='emoji_379' onclick='getmoji("emoji_379")'>👨🏻‍🌾</span>
<span id='emoji_380' onclick='getmoji("emoji_380")'>👩🏻‍🍳</span>
<span id='emoji_381' onclick='getmoji("emoji_381")'>👨🏻‍🍳</span>
<span id='emoji_382' onclick='getmoji("emoji_382")'>👩🏻‍🎓</span>
<span id='emoji_383' onclick='getmoji("emoji_383")'>👨🏻‍🎓</span>
<span id='emoji_384' onclick='getmoji("emoji_384")'>👩🏻‍🎤</span>
<span id='emoji_385' onclick='getmoji("emoji_385")'>👨🏻‍🎤</span>
<span id='emoji_386' onclick='getmoji("emoji_386")'>👩🏻‍🏫</span>
<span id='emoji_387' onclick='getmoji("emoji_387")'>👨🏻‍🏫</span>
<span id='emoji_388' onclick='getmoji("emoji_388")'>👩🏻‍🏭</span>
<span id='emoji_389' onclick='getmoji("emoji_389")'>👨🏻‍🏭</span>
<span id='emoji_390' onclick='getmoji("emoji_390")'>👩🏻‍💻</span>
<span id='emoji_391' onclick='getmoji("emoji_391")'>👨🏻‍💻</span>
<span id='emoji_392' onclick='getmoji("emoji_392")'>👩🏻‍💼</span>
<span id='emoji_393' onclick='getmoji("emoji_393")'>👨🏻‍💼</span>
<span id='emoji_394' onclick='getmoji("emoji_394")'>👩🏻‍🔧</span>
<span id='emoji_395' onclick='getmoji("emoji_395")'>👨🏻‍🔧</span>
<span id='emoji_396' onclick='getmoji("emoji_396")'>👩🏻‍🔬</span>
<span id='emoji_397' onclick='getmoji("emoji_397")'>👨🏻‍🔬</span>
<span id='emoji_398' onclick='getmoji("emoji_398")'>👩🏻‍🎨</span>
<span id='emoji_399' onclick='getmoji("emoji_399")'>👨🏻‍🎨</span>
<span id='emoji_400' onclick='getmoji("emoji_400")'>👩🏻‍🚒</span>
<span id='emoji_401' onclick='getmoji("emoji_401")'>👨🏻‍🚒</span>
<span id='emoji_402' onclick='getmoji("emoji_402")'>👩🏻‍✈️</span>
<span id='emoji_403' onclick='getmoji("emoji_403")'>👨🏻‍✈️</span>
<span id='emoji_404' onclick='getmoji("emoji_404")'>👩🏻‍🚀</span>
<span id='emoji_405' onclick='getmoji("emoji_405")'>👨🏻‍🚀</span>
<span id='emoji_406' onclick='getmoji("emoji_406")'>👩🏻‍⚖️</span>
<span id='emoji_407' onclick='getmoji("emoji_407")'>👨🏻‍⚖️</span>
<span id='emoji_408' onclick='getmoji("emoji_408")'>🤶🏻</span>
<span id='emoji_409' onclick='getmoji("emoji_409")'>🎅🏻</span>
<span id='emoji_410' onclick='getmoji("emoji_410")'>👸🏻</span>
<span id='emoji_411' onclick='getmoji("emoji_411")'>🤴🏻</span>
<span id='emoji_412' onclick='getmoji("emoji_412")'>👰🏻</span>
<span id='emoji_413' onclick='getmoji("emoji_413")'>🤵🏻</span>
<span id='emoji_414' onclick='getmoji("emoji_414")'>👼🏻</span>
<span id='emoji_415' onclick='getmoji("emoji_415")'>🤰🏻</span>
<span id='emoji_416' onclick='getmoji("emoji_416")'>🙇🏻‍♀️</span>
<span id='emoji_417' onclick='getmoji("emoji_417")'>🙇🏻</span>
<span id='emoji_418' onclick='getmoji("emoji_418")'>💁🏻</span>
<span id='emoji_419' onclick='getmoji("emoji_419")'>💁🏻‍♂️</span>
<span id='emoji_420' onclick='getmoji("emoji_420")'>🙅🏻</span>
<span id='emoji_421' onclick='getmoji("emoji_421")'>🙅🏻‍♂️</span>
<span id='emoji_422' onclick='getmoji("emoji_422")'>🙆🏻</span>
<span id='emoji_423' onclick='getmoji("emoji_423")'>🙆🏻‍♂️</span>
<span id='emoji_424' onclick='getmoji("emoji_424")'>🙋🏻</span>
<span id='emoji_425' onclick='getmoji("emoji_425")'>🙋🏻‍♂️</span>
<span id='emoji_426' onclick='getmoji("emoji_426")'>🤦🏻‍♀️</span>
<span id='emoji_427' onclick='getmoji("emoji_427")'>🤦🏻‍♂️</span>
<span id='emoji_428' onclick='getmoji("emoji_428")'>🤷🏻‍♀️</span>
<span id='emoji_429' onclick='getmoji("emoji_429")'>🤷🏻‍♂️</span>
<span id='emoji_430' onclick='getmoji("emoji_430")'>🙎🏻</span>
<span id='emoji_431' onclick='getmoji("emoji_431")'>🙎🏻‍♂️</span>
<span id='emoji_432' onclick='getmoji("emoji_432")'>🙍🏻</span>
<span id='emoji_433' onclick='getmoji("emoji_433")'>🙍🏻‍♂️</span>
<span id='emoji_434' onclick='getmoji("emoji_434")'>💇🏻</span>
<span id='emoji_435' onclick='getmoji("emoji_435")'>💇🏻‍♂️</span>
<span id='emoji_436' onclick='getmoji("emoji_436")'>💆🏻</span>
<span id='emoji_437' onclick='getmoji("emoji_437")'>💆🏻‍♂️</span>
<span id='emoji_438' onclick='getmoji("emoji_438")'>🕴🏻</span>
<span id='emoji_439' onclick='getmoji("emoji_439")'>💃🏻</span>
<span id='emoji_440' onclick='getmoji("emoji_440")'>🕺🏻</span>
<span id='emoji_441' onclick='getmoji("emoji_441")'>🚶🏻‍♀️</span>
<span id='emoji_442' onclick='getmoji("emoji_442")'>🚶🏻</span>
<span id='emoji_443' onclick='getmoji("emoji_443")'>🏃🏻‍♀️</span>
<span id='emoji_444' onclick='getmoji("emoji_444")'>🏃🏻</span>
<span id='emoji_445' onclick='getmoji("emoji_445")'>🤲🏻</span>
<span id='emoji_446' onclick='getmoji("emoji_446")'>👐🏻</span>
<span id='emoji_447' onclick='getmoji("emoji_447")'>🙌🏻</span>
<span id='emoji_448' onclick='getmoji("emoji_448")'>👏🏻</span>
<span id='emoji_449' onclick='getmoji("emoji_449")'>🙏🏻</span>
<span id='emoji_450' onclick='getmoji("emoji_450")'>👍🏻</span>
<span id='emoji_451' onclick='getmoji("emoji_451")'>👎🏻</span>
<span id='emoji_452' onclick='getmoji("emoji_452")'>👊🏻</span>
<span id='emoji_453' onclick='getmoji("emoji_453")'>✊🏻</span>
<span id='emoji_454' onclick='getmoji("emoji_454")'>🤛🏻</span>
<span id='emoji_455' onclick='getmoji("emoji_455")'>🤜🏻</span>
<span id='emoji_456' onclick='getmoji("emoji_456")'>🤞🏻</span>
<span id='emoji_457' onclick='getmoji("emoji_457")'>✌🏻</span>
<span id='emoji_458' onclick='getmoji("emoji_458")'>🤟🏻</span>
<span id='emoji_459' onclick='getmoji("emoji_459")'>🤘🏻</span>
<span id='emoji_460' onclick='getmoji("emoji_460")'>👌🏻</span>
<span id='emoji_461' onclick='getmoji("emoji_461")'>👈🏻</span>
<span id='emoji_462' onclick='getmoji("emoji_462")'>👉🏻</span>
<span id='emoji_463' onclick='getmoji("emoji_463")'>👆🏻</span>
<span id='emoji_464' onclick='getmoji("emoji_464")'>👇🏻</span>
<span id='emoji_465' onclick='getmoji("emoji_465")'>☝🏻</span>
<span id='emoji_466' onclick='getmoji("emoji_466")'>✋🏻</span>
<span id='emoji_467' onclick='getmoji("emoji_467")'>🤚🏻</span>
<span id='emoji_468' onclick='getmoji("emoji_468")'>🖐🏻</span>
<span id='emoji_469' onclick='getmoji("emoji_469")'>🖖🏻</span>
<span id='emoji_470' onclick='getmoji("emoji_470")'>👋🏻</span>
<span id='emoji_471' onclick='getmoji("emoji_471")'>🤙🏻</span>
<span id='emoji_472' onclick='getmoji("emoji_472")'>💪🏻</span>
<span id='emoji_473' onclick='getmoji("emoji_473")'>🖕🏻</span>
<span id='emoji_474' onclick='getmoji("emoji_474")'>✍🏻</span>
<span id='emoji_475' onclick='getmoji("emoji_475")'>🤳🏻</span>
<span id='emoji_476' onclick='getmoji("emoji_476")'>💅🏻</span>
<span id='emoji_477' onclick='getmoji("emoji_477")'>👂🏻</span>
<span id='emoji_478' onclick='getmoji("emoji_478")'>👃🏻</span>
<span id='emoji_479' onclick='getmoji("emoji_479")'></span>
<span id='emoji_480' onclick='getmoji("emoji_480")'>👶🏼</span>
<span id='emoji_481' onclick='getmoji("emoji_481")'>👦🏼</span>
<span id='emoji_482' onclick='getmoji("emoji_482")'>👧🏼</span>
<span id='emoji_483' onclick='getmoji("emoji_483")'>👨🏼</span>
<span id='emoji_484' onclick='getmoji("emoji_484")'>👩🏼</span>
<span id='emoji_485' onclick='getmoji("emoji_485")'>👱🏼‍♀️</span>
<span id='emoji_486' onclick='getmoji("emoji_486")'>👱🏼</span>
<span id='emoji_487' onclick='getmoji("emoji_487")'>👴🏼</span>
<span id='emoji_488' onclick='getmoji("emoji_488")'>👵🏼</span>
<span id='emoji_489' onclick='getmoji("emoji_489")'>👲🏼</span>
<span id='emoji_490' onclick='getmoji("emoji_490")'>👳🏼‍♀️</span>
<span id='emoji_491' onclick='getmoji("emoji_491")'>👳🏼</span>
<span id='emoji_492' onclick='getmoji("emoji_492")'>👮🏼‍♀️</span>
<span id='emoji_493' onclick='getmoji("emoji_493")'>👮🏼</span>
<span id='emoji_494' onclick='getmoji("emoji_494")'>👷🏼‍♀️</span>
<span id='emoji_495' onclick='getmoji("emoji_495")'>👷🏼</span>
<span id='emoji_496' onclick='getmoji("emoji_496")'>💂🏼‍♀️</span>
<span id='emoji_497' onclick='getmoji("emoji_497")'>💂🏼</span>
<span id='emoji_498' onclick='getmoji("emoji_498")'>🕵🏼‍♀️</span>
<span id='emoji_499' onclick='getmoji("emoji_499")'>🕵🏼</span>
<span id='emoji_500' onclick='getmoji("emoji_500")'>👩🏼‍⚕️</span>
<span id='emoji_501' onclick='getmoji("emoji_501")'>👨🏼‍⚕️</span>
<span id='emoji_502' onclick='getmoji("emoji_502")'>👩🏼‍🌾</span>
<span id='emoji_503' onclick='getmoji("emoji_503")'>👨🏼‍🌾</span>
<span id='emoji_504' onclick='getmoji("emoji_504")'>👩🏼‍🍳</span>
<span id='emoji_505' onclick='getmoji("emoji_505")'>👨🏼‍🍳</span>
<span id='emoji_506' onclick='getmoji("emoji_506")'>👩🏼‍🎓</span>
<span id='emoji_507' onclick='getmoji("emoji_507")'>👨🏼‍🎓</span>
<span id='emoji_508' onclick='getmoji("emoji_508")'>👩🏼‍🎤</span>
<span id='emoji_509' onclick='getmoji("emoji_509")'>👨🏼‍🎤</span>
<span id='emoji_510' onclick='getmoji("emoji_510")'>👩🏼‍🏫</span>
<span id='emoji_511' onclick='getmoji("emoji_511")'>👨🏼‍🏫</span>
<span id='emoji_512' onclick='getmoji("emoji_512")'>👩🏼‍🏭</span>
<span id='emoji_513' onclick='getmoji("emoji_513")'>👨🏼‍🏭</span>
<span id='emoji_514' onclick='getmoji("emoji_514")'>👩🏼‍💻</span>
<span id='emoji_515' onclick='getmoji("emoji_515")'>👨🏼‍💻</span>
<span id='emoji_516' onclick='getmoji("emoji_516")'>👩🏼‍💼</span>
<span id='emoji_517' onclick='getmoji("emoji_517")'>👨🏼‍💼</span>
<span id='emoji_518' onclick='getmoji("emoji_518")'>👩🏼‍🔧</span>
<span id='emoji_519' onclick='getmoji("emoji_519")'>👨🏼‍🔧</span>
<span id='emoji_520' onclick='getmoji("emoji_520")'>👩🏼‍🔬</span>
<span id='emoji_521' onclick='getmoji("emoji_521")'>👨🏼‍🔬</span>
<span id='emoji_522' onclick='getmoji("emoji_522")'>👩🏼‍🎨</span>
<span id='emoji_523' onclick='getmoji("emoji_523")'>👨🏼‍🎨</span>
<span id='emoji_524' onclick='getmoji("emoji_524")'>👩🏼‍🚒</span>
<span id='emoji_525' onclick='getmoji("emoji_525")'>👨🏼‍🚒</span>
<span id='emoji_526' onclick='getmoji("emoji_526")'>👩🏼‍✈️</span>
<span id='emoji_527' onclick='getmoji("emoji_527")'>👨🏼‍✈️</span>
<span id='emoji_528' onclick='getmoji("emoji_528")'>👩🏼‍🚀</span>
<span id='emoji_529' onclick='getmoji("emoji_529")'>👨🏼‍🚀</span>
<span id='emoji_530' onclick='getmoji("emoji_530")'>👩🏼‍⚖️</span>
<span id='emoji_531' onclick='getmoji("emoji_531")'>👨🏼‍⚖️</span>
<span id='emoji_532' onclick='getmoji("emoji_532")'>🤶🏼</span>
<span id='emoji_533' onclick='getmoji("emoji_533")'>🎅🏼</span>
<span id='emoji_534' onclick='getmoji("emoji_534")'>👸🏼</span>
<span id='emoji_535' onclick='getmoji("emoji_535")'>🤴🏼</span>
<span id='emoji_536' onclick='getmoji("emoji_536")'>👰🏼</span>
<span id='emoji_537' onclick='getmoji("emoji_537")'>🤵🏼</span>
<span id='emoji_538' onclick='getmoji("emoji_538")'>👼🏼</span>
<span id='emoji_539' onclick='getmoji("emoji_539")'>🤰🏼</span>
<span id='emoji_540' onclick='getmoji("emoji_540")'>🙇🏼‍♀️</span>
<span id='emoji_541' onclick='getmoji("emoji_541")'>🙇🏼</span>
<span id='emoji_542' onclick='getmoji("emoji_542")'>💁🏼</span>
<span id='emoji_543' onclick='getmoji("emoji_543")'>💁🏼‍♂️</span>
<span id='emoji_544' onclick='getmoji("emoji_544")'>🙅🏼</span>
<span id='emoji_545' onclick='getmoji("emoji_545")'>🙅🏼‍♂️</span>
<span id='emoji_546' onclick='getmoji("emoji_546")'>🙆🏼</span>
<span id='emoji_547' onclick='getmoji("emoji_547")'>🙆🏼‍♂️</span>
<span id='emoji_548' onclick='getmoji("emoji_548")'>🙋🏼</span>
<span id='emoji_549' onclick='getmoji("emoji_549")'>🙋🏼‍♂️</span>
<span id='emoji_550' onclick='getmoji("emoji_550")'>🤦🏼‍♀️</span>
<span id='emoji_551' onclick='getmoji("emoji_551")'>🤦🏼‍♂️</span>
<span id='emoji_552' onclick='getmoji("emoji_552")'>🤷🏼‍♀️</span>
<span id='emoji_553' onclick='getmoji("emoji_553")'>🤷🏼‍♂️</span>
<span id='emoji_554' onclick='getmoji("emoji_554")'>🙎🏼</span>
<span id='emoji_555' onclick='getmoji("emoji_555")'>🙎🏼‍♂️</span>
<span id='emoji_556' onclick='getmoji("emoji_556")'>🙍🏼</span>
<span id='emoji_557' onclick='getmoji("emoji_557")'>🙍🏼‍♂️</span>
<span id='emoji_558' onclick='getmoji("emoji_558")'>💇🏼</span>
<span id='emoji_559' onclick='getmoji("emoji_559")'>💇🏼‍♂️</span>
<span id='emoji_560' onclick='getmoji("emoji_560")'>💆🏼</span>
<span id='emoji_561' onclick='getmoji("emoji_561")'>💆🏼‍♂️</span>
<span id='emoji_562' onclick='getmoji("emoji_562")'>🕴🏼</span>
<span id='emoji_563' onclick='getmoji("emoji_563")'>💃🏼</span>
<span id='emoji_564' onclick='getmoji("emoji_564")'>🕺🏼</span>
<span id='emoji_565' onclick='getmoji("emoji_565")'>🚶🏼‍♀️</span>
<span id='emoji_566' onclick='getmoji("emoji_566")'>🚶🏼</span>
<span id='emoji_567' onclick='getmoji("emoji_567")'>🏃🏼‍♀️</span>
<span id='emoji_568' onclick='getmoji("emoji_568")'>🏃🏼</span>
<span id='emoji_569' onclick='getmoji("emoji_569")'>🤲🏼</span>
<span id='emoji_570' onclick='getmoji("emoji_570")'>👐🏼</span>
<span id='emoji_571' onclick='getmoji("emoji_571")'>🙌🏼</span>
<span id='emoji_572' onclick='getmoji("emoji_572")'>👏🏼</span>
<span id='emoji_573' onclick='getmoji("emoji_573")'>🙏🏼</span>
<span id='emoji_574' onclick='getmoji("emoji_574")'>👍🏼</span>
<span id='emoji_575' onclick='getmoji("emoji_575")'>👎🏼</span>
<span id='emoji_576' onclick='getmoji("emoji_576")'>👊🏼</span>
<span id='emoji_577' onclick='getmoji("emoji_577")'>✊🏼</span>
<span id='emoji_578' onclick='getmoji("emoji_578")'>🤛🏼</span>
<span id='emoji_579' onclick='getmoji("emoji_579")'>🤜🏼</span>
<span id='emoji_580' onclick='getmoji("emoji_580")'>🤞🏼</span>
<span id='emoji_581' onclick='getmoji("emoji_581")'>✌🏼</span>
<span id='emoji_582' onclick='getmoji("emoji_582")'>🤟🏼</span>
<span id='emoji_583' onclick='getmoji("emoji_583")'>🤘🏼</span>
<span id='emoji_584' onclick='getmoji("emoji_584")'>👌🏼</span>
<span id='emoji_585' onclick='getmoji("emoji_585")'>👈🏼</span>
<span id='emoji_586' onclick='getmoji("emoji_586")'>👉🏼</span>
<span id='emoji_587' onclick='getmoji("emoji_587")'>👆🏼</span>
<span id='emoji_588' onclick='getmoji("emoji_588")'>👇🏼</span>
<span id='emoji_589' onclick='getmoji("emoji_589")'>☝🏼</span>
<span id='emoji_590' onclick='getmoji("emoji_590")'>✋🏼</span>
<span id='emoji_591' onclick='getmoji("emoji_591")'>🤚🏼</span>
<span id='emoji_592' onclick='getmoji("emoji_592")'>🖐🏼</span>
<span id='emoji_593' onclick='getmoji("emoji_593")'>🖖🏼</span>
<span id='emoji_594' onclick='getmoji("emoji_594")'>👋🏼</span>
<span id='emoji_595' onclick='getmoji("emoji_595")'>🤙🏼</span>
<span id='emoji_596' onclick='getmoji("emoji_596")'>💪🏼</span>
<span id='emoji_597' onclick='getmoji("emoji_597")'>🖕🏼</span>
<span id='emoji_598' onclick='getmoji("emoji_598")'>✍🏼</span>
<span id='emoji_599' onclick='getmoji("emoji_599")'>🤳🏼</span>
<span id='emoji_600' onclick='getmoji("emoji_600")'>💅🏼</span>
<span id='emoji_601' onclick='getmoji("emoji_601")'>👂🏼</span>
<span id='emoji_602' onclick='getmoji("emoji_602")'>👃🏼</span>
<span id='emoji_603' onclick='getmoji("emoji_603")'></span>
<span id='emoji_604' onclick='getmoji("emoji_604")'>👶🏽</span>
<span id='emoji_605' onclick='getmoji("emoji_605")'>👦🏽</span>
<span id='emoji_606' onclick='getmoji("emoji_606")'>👧🏽</span>
<span id='emoji_607' onclick='getmoji("emoji_607")'>👨🏽</span>
<span id='emoji_608' onclick='getmoji("emoji_608")'>👩🏽</span>
<span id='emoji_609' onclick='getmoji("emoji_609")'>👱🏽‍♀️</span>
<span id='emoji_610' onclick='getmoji("emoji_610")'>👱🏽</span>
<span id='emoji_611' onclick='getmoji("emoji_611")'>👴🏽</span>
<span id='emoji_612' onclick='getmoji("emoji_612")'>👵🏽</span>
<span id='emoji_613' onclick='getmoji("emoji_613")'>👲🏽</span>
<span id='emoji_614' onclick='getmoji("emoji_614")'>👳🏽‍♀️</span>
<span id='emoji_615' onclick='getmoji("emoji_615")'>👳🏽</span>
<span id='emoji_616' onclick='getmoji("emoji_616")'>👮🏽‍♀️</span>
<span id='emoji_617' onclick='getmoji("emoji_617")'>👮🏽</span>
<span id='emoji_618' onclick='getmoji("emoji_618")'>👷🏽‍♀️</span>
<span id='emoji_619' onclick='getmoji("emoji_619")'>👷🏽</span>
<span id='emoji_620' onclick='getmoji("emoji_620")'>💂🏽‍♀️</span>
<span id='emoji_621' onclick='getmoji("emoji_621")'>💂🏽</span>
<span id='emoji_622' onclick='getmoji("emoji_622")'>🕵🏽‍♀️</span>
<span id='emoji_623' onclick='getmoji("emoji_623")'>🕵🏽</span>
<span id='emoji_624' onclick='getmoji("emoji_624")'>👩🏽‍⚕️</span>
<span id='emoji_625' onclick='getmoji("emoji_625")'>👨🏽‍⚕️</span>
<span id='emoji_626' onclick='getmoji("emoji_626")'>👩🏽‍🌾</span>
<span id='emoji_627' onclick='getmoji("emoji_627")'>👨🏽‍🌾</span>
<span id='emoji_628' onclick='getmoji("emoji_628")'>👩🏽‍🍳</span>
<span id='emoji_629' onclick='getmoji("emoji_629")'>👨🏽‍🍳</span>
<span id='emoji_630' onclick='getmoji("emoji_630")'>👩🏽‍🎓</span>
<span id='emoji_631' onclick='getmoji("emoji_631")'>👨🏽‍🎓</span>
<span id='emoji_632' onclick='getmoji("emoji_632")'>👩🏽‍🎤</span>
<span id='emoji_633' onclick='getmoji("emoji_633")'>👨🏽‍🎤</span>
<span id='emoji_634' onclick='getmoji("emoji_634")'>👩🏽‍🏫</span>
<span id='emoji_635' onclick='getmoji("emoji_635")'>👨🏽‍🏫</span>
<span id='emoji_636' onclick='getmoji("emoji_636")'>👩🏽‍🏭</span>
<span id='emoji_637' onclick='getmoji("emoji_637")'>👨🏽‍🏭</span>
<span id='emoji_638' onclick='getmoji("emoji_638")'>👩🏽‍💻</span>
<span id='emoji_639' onclick='getmoji("emoji_639")'>👨🏽‍💻</span>
<span id='emoji_640' onclick='getmoji("emoji_640")'>👩🏽‍💼</span>
<span id='emoji_641' onclick='getmoji("emoji_641")'>👨🏽‍💼</span>
<span id='emoji_642' onclick='getmoji("emoji_642")'>👩🏽‍🔧</span>
<span id='emoji_643' onclick='getmoji("emoji_643")'>👨🏽‍🔧</span>
<span id='emoji_644' onclick='getmoji("emoji_644")'>👩🏽‍🔬</span>
<span id='emoji_645' onclick='getmoji("emoji_645")'>👨🏽‍🔬</span>
<span id='emoji_646' onclick='getmoji("emoji_646")'>👩🏽‍🎨</span>
<span id='emoji_647' onclick='getmoji("emoji_647")'>👨🏽‍🎨</span>
<span id='emoji_648' onclick='getmoji("emoji_648")'>👩🏽‍🚒</span>
<span id='emoji_649' onclick='getmoji("emoji_649")'>👨🏽‍🚒</span>
<span id='emoji_650' onclick='getmoji("emoji_650")'>👩🏽‍✈️</span>
<span id='emoji_651' onclick='getmoji("emoji_651")'>👨🏽‍✈️</span>
<span id='emoji_652' onclick='getmoji("emoji_652")'>👩🏽‍🚀</span>
<span id='emoji_653' onclick='getmoji("emoji_653")'>👨🏽‍🚀</span>
<span id='emoji_654' onclick='getmoji("emoji_654")'>👩🏽‍⚖️</span>
<span id='emoji_655' onclick='getmoji("emoji_655")'>👨🏽‍⚖️</span>
<span id='emoji_656' onclick='getmoji("emoji_656")'>🤶🏽</span>
<span id='emoji_657' onclick='getmoji("emoji_657")'>🎅🏽</span>
<span id='emoji_658' onclick='getmoji("emoji_658")'>👸🏽</span>
<span id='emoji_659' onclick='getmoji("emoji_659")'>🤴🏽</span>
<span id='emoji_660' onclick='getmoji("emoji_660")'>👰🏽</span>
<span id='emoji_661' onclick='getmoji("emoji_661")'>🤵🏽</span>
<span id='emoji_662' onclick='getmoji("emoji_662")'>👼🏽</span>
<span id='emoji_663' onclick='getmoji("emoji_663")'>🤰🏽</span>
<span id='emoji_664' onclick='getmoji("emoji_664")'>🙇🏽‍♀️</span>
<span id='emoji_665' onclick='getmoji("emoji_665")'>🙇🏽</span>
<span id='emoji_666' onclick='getmoji("emoji_666")'>💁🏽</span>
<span id='emoji_667' onclick='getmoji("emoji_667")'>💁🏽‍♂️</span>
<span id='emoji_668' onclick='getmoji("emoji_668")'>🙅🏽</span>
<span id='emoji_669' onclick='getmoji("emoji_669")'>🙅🏽‍♂️</span>
<span id='emoji_670' onclick='getmoji("emoji_670")'>🙆🏽</span>
<span id='emoji_671' onclick='getmoji("emoji_671")'>🙆🏽‍♂️</span>
<span id='emoji_672' onclick='getmoji("emoji_672")'>🙋🏽</span>
<span id='emoji_673' onclick='getmoji("emoji_673")'>🙋🏽‍♂️</span>
<span id='emoji_674' onclick='getmoji("emoji_674")'>🤦🏽‍♀️</span>
<span id='emoji_675' onclick='getmoji("emoji_675")'>🤦🏽‍♂️</span>
<span id='emoji_676' onclick='getmoji("emoji_676")'>🤷🏽‍♀️</span>
<span id='emoji_677' onclick='getmoji("emoji_677")'>🤷🏽‍♂️</span>
<span id='emoji_678' onclick='getmoji("emoji_678")'>🙎🏽</span>
<span id='emoji_679' onclick='getmoji("emoji_679")'>🙎🏽‍♂️</span>
<span id='emoji_680' onclick='getmoji("emoji_680")'>🙍🏽</span>
<span id='emoji_681' onclick='getmoji("emoji_681")'>🙍🏽‍♂️</span>
<span id='emoji_682' onclick='getmoji("emoji_682")'>💇🏽</span>
<span id='emoji_683' onclick='getmoji("emoji_683")'>💇🏽‍♂️</span>
<span id='emoji_684' onclick='getmoji("emoji_684")'>💆🏽</span>
<span id='emoji_685' onclick='getmoji("emoji_685")'>💆🏽‍♂️</span>
<span id='emoji_686' onclick='getmoji("emoji_686")'>🕴🏼</span>
<span id='emoji_687' onclick='getmoji("emoji_687")'>💃🏽</span>
<span id='emoji_688' onclick='getmoji("emoji_688")'>🕺🏽</span>
<span id='emoji_689' onclick='getmoji("emoji_689")'>🚶🏽‍♀️</span>
<span id='emoji_690' onclick='getmoji("emoji_690")'>🚶🏽</span>
<span id='emoji_691' onclick='getmoji("emoji_691")'>🏃🏽‍♀️</span>
<span id='emoji_692' onclick='getmoji("emoji_692")'>🏃🏽</span>
<span id='emoji_693' onclick='getmoji("emoji_693")'>🤲🏽</span>
<span id='emoji_694' onclick='getmoji("emoji_694")'>👐🏽</span>
<span id='emoji_695' onclick='getmoji("emoji_695")'>🙌🏽</span>
<span id='emoji_696' onclick='getmoji("emoji_696")'>👏🏽</span>
<span id='emoji_697' onclick='getmoji("emoji_697")'>🙏🏽</span>
<span id='emoji_698' onclick='getmoji("emoji_698")'>👍🏽</span>
<span id='emoji_699' onclick='getmoji("emoji_699")'>👎🏽</span>
<span id='emoji_700' onclick='getmoji("emoji_700")'>👊🏽</span>
<span id='emoji_701' onclick='getmoji("emoji_701")'>✊🏽</span>
<span id='emoji_702' onclick='getmoji("emoji_702")'>🤛🏽</span>
<span id='emoji_703' onclick='getmoji("emoji_703")'>🤜🏽</span>
<span id='emoji_704' onclick='getmoji("emoji_704")'>🤞🏽</span>
<span id='emoji_705' onclick='getmoji("emoji_705")'>✌🏽</span>
<span id='emoji_706' onclick='getmoji("emoji_706")'>🤟🏽</span>
<span id='emoji_707' onclick='getmoji("emoji_707")'>🤘🏽</span>
<span id='emoji_708' onclick='getmoji("emoji_708")'>👌🏽</span>
<span id='emoji_709' onclick='getmoji("emoji_709")'>👈🏽</span>
<span id='emoji_710' onclick='getmoji("emoji_710")'>👉🏽</span>
<span id='emoji_711' onclick='getmoji("emoji_711")'>👆🏽</span>
<span id='emoji_712' onclick='getmoji("emoji_712")'>👇🏽</span>
<span id='emoji_713' onclick='getmoji("emoji_713")'>☝🏽</span>
<span id='emoji_714' onclick='getmoji("emoji_714")'>✋🏽</span>
<span id='emoji_715' onclick='getmoji("emoji_715")'>🤚🏽</span>
<span id='emoji_716' onclick='getmoji("emoji_716")'>🖐🏽</span>
<span id='emoji_717' onclick='getmoji("emoji_717")'>🖖🏽</span>
<span id='emoji_718' onclick='getmoji("emoji_718")'>👋🏽</span>
<span id='emoji_719' onclick='getmoji("emoji_719")'>🤙🏽</span>
<span id='emoji_720' onclick='getmoji("emoji_720")'>💪🏽</span>
<span id='emoji_721' onclick='getmoji("emoji_721")'>🖕🏽</span>
<span id='emoji_722' onclick='getmoji("emoji_722")'>✍🏽</span>
<span id='emoji_723' onclick='getmoji("emoji_723")'>🤳🏽</span>
<span id='emoji_724' onclick='getmoji("emoji_724")'>💅🏽</span>
<span id='emoji_725' onclick='getmoji("emoji_725")'>👂🏽</span>
<span id='emoji_726' onclick='getmoji("emoji_726")'>👃🏽</span>
<span id='emoji_727' onclick='getmoji("emoji_727")'></span>
<span id='emoji_728' onclick='getmoji("emoji_728")'>👶🏾</span>
<span id='emoji_729' onclick='getmoji("emoji_729")'>👦🏾</span>
<span id='emoji_730' onclick='getmoji("emoji_730")'>👧🏾</span>
<span id='emoji_731' onclick='getmoji("emoji_731")'>👨🏾</span>
<span id='emoji_732' onclick='getmoji("emoji_732")'>👩🏾</span>
<span id='emoji_733' onclick='getmoji("emoji_733")'>👱🏾‍♀️</span>
<span id='emoji_734' onclick='getmoji("emoji_734")'>👱🏾</span>
<span id='emoji_735' onclick='getmoji("emoji_735")'>👴🏾</span>
<span id='emoji_736' onclick='getmoji("emoji_736")'>👵🏾</span>
<span id='emoji_737' onclick='getmoji("emoji_737")'>👲🏾</span>
<span id='emoji_738' onclick='getmoji("emoji_738")'>👳🏾‍♀️</span>
<span id='emoji_739' onclick='getmoji("emoji_739")'>👳🏾</span>
<span id='emoji_740' onclick='getmoji("emoji_740")'>👮🏾‍♀️</span>
<span id='emoji_741' onclick='getmoji("emoji_741")'>👮🏾</span>
<span id='emoji_742' onclick='getmoji("emoji_742")'>👷🏾‍♀️</span>
<span id='emoji_743' onclick='getmoji("emoji_743")'>👷🏾</span>
<span id='emoji_744' onclick='getmoji("emoji_744")'>💂🏾‍♀️</span>
<span id='emoji_745' onclick='getmoji("emoji_745")'>💂🏾</span>
<span id='emoji_746' onclick='getmoji("emoji_746")'>🕵🏾‍♀️</span>
<span id='emoji_747' onclick='getmoji("emoji_747")'>🕵🏾</span>
<span id='emoji_748' onclick='getmoji("emoji_748")'>👩🏾‍⚕️</span>
<span id='emoji_749' onclick='getmoji("emoji_749")'>👨🏾‍⚕️</span>
<span id='emoji_750' onclick='getmoji("emoji_750")'>👩🏾‍🌾</span>
<span id='emoji_751' onclick='getmoji("emoji_751")'>👨🏾‍🌾</span>
<span id='emoji_752' onclick='getmoji("emoji_752")'>👩🏾‍🍳</span>
<span id='emoji_753' onclick='getmoji("emoji_753")'>👨🏾‍🍳</span>
<span id='emoji_754' onclick='getmoji("emoji_754")'>👩🏾‍🎓</span>
<span id='emoji_755' onclick='getmoji("emoji_755")'>👨🏾‍🎓</span>
<span id='emoji_756' onclick='getmoji("emoji_756")'>👩🏾‍🎤</span>
<span id='emoji_757' onclick='getmoji("emoji_757")'>👨🏾‍🎤</span>
<span id='emoji_758' onclick='getmoji("emoji_758")'>👩🏾‍🏫</span>
<span id='emoji_759' onclick='getmoji("emoji_759")'>👨🏾‍🏫</span>
<span id='emoji_760' onclick='getmoji("emoji_760")'>👩🏾‍🏭</span>
<span id='emoji_761' onclick='getmoji("emoji_761")'>👨🏾‍🏭</span>
<span id='emoji_762' onclick='getmoji("emoji_762")'>👩🏾‍💻</span>
<span id='emoji_763' onclick='getmoji("emoji_763")'>👨🏾‍💻</span>
<span id='emoji_764' onclick='getmoji("emoji_764")'>👩🏾‍💼</span>
<span id='emoji_765' onclick='getmoji("emoji_765")'>👨🏾‍💼</span>
<span id='emoji_766' onclick='getmoji("emoji_766")'>👩🏾‍🔧</span>
<span id='emoji_767' onclick='getmoji("emoji_767")'>👨🏾‍🔧</span>
<span id='emoji_768' onclick='getmoji("emoji_768")'>👩🏾‍🔬</span>
<span id='emoji_769' onclick='getmoji("emoji_769")'>👨🏾‍🔬</span>
<span id='emoji_770' onclick='getmoji("emoji_770")'>👩🏾‍🎨</span>
<span id='emoji_771' onclick='getmoji("emoji_771")'>👨🏾‍🎨</span>
<span id='emoji_772' onclick='getmoji("emoji_772")'>👩🏾‍🚒</span>
<span id='emoji_773' onclick='getmoji("emoji_773")'>👨🏾‍🚒</span>
<span id='emoji_774' onclick='getmoji("emoji_774")'>👩🏾‍✈️</span>
<span id='emoji_775' onclick='getmoji("emoji_775")'>👨🏾‍✈️</span>
<span id='emoji_776' onclick='getmoji("emoji_776")'>👩🏾‍🚀</span>
<span id='emoji_777' onclick='getmoji("emoji_777")'>👨🏾‍🚀</span>
<span id='emoji_778' onclick='getmoji("emoji_778")'>👩🏾‍⚖️</span>
<span id='emoji_779' onclick='getmoji("emoji_779")'>👨🏾‍⚖️</span>
<span id='emoji_780' onclick='getmoji("emoji_780")'>🤶🏾</span>
<span id='emoji_781' onclick='getmoji("emoji_781")'>🎅🏾</span>
<span id='emoji_782' onclick='getmoji("emoji_782")'>👸🏾</span>
<span id='emoji_783' onclick='getmoji("emoji_783")'>🤴🏾</span>
<span id='emoji_784' onclick='getmoji("emoji_784")'>👰🏾</span>
<span id='emoji_785' onclick='getmoji("emoji_785")'>🤵🏾</span>
<span id='emoji_786' onclick='getmoji("emoji_786")'>👼🏾</span>
<span id='emoji_787' onclick='getmoji("emoji_787")'>🤰🏾</span>
<span id='emoji_788' onclick='getmoji("emoji_788")'>🙇🏾‍♀️</span>
<span id='emoji_789' onclick='getmoji("emoji_789")'>🙇🏾</span>
<span id='emoji_790' onclick='getmoji("emoji_790")'>💁🏾</span>
<span id='emoji_791' onclick='getmoji("emoji_791")'>💁🏾‍♂️</span>
<span id='emoji_792' onclick='getmoji("emoji_792")'>🙅🏾</span>
<span id='emoji_793' onclick='getmoji("emoji_793")'>🙅🏾‍♂️</span>
<span id='emoji_794' onclick='getmoji("emoji_794")'>🙆🏾</span>
<span id='emoji_795' onclick='getmoji("emoji_795")'>🙆🏾‍♂️</span>
<span id='emoji_796' onclick='getmoji("emoji_796")'>🙋🏾</span>
<span id='emoji_797' onclick='getmoji("emoji_797")'>🙋🏾‍♂️</span>
<span id='emoji_798' onclick='getmoji("emoji_798")'>🤦🏾‍♀️</span>
<span id='emoji_799' onclick='getmoji("emoji_799")'>🤦🏾‍♂️</span>
<span id='emoji_800' onclick='getmoji("emoji_800")'>🤷🏾‍♀️</span>
<span id='emoji_801' onclick='getmoji("emoji_801")'>🤷🏾‍♂️</span>
<span id='emoji_802' onclick='getmoji("emoji_802")'>🙎🏾</span>
<span id='emoji_803' onclick='getmoji("emoji_803")'>🙎🏾‍♂️</span>
<span id='emoji_804' onclick='getmoji("emoji_804")'>🙍🏾</span>
<span id='emoji_805' onclick='getmoji("emoji_805")'>🙍🏾‍♂️</span>
<span id='emoji_806' onclick='getmoji("emoji_806")'>💇🏾</span>
<span id='emoji_807' onclick='getmoji("emoji_807")'>💇🏾‍♂️</span>
<span id='emoji_808' onclick='getmoji("emoji_808")'>💆🏾</span>
<span id='emoji_809' onclick='getmoji("emoji_809")'>💆🏾‍♂️</span>
<span id='emoji_810' onclick='getmoji("emoji_810")'>🕴🏾</span>
<span id='emoji_811' onclick='getmoji("emoji_811")'>💃🏾</span>
<span id='emoji_812' onclick='getmoji("emoji_812")'>🕺🏾</span>
<span id='emoji_813' onclick='getmoji("emoji_813")'>🚶🏾‍♀️</span>
<span id='emoji_814' onclick='getmoji("emoji_814")'>🚶🏾</span>
<span id='emoji_815' onclick='getmoji("emoji_815")'>🏃🏾‍♀️</span>
<span id='emoji_816' onclick='getmoji("emoji_816")'>🏃🏾</span>
<span id='emoji_817' onclick='getmoji("emoji_817")'>🤲🏾</span>
<span id='emoji_818' onclick='getmoji("emoji_818")'>👐🏾</span>
<span id='emoji_819' onclick='getmoji("emoji_819")'>🙌🏾</span>
<span id='emoji_820' onclick='getmoji("emoji_820")'>👏🏾</span>
<span id='emoji_821' onclick='getmoji("emoji_821")'>🙏🏾</span>
<span id='emoji_822' onclick='getmoji("emoji_822")'>👍🏾</span>
<span id='emoji_823' onclick='getmoji("emoji_823")'>👎🏾</span>
<span id='emoji_824' onclick='getmoji("emoji_824")'>👊🏾</span>
<span id='emoji_825' onclick='getmoji("emoji_825")'>✊🏾</span>
<span id='emoji_826' onclick='getmoji("emoji_826")'>🤛🏾</span>
<span id='emoji_827' onclick='getmoji("emoji_827")'>🤜🏾</span>
<span id='emoji_828' onclick='getmoji("emoji_828")'>🤞🏾</span>
<span id='emoji_829' onclick='getmoji("emoji_829")'>✌🏾</span>
<span id='emoji_830' onclick='getmoji("emoji_830")'>🤟🏾</span>
<span id='emoji_831' onclick='getmoji("emoji_831")'>🤘🏾</span>
<span id='emoji_832' onclick='getmoji("emoji_832")'>👌🏾</span>
<span id='emoji_833' onclick='getmoji("emoji_833")'>👈🏾</span>
<span id='emoji_834' onclick='getmoji("emoji_834")'>👉🏾</span>
<span id='emoji_835' onclick='getmoji("emoji_835")'>👆🏾</span>
<span id='emoji_836' onclick='getmoji("emoji_836")'>👇🏾</span>
<span id='emoji_837' onclick='getmoji("emoji_837")'>☝🏾</span>
<span id='emoji_838' onclick='getmoji("emoji_838")'>✋🏾</span>
<span id='emoji_839' onclick='getmoji("emoji_839")'>🤚🏾</span>
<span id='emoji_840' onclick='getmoji("emoji_840")'>🖐🏾</span>
<span id='emoji_841' onclick='getmoji("emoji_841")'>🖖🏾</span>
<span id='emoji_842' onclick='getmoji("emoji_842")'>👋🏾</span>
<span id='emoji_843' onclick='getmoji("emoji_843")'>🤙🏾</span>
<span id='emoji_844' onclick='getmoji("emoji_844")'>💪🏾</span>
<span id='emoji_845' onclick='getmoji("emoji_845")'>🖕🏾</span>
<span id='emoji_846' onclick='getmoji("emoji_846")'>✍🏾</span>
<span id='emoji_847' onclick='getmoji("emoji_847")'>🤳🏾</span>
<span id='emoji_848' onclick='getmoji("emoji_848")'>💅🏾</span>
<span id='emoji_849' onclick='getmoji("emoji_849")'>👂🏾</span>
<span id='emoji_850' onclick='getmoji("emoji_850")'>👃🏾</span>
<span id='emoji_851' onclick='getmoji("emoji_851")'></span>
<span id='emoji_852' onclick='getmoji("emoji_852")'>👶🏿</span>
<span id='emoji_853' onclick='getmoji("emoji_853")'>👦🏿</span>
<span id='emoji_854' onclick='getmoji("emoji_854")'>👧🏿</span>
<span id='emoji_855' onclick='getmoji("emoji_855")'>👨🏿</span>
<span id='emoji_856' onclick='getmoji("emoji_856")'>👩🏿</span>
<span id='emoji_857' onclick='getmoji("emoji_857")'>👱🏿‍♀️</span>
<span id='emoji_858' onclick='getmoji("emoji_858")'>👱🏿</span>
<span id='emoji_859' onclick='getmoji("emoji_859")'>👴🏿</span>
<span id='emoji_860' onclick='getmoji("emoji_860")'>👵🏿</span>
<span id='emoji_861' onclick='getmoji("emoji_861")'>👲🏿</span>
<span id='emoji_862' onclick='getmoji("emoji_862")'>👳🏿‍♀️</span>
<span id='emoji_863' onclick='getmoji("emoji_863")'>👳🏿</span>
<span id='emoji_864' onclick='getmoji("emoji_864")'>👮🏿‍♀️</span>
<span id='emoji_865' onclick='getmoji("emoji_865")'>👮🏿</span>
<span id='emoji_866' onclick='getmoji("emoji_866")'>👷🏿‍♀️</span>
<span id='emoji_867' onclick='getmoji("emoji_867")'>👷🏿</span>
<span id='emoji_868' onclick='getmoji("emoji_868")'>💂🏿‍♀️</span>
<span id='emoji_869' onclick='getmoji("emoji_869")'>💂🏿</span>
<span id='emoji_870' onclick='getmoji("emoji_870")'>🕵🏿‍♀️</span>
<span id='emoji_871' onclick='getmoji("emoji_871")'>🕵🏿</span>
<span id='emoji_872' onclick='getmoji("emoji_872")'>👩🏿‍⚕️</span>
<span id='emoji_873' onclick='getmoji("emoji_873")'>👨🏿‍⚕️</span>
<span id='emoji_874' onclick='getmoji("emoji_874")'>👩🏿‍🌾</span>
<span id='emoji_875' onclick='getmoji("emoji_875")'>👨🏿‍🌾</span>
<span id='emoji_876' onclick='getmoji("emoji_876")'>👩🏿‍🍳</span>
<span id='emoji_877' onclick='getmoji("emoji_877")'>👨🏿‍🍳</span>
<span id='emoji_878' onclick='getmoji("emoji_878")'>👩🏿‍🎓</span>
<span id='emoji_879' onclick='getmoji("emoji_879")'>👨🏿‍🎓</span>
<span id='emoji_880' onclick='getmoji("emoji_880")'>👩🏿‍🎤</span>
<span id='emoji_881' onclick='getmoji("emoji_881")'>👨🏿‍🎤</span>
<span id='emoji_882' onclick='getmoji("emoji_882")'>👩🏿‍🏫</span>
<span id='emoji_883' onclick='getmoji("emoji_883")'>👨🏿‍🏫</span>
<span id='emoji_884' onclick='getmoji("emoji_884")'>👩🏿‍🏭</span>
<span id='emoji_885' onclick='getmoji("emoji_885")'>👨🏿‍🏭</span>
<span id='emoji_886' onclick='getmoji("emoji_886")'>👩🏿‍💻</span>
<span id='emoji_887' onclick='getmoji("emoji_887")'>👨🏿‍💻</span>
<span id='emoji_888' onclick='getmoji("emoji_888")'>👩🏿‍💼</span>
<span id='emoji_889' onclick='getmoji("emoji_889")'>👨🏿‍💼</span>
<span id='emoji_890' onclick='getmoji("emoji_890")'>👩🏿‍🔧</span>
<span id='emoji_891' onclick='getmoji("emoji_891")'>👨🏿‍🔧</span>
<span id='emoji_892' onclick='getmoji("emoji_892")'>👩🏿‍🔬</span>
<span id='emoji_893' onclick='getmoji("emoji_893")'>👨🏿‍🔬</span>
<span id='emoji_894' onclick='getmoji("emoji_894")'>👩🏿‍🎨</span>
<span id='emoji_895' onclick='getmoji("emoji_895")'>👨🏿‍🎨</span>
<span id='emoji_896' onclick='getmoji("emoji_896")'>👩🏿‍🚒</span>
<span id='emoji_897' onclick='getmoji("emoji_897")'>👨🏿‍🚒</span>
<span id='emoji_898' onclick='getmoji("emoji_898")'>👩🏿‍✈️</span>
<span id='emoji_899' onclick='getmoji("emoji_899")'>👨🏿‍✈️</span>
<span id='emoji_900' onclick='getmoji("emoji_900")'>👩🏿‍🚀</span>
<span id='emoji_901' onclick='getmoji("emoji_901")'>👨🏿‍🚀</span>
<span id='emoji_902' onclick='getmoji("emoji_902")'>👩🏿‍⚖️</span>
<span id='emoji_903' onclick='getmoji("emoji_903")'>👨🏿‍⚖️</span>
<span id='emoji_904' onclick='getmoji("emoji_904")'>🤶🏿</span>
<span id='emoji_905' onclick='getmoji("emoji_905")'>🎅🏿</span>
<span id='emoji_906' onclick='getmoji("emoji_906")'>👸🏿</span>
<span id='emoji_907' onclick='getmoji("emoji_907")'>🤴🏿</span>
<span id='emoji_908' onclick='getmoji("emoji_908")'>👰🏿</span>
<span id='emoji_909' onclick='getmoji("emoji_909")'>🤵🏿</span>
<span id='emoji_910' onclick='getmoji("emoji_910")'>👼🏿</span>
<span id='emoji_911' onclick='getmoji("emoji_911")'>🤰🏿</span>
<span id='emoji_912' onclick='getmoji("emoji_912")'>🙇🏿‍♀️</span>
<span id='emoji_913' onclick='getmoji("emoji_913")'>🙇🏿</span>
<span id='emoji_914' onclick='getmoji("emoji_914")'>💁🏿</span>
<span id='emoji_915' onclick='getmoji("emoji_915")'>💁🏿‍♂️</span>
<span id='emoji_916' onclick='getmoji("emoji_916")'>🙅🏿</span>
<span id='emoji_917' onclick='getmoji("emoji_917")'>🙅🏿‍♂️</span>
<span id='emoji_918' onclick='getmoji("emoji_918")'>🙆🏿</span>
<span id='emoji_919' onclick='getmoji("emoji_919")'>🙆🏿‍♂️</span>
<span id='emoji_920' onclick='getmoji("emoji_920")'>🙋🏿</span>
<span id='emoji_921' onclick='getmoji("emoji_921")'>🙋🏿‍♂️</span>
<span id='emoji_922' onclick='getmoji("emoji_922")'>🤦🏿‍♀️</span>
<span id='emoji_923' onclick='getmoji("emoji_923")'>🤦🏿‍♂️</span>
<span id='emoji_924' onclick='getmoji("emoji_924")'>🤷🏿‍♀️</span>
<span id='emoji_925' onclick='getmoji("emoji_925")'>🤷🏿‍♂️</span>
<span id='emoji_926' onclick='getmoji("emoji_926")'>🙎🏿</span>
<span id='emoji_927' onclick='getmoji("emoji_927")'>🙎🏿‍♂️</span>
<span id='emoji_928' onclick='getmoji("emoji_928")'>🙍🏿</span>
<span id='emoji_929' onclick='getmoji("emoji_929")'>🙍🏿‍♂️</span>
<span id='emoji_930' onclick='getmoji("emoji_930")'>💇🏿</span>
<span id='emoji_931' onclick='getmoji("emoji_931")'>💇🏿‍♂️</span>
<span id='emoji_932' onclick='getmoji("emoji_932")'>💆🏿</span>
<span id='emoji_933' onclick='getmoji("emoji_933")'>💆🏿‍♂️</span>
<span id='emoji_934' onclick='getmoji("emoji_934")'>🕴🏿</span>
<span id='emoji_935' onclick='getmoji("emoji_935")'>💃🏿</span>
<span id='emoji_936' onclick='getmoji("emoji_936")'>🕺🏿</span>
<span id='emoji_937' onclick='getmoji("emoji_937")'>🚶🏿‍♀️</span>
<span id='emoji_938' onclick='getmoji("emoji_938")'>🚶🏿</span>
<span id='emoji_939' onclick='getmoji("emoji_939")'>🏃🏿‍♀️</span>
<span id='emoji_940' onclick='getmoji("emoji_940")'>🏃🏿</span>
<span id='emoji_941' onclick='getmoji("emoji_941")'>🤲🏿</span>
<span id='emoji_942' onclick='getmoji("emoji_942")'>👐🏿</span>
<span id='emoji_943' onclick='getmoji("emoji_943")'>🙌🏿</span>
<span id='emoji_944' onclick='getmoji("emoji_944")'>👏🏿</span>
<span id='emoji_945' onclick='getmoji("emoji_945")'>🙏🏿</span>
<span id='emoji_946' onclick='getmoji("emoji_946")'>👍🏿</span>
<span id='emoji_947' onclick='getmoji("emoji_947")'>👎🏿</span>
<span id='emoji_948' onclick='getmoji("emoji_948")'>👊🏿</span>
<span id='emoji_949' onclick='getmoji("emoji_949")'>✊🏿</span>
<span id='emoji_950' onclick='getmoji("emoji_950")'>🤛🏿</span>
<span id='emoji_951' onclick='getmoji("emoji_951")'>🤜🏿</span>
<span id='emoji_952' onclick='getmoji("emoji_952")'>🤞🏿</span>
<span id='emoji_953' onclick='getmoji("emoji_953")'>✌🏿</span>
<span id='emoji_954' onclick='getmoji("emoji_954")'>🤟🏿</span>
<span id='emoji_955' onclick='getmoji("emoji_955")'>🤘🏿</span>
<span id='emoji_956' onclick='getmoji("emoji_956")'>👌🏿</span>
<span id='emoji_957' onclick='getmoji("emoji_957")'>👈🏿</span>
<span id='emoji_958' onclick='getmoji("emoji_958")'>👉🏿</span>
<span id='emoji_959' onclick='getmoji("emoji_959")'>👆🏿</span>
<span id='emoji_960' onclick='getmoji("emoji_960")'>👇🏿</span>
<span id='emoji_961' onclick='getmoji("emoji_961")'>☝🏿</span>
<span id='emoji_962' onclick='getmoji("emoji_962")'>✋🏿</span>
<span id='emoji_963' onclick='getmoji("emoji_963")'>🤚🏿</span>
<span id='emoji_964' onclick='getmoji("emoji_964")'>🖐🏿</span>
<span id='emoji_965' onclick='getmoji("emoji_965")'>🖖🏿</span>
<span id='emoji_966' onclick='getmoji("emoji_966")'>👋🏿</span>
<span id='emoji_967' onclick='getmoji("emoji_967")'>🤙🏿</span>
<span id='emoji_968' onclick='getmoji("emoji_968")'>💪🏿</span>
<span id='emoji_969' onclick='getmoji("emoji_969")'>🖕🏿</span>
<span id='emoji_970' onclick='getmoji("emoji_970")'>✍🏿</span>
<span id='emoji_971' onclick='getmoji("emoji_971")'>🤳🏿</span>
<span id='emoji_972' onclick='getmoji("emoji_972")'>💅🏿</span>
<span id='emoji_973' onclick='getmoji("emoji_973")'>👂🏿</span>
<span id='emoji_974' onclick='getmoji("emoji_974")'>👃🏿</span>
<span id='emoji_975' onclick='getmoji("emoji_975")'></span>
<span id='emoji_976' onclick='getmoji("emoji_976")'>🐶</span>
<span id='emoji_977' onclick='getmoji("emoji_977")'>🐱</span>
<span id='emoji_978' onclick='getmoji("emoji_978")'>🐭</span>
<span id='emoji_979' onclick='getmoji("emoji_979")'>🐹</span>
<span id='emoji_980' onclick='getmoji("emoji_980")'>🐰</span>
<span id='emoji_981' onclick='getmoji("emoji_981")'>🦊</span>
<span id='emoji_982' onclick='getmoji("emoji_982")'>🦝</span>
<span id='emoji_983' onclick='getmoji("emoji_983")'>🐻</span>
<span id='emoji_984' onclick='getmoji("emoji_984")'>🐼</span>
<span id='emoji_985' onclick='getmoji("emoji_985")'>🦘</span>
<span id='emoji_986' onclick='getmoji("emoji_986")'>🦡</span>
<span id='emoji_987' onclick='getmoji("emoji_987")'>🐨</span>
<span id='emoji_988' onclick='getmoji("emoji_988")'>🐯</span>
<span id='emoji_989' onclick='getmoji("emoji_989")'>🦁</span>
<span id='emoji_990' onclick='getmoji("emoji_990")'>🐮</span>
<span id='emoji_991' onclick='getmoji("emoji_991")'>🐷</span>
<span id='emoji_992' onclick='getmoji("emoji_992")'>🐽</span>
<span id='emoji_993' onclick='getmoji("emoji_993")'>🐸</span>
<span id='emoji_994' onclick='getmoji("emoji_994")'>🐵</span>
<span id='emoji_995' onclick='getmoji("emoji_995")'>🙈</span>
<span id='emoji_996' onclick='getmoji("emoji_996")'>🙉</span>
<span id='emoji_997' onclick='getmoji("emoji_997")'>🙊</span>
<span id='emoji_998' onclick='getmoji("emoji_998")'>🐒</span>
<span id='emoji_999' onclick='getmoji("emoji_999")'>🐔</span>
<span id='emoji_1000' onclick='getmoji("emoji_1000")'>🐧</span>
<span id='emoji_1001' onclick='getmoji("emoji_1001")'>🐦</span>
<span id='emoji_1002' onclick='getmoji("emoji_1002")'>🐤</span>
<span id='emoji_1003' onclick='getmoji("emoji_1003")'>🐣</span>
<span id='emoji_1004' onclick='getmoji("emoji_1004")'>🐥</span>
<span id='emoji_1005' onclick='getmoji("emoji_1005")'>🦆</span>
<span id='emoji_1006' onclick='getmoji("emoji_1006")'>🦢</span>
<span id='emoji_1007' onclick='getmoji("emoji_1007")'>🦅</span>
<span id='emoji_1008' onclick='getmoji("emoji_1008")'>🦉</span>
<span id='emoji_1009' onclick='getmoji("emoji_1009")'>🦚</span>
<span id='emoji_1010' onclick='getmoji("emoji_1010")'>🦜</span>
<span id='emoji_1011' onclick='getmoji("emoji_1011")'>🦇</span>
<span id='emoji_1012' onclick='getmoji("emoji_1012")'>🐺</span>
<span id='emoji_1013' onclick='getmoji("emoji_1013")'>🐗</span>
<span id='emoji_1014' onclick='getmoji("emoji_1014")'>🐴</span>
<span id='emoji_1015' onclick='getmoji("emoji_1015")'>🦄</span>
<span id='emoji_1016' onclick='getmoji("emoji_1016")'>🐝</span>
<span id='emoji_1017' onclick='getmoji("emoji_1017")'>🐛</span>
<span id='emoji_1018' onclick='getmoji("emoji_1018")'>🦋</span>
<span id='emoji_1019' onclick='getmoji("emoji_1019")'>🐌</span>
<span id='emoji_1020' onclick='getmoji("emoji_1020")'>🐚</span>
<span id='emoji_1021' onclick='getmoji("emoji_1021")'>🐞</span>
<span id='emoji_1022' onclick='getmoji("emoji_1022")'>🐜</span>
<span id='emoji_1023' onclick='getmoji("emoji_1023")'>🦗</span>
<span id='emoji_1024' onclick='getmoji("emoji_1024")'>🕷</span>
<span id='emoji_1025' onclick='getmoji("emoji_1025")'>🕸</span>
<span id='emoji_1026' onclick='getmoji("emoji_1026")'>🦂</span>
<span id='emoji_1027' onclick='getmoji("emoji_1027")'>🦟</span>
<span id='emoji_1028' onclick='getmoji("emoji_1028")'>🦠</span>
<span id='emoji_1029' onclick='getmoji("emoji_1029")'>🐢</span>
<span id='emoji_1030' onclick='getmoji("emoji_1030")'>🐍</span>
<span id='emoji_1031' onclick='getmoji("emoji_1031")'>🦎</span>
<span id='emoji_1032' onclick='getmoji("emoji_1032")'>🦖</span>
<span id='emoji_1033' onclick='getmoji("emoji_1033")'>🦕</span>
<span id='emoji_1034' onclick='getmoji("emoji_1034")'>🐙</span>
<span id='emoji_1035' onclick='getmoji("emoji_1035")'>🦑</span>
<span id='emoji_1036' onclick='getmoji("emoji_1036")'>🦐</span>
<span id='emoji_1037' onclick='getmoji("emoji_1037")'>🦀</span>
<span id='emoji_1038' onclick='getmoji("emoji_1038")'>🐡</span>
<span id='emoji_1039' onclick='getmoji("emoji_1039")'>🐠</span>
<span id='emoji_1040' onclick='getmoji("emoji_1040")'>🐟</span>
<span id='emoji_1041' onclick='getmoji("emoji_1041")'>🐬</span>
<span id='emoji_1042' onclick='getmoji("emoji_1042")'>🐳</span>
<span id='emoji_1043' onclick='getmoji("emoji_1043")'>🐋</span>
<span id='emoji_1044' onclick='getmoji("emoji_1044")'>🦈</span>
<span id='emoji_1045' onclick='getmoji("emoji_1045")'>🐊</span>
<span id='emoji_1046' onclick='getmoji("emoji_1046")'>🐅</span>
<span id='emoji_1047' onclick='getmoji("emoji_1047")'>🐆</span>
<span id='emoji_1048' onclick='getmoji("emoji_1048")'>🦓</span>
<span id='emoji_1049' onclick='getmoji("emoji_1049")'>🦍</span>
<span id='emoji_1050' onclick='getmoji("emoji_1050")'>🐘</span>
<span id='emoji_1051' onclick='getmoji("emoji_1051")'>🦏</span>
<span id='emoji_1052' onclick='getmoji("emoji_1052")'>🦛</span>
<span id='emoji_1053' onclick='getmoji("emoji_1053")'>🐪</span>
<span id='emoji_1054' onclick='getmoji("emoji_1054")'>🐫</span>
<span id='emoji_1055' onclick='getmoji("emoji_1055")'>🦙</span>
<span id='emoji_1056' onclick='getmoji("emoji_1056")'>🦒</span>
<span id='emoji_1057' onclick='getmoji("emoji_1057")'>🐃</span>
<span id='emoji_1058' onclick='getmoji("emoji_1058")'>🐂</span>
<span id='emoji_1059' onclick='getmoji("emoji_1059")'>🐄</span>
<span id='emoji_1060' onclick='getmoji("emoji_1060")'>🐎</span>
<span id='emoji_1061' onclick='getmoji("emoji_1061")'>🐖</span>
<span id='emoji_1062' onclick='getmoji("emoji_1062")'>🐏</span>
<span id='emoji_1063' onclick='getmoji("emoji_1063")'>🐑</span>
<span id='emoji_1064' onclick='getmoji("emoji_1064")'>🐐</span>
<span id='emoji_1065' onclick='getmoji("emoji_1065")'>🦌</span>
<span id='emoji_1066' onclick='getmoji("emoji_1066")'>🐕</span>
<span id='emoji_1067' onclick='getmoji("emoji_1067")'>🐩</span>
<span id='emoji_1068' onclick='getmoji("emoji_1068")'>🐈</span>
<span id='emoji_1069' onclick='getmoji("emoji_1069")'>🐓</span>
<span id='emoji_1070' onclick='getmoji("emoji_1070")'>🦃</span>
<span id='emoji_1071' onclick='getmoji("emoji_1071")'>🕊</span>
<span id='emoji_1072' onclick='getmoji("emoji_1072")'>🐇</span>
<span id='emoji_1073' onclick='getmoji("emoji_1073")'>🐁</span>
<span id='emoji_1074' onclick='getmoji("emoji_1074")'>🐀</span>
<span id='emoji_1075' onclick='getmoji("emoji_1075")'>🐿</span>
<span id='emoji_1076' onclick='getmoji("emoji_1076")'>🦔</span>
<span id='emoji_1077' onclick='getmoji("emoji_1077")'>🐾</span>
<span id='emoji_1078' onclick='getmoji("emoji_1078")'>🐉</span>
<span id='emoji_1079' onclick='getmoji("emoji_1079")'>🐲</span>
<span id='emoji_1080' onclick='getmoji("emoji_1080")'>🌵</span>
<span id='emoji_1081' onclick='getmoji("emoji_1081")'>🎄</span>
<span id='emoji_1082' onclick='getmoji("emoji_1082")'>🌲</span>
<span id='emoji_1083' onclick='getmoji("emoji_1083")'>🌳</span>
<span id='emoji_1084' onclick='getmoji("emoji_1084")'>🌴</span>
<span id='emoji_1085' onclick='getmoji("emoji_1085")'>🌱</span>
<span id='emoji_1086' onclick='getmoji("emoji_1086")'>🌿</span>
<span id='emoji_1087' onclick='getmoji("emoji_1087")'>☘️</span>
<span id='emoji_1088' onclick='getmoji("emoji_1088")'>🍀</span>
<span id='emoji_1089' onclick='getmoji("emoji_1089")'>🎍</span>
<span id='emoji_1090' onclick='getmoji("emoji_1090")'>🎋</span>
<span id='emoji_1091' onclick='getmoji("emoji_1091")'>🍃</span>
<span id='emoji_1092' onclick='getmoji("emoji_1092")'>🍂</span>
<span id='emoji_1093' onclick='getmoji("emoji_1093")'>🍁</span>
<span id='emoji_1094' onclick='getmoji("emoji_1094")'>🍄</span>
<span id='emoji_1095' onclick='getmoji("emoji_1095")'>🌾</span>
<span id='emoji_1096' onclick='getmoji("emoji_1096")'>💐</span>
<span id='emoji_1097' onclick='getmoji("emoji_1097")'>🌷</span>
<span id='emoji_1098' onclick='getmoji("emoji_1098")'>🌹</span>
<span id='emoji_1099' onclick='getmoji("emoji_1099")'>🥀</span>
<span id='emoji_1100' onclick='getmoji("emoji_1100")'>🌺</span>
<span id='emoji_1101' onclick='getmoji("emoji_1101")'>🌸</span>
<span id='emoji_1102' onclick='getmoji("emoji_1102")'>🌼</span>
<span id='emoji_1103' onclick='getmoji("emoji_1103")'>🌻</span>
<span id='emoji_1104' onclick='getmoji("emoji_1104")'>🌞</span>
<span id='emoji_1105' onclick='getmoji("emoji_1105")'>🌝</span>
<span id='emoji_1106' onclick='getmoji("emoji_1106")'>🌛</span>
<span id='emoji_1107' onclick='getmoji("emoji_1107")'>🌜</span>
<span id='emoji_1108' onclick='getmoji("emoji_1108")'>🌚</span>
<span id='emoji_1109' onclick='getmoji("emoji_1109")'>🌕</span>
<span id='emoji_1110' onclick='getmoji("emoji_1110")'>🌖</span>
<span id='emoji_1111' onclick='getmoji("emoji_1111")'>🌗</span>
<span id='emoji_1112' onclick='getmoji("emoji_1112")'>🌘</span>
<span id='emoji_1113' onclick='getmoji("emoji_1113")'>🌑</span>
<span id='emoji_1114' onclick='getmoji("emoji_1114")'>🌒</span>
<span id='emoji_1115' onclick='getmoji("emoji_1115")'>🌓</span>
<span id='emoji_1116' onclick='getmoji("emoji_1116")'>🌔</span>
<span id='emoji_1117' onclick='getmoji("emoji_1117")'>🌙</span>
<span id='emoji_1118' onclick='getmoji("emoji_1118")'>🌎</span>
<span id='emoji_1119' onclick='getmoji("emoji_1119")'>🌍</span>
<span id='emoji_1120' onclick='getmoji("emoji_1120")'>🌏</span>
<span id='emoji_1121' onclick='getmoji("emoji_1121")'>💫</span>
<span id='emoji_1122' onclick='getmoji("emoji_1122")'>⭐️</span>
<span id='emoji_1123' onclick='getmoji("emoji_1123")'>🌟</span>
<span id='emoji_1124' onclick='getmoji("emoji_1124")'>✨</span>
<span id='emoji_1125' onclick='getmoji("emoji_1125")'>⚡️</span>
<span id='emoji_1126' onclick='getmoji("emoji_1126")'>☄️</span>
<span id='emoji_1127' onclick='getmoji("emoji_1127")'>💥</span>
<span id='emoji_1128' onclick='getmoji("emoji_1128")'>🔥</span>
<span id='emoji_1129' onclick='getmoji("emoji_1129")'>🌪</span>
<span id='emoji_1130' onclick='getmoji("emoji_1130")'>🌈</span>
<span id='emoji_1131' onclick='getmoji("emoji_1131")'>☀️</span>
<span id='emoji_1132' onclick='getmoji("emoji_1132")'>🌤</span>
<span id='emoji_1133' onclick='getmoji("emoji_1133")'>⛅️</span>
<span id='emoji_1134' onclick='getmoji("emoji_1134")'>🌥</span>
<span id='emoji_1135' onclick='getmoji("emoji_1135")'>☁️</span>
<span id='emoji_1136' onclick='getmoji("emoji_1136")'>🌦</span>
<span id='emoji_1137' onclick='getmoji("emoji_1137")'>🌧</span>
<span id='emoji_1138' onclick='getmoji("emoji_1138")'>⛈</span>
<span id='emoji_1139' onclick='getmoji("emoji_1139")'>🌩</span>
<span id='emoji_1140' onclick='getmoji("emoji_1140")'>🌨</span>
<span id='emoji_1141' onclick='getmoji("emoji_1141")'>❄️</span>
<span id='emoji_1142' onclick='getmoji("emoji_1142")'>☃️</span>
<span id='emoji_1143' onclick='getmoji("emoji_1143")'>⛄️</span>
<span id='emoji_1144' onclick='getmoji("emoji_1144")'>🌬</span>
<span id='emoji_1145' onclick='getmoji("emoji_1145")'>💨</span>
<span id='emoji_1146' onclick='getmoji("emoji_1146")'>💧</span>
<span id='emoji_1147' onclick='getmoji("emoji_1147")'>💦</span>
<span id='emoji_1148' onclick='getmoji("emoji_1148")'>☔️</span>
<span id='emoji_1149' onclick='getmoji("emoji_1149")'>☂️</span>
<span id='emoji_1150' onclick='getmoji("emoji_1150")'>🌊</span>
<span id='emoji_1151' onclick='getmoji("emoji_1151")'>🌫</span>
<span id='emoji_1152' onclick='getmoji("emoji_1152")'></span>
<span id='emoji_1153' onclick='getmoji("emoji_1153")'>🍏</span>
<span id='emoji_1154' onclick='getmoji("emoji_1154")'>🍎</span>
<span id='emoji_1155' onclick='getmoji("emoji_1155")'>🍐</span>
<span id='emoji_1156' onclick='getmoji("emoji_1156")'>🍊</span>
<span id='emoji_1157' onclick='getmoji("emoji_1157")'>🍋</span>
<span id='emoji_1158' onclick='getmoji("emoji_1158")'>🍌</span>
<span id='emoji_1159' onclick='getmoji("emoji_1159")'>🍉</span>
<span id='emoji_1160' onclick='getmoji("emoji_1160")'>🍇</span>
<span id='emoji_1161' onclick='getmoji("emoji_1161")'>🍓</span>
<span id='emoji_1162' onclick='getmoji("emoji_1162")'>🍈</span>
<span id='emoji_1163' onclick='getmoji("emoji_1163")'>🍒</span>
<span id='emoji_1164' onclick='getmoji("emoji_1164")'>🍑</span>
<span id='emoji_1165' onclick='getmoji("emoji_1165")'>🍍</span>
<span id='emoji_1166' onclick='getmoji("emoji_1166")'>🥭</span>
<span id='emoji_1167' onclick='getmoji("emoji_1167")'>🥥</span>
<span id='emoji_1168' onclick='getmoji("emoji_1168")'>🥝</span>
<span id='emoji_1169' onclick='getmoji("emoji_1169")'>🍅</span>
<span id='emoji_1170' onclick='getmoji("emoji_1170")'>🍆</span>
<span id='emoji_1171' onclick='getmoji("emoji_1171")'>🥑</span>
<span id='emoji_1172' onclick='getmoji("emoji_1172")'>🥦</span>
<span id='emoji_1173' onclick='getmoji("emoji_1173")'>🥒</span>
<span id='emoji_1174' onclick='getmoji("emoji_1174")'>🥬</span>
<span id='emoji_1175' onclick='getmoji("emoji_1175")'>🌶</span>
<span id='emoji_1176' onclick='getmoji("emoji_1176")'>🌽</span>
<span id='emoji_1177' onclick='getmoji("emoji_1177")'>🥕</span>
<span id='emoji_1178' onclick='getmoji("emoji_1178")'>🥔</span>
<span id='emoji_1179' onclick='getmoji("emoji_1179")'>🍠</span>
<span id='emoji_1180' onclick='getmoji("emoji_1180")'>🥐</span>
<span id='emoji_1181' onclick='getmoji("emoji_1181")'>🍞</span>
<span id='emoji_1182' onclick='getmoji("emoji_1182")'>🥖</span>
<span id='emoji_1183' onclick='getmoji("emoji_1183")'>🥨</span>
<span id='emoji_1184' onclick='getmoji("emoji_1184")'>🥯</span>
<span id='emoji_1185' onclick='getmoji("emoji_1185")'>🧀</span>
<span id='emoji_1186' onclick='getmoji("emoji_1186")'>🥚</span>
<span id='emoji_1187' onclick='getmoji("emoji_1187")'>🍳</span>
<span id='emoji_1188' onclick='getmoji("emoji_1188")'>🥞</span>
<span id='emoji_1189' onclick='getmoji("emoji_1189")'>🥓</span>
<span id='emoji_1190' onclick='getmoji("emoji_1190")'>🥩</span>
<span id='emoji_1191' onclick='getmoji("emoji_1191")'>🍗</span>
<span id='emoji_1192' onclick='getmoji("emoji_1192")'>🍖</span>
<span id='emoji_1193' onclick='getmoji("emoji_1193")'>🌭</span>
<span id='emoji_1194' onclick='getmoji("emoji_1194")'>🍔</span>
<span id='emoji_1195' onclick='getmoji("emoji_1195")'>🍟</span>
<span id='emoji_1196' onclick='getmoji("emoji_1196")'>🍕</span>
<span id='emoji_1197' onclick='getmoji("emoji_1197")'>🥪</span>
<span id='emoji_1198' onclick='getmoji("emoji_1198")'>🥙</span>
<span id='emoji_1199' onclick='getmoji("emoji_1199")'>🌮</span>
<span id='emoji_1200' onclick='getmoji("emoji_1200")'>🌯</span>
<span id='emoji_1201' onclick='getmoji("emoji_1201")'>🥗</span>
<span id='emoji_1202' onclick='getmoji("emoji_1202")'>🥘</span>
<span id='emoji_1203' onclick='getmoji("emoji_1203")'>🥫</span>
<span id='emoji_1204' onclick='getmoji("emoji_1204")'>🍝</span>
<span id='emoji_1205' onclick='getmoji("emoji_1205")'>🍜</span>
<span id='emoji_1206' onclick='getmoji("emoji_1206")'>🍲</span>
<span id='emoji_1207' onclick='getmoji("emoji_1207")'>🍛</span>
<span id='emoji_1208' onclick='getmoji("emoji_1208")'>🍣</span>
<span id='emoji_1209' onclick='getmoji("emoji_1209")'>🍱</span>
<span id='emoji_1210' onclick='getmoji("emoji_1210")'>🥟</span>
<span id='emoji_1211' onclick='getmoji("emoji_1211")'>🍤</span>
<span id='emoji_1212' onclick='getmoji("emoji_1212")'>🍙</span>
<span id='emoji_1213' onclick='getmoji("emoji_1213")'>🍚</span>
<span id='emoji_1214' onclick='getmoji("emoji_1214")'>🍘</span>
<span id='emoji_1215' onclick='getmoji("emoji_1215")'>🍥</span>
<span id='emoji_1216' onclick='getmoji("emoji_1216")'>🥮</span>
<span id='emoji_1217' onclick='getmoji("emoji_1217")'>🥠</span>
<span id='emoji_1218' onclick='getmoji("emoji_1218")'>🍢</span>
<span id='emoji_1219' onclick='getmoji("emoji_1219")'>🍡</span>
<span id='emoji_1220' onclick='getmoji("emoji_1220")'>🍧</span>
<span id='emoji_1221' onclick='getmoji("emoji_1221")'>🍨</span>
<span id='emoji_1222' onclick='getmoji("emoji_1222")'>🍦</span>
<span id='emoji_1223' onclick='getmoji("emoji_1223")'>🥧</span>
<span id='emoji_1224' onclick='getmoji("emoji_1224")'>🍰</span>
<span id='emoji_1225' onclick='getmoji("emoji_1225")'>🎂</span>
<span id='emoji_1226' onclick='getmoji("emoji_1226")'>🍮</span>
<span id='emoji_1227' onclick='getmoji("emoji_1227")'>🍭</span>
<span id='emoji_1228' onclick='getmoji("emoji_1228")'>🍬</span>
<span id='emoji_1229' onclick='getmoji("emoji_1229")'>🍫</span>
<span id='emoji_1230' onclick='getmoji("emoji_1230")'>🍿</span>
<span id='emoji_1231' onclick='getmoji("emoji_1231")'>🧂</span>
<span id='emoji_1232' onclick='getmoji("emoji_1232")'>🍩</span>
<span id='emoji_1233' onclick='getmoji("emoji_1233")'>🍪</span>
<span id='emoji_1234' onclick='getmoji("emoji_1234")'>🌰</span>
<span id='emoji_1235' onclick='getmoji("emoji_1235")'>🥜</span>
<span id='emoji_1236' onclick='getmoji("emoji_1236")'>🍯</span>
<span id='emoji_1237' onclick='getmoji("emoji_1237")'>🥛</span>
<span id='emoji_1238' onclick='getmoji("emoji_1238")'>🍼</span>
<span id='emoji_1239' onclick='getmoji("emoji_1239")'>☕️</span>
<span id='emoji_1240' onclick='getmoji("emoji_1240")'>🍵</span>
<span id='emoji_1241' onclick='getmoji("emoji_1241")'>🥤</span>
<span id='emoji_1242' onclick='getmoji("emoji_1242")'>🍶</span>
<span id='emoji_1243' onclick='getmoji("emoji_1243")'>🍺</span>
<span id='emoji_1244' onclick='getmoji("emoji_1244")'>🍻</span>
<span id='emoji_1245' onclick='getmoji("emoji_1245")'>🥂</span>
<span id='emoji_1246' onclick='getmoji("emoji_1246")'>🍷</span>
<span id='emoji_1247' onclick='getmoji("emoji_1247")'>🥃</span>
<span id='emoji_1248' onclick='getmoji("emoji_1248")'>🍸</span>
<span id='emoji_1249' onclick='getmoji("emoji_1249")'>🍹</span>
<span id='emoji_1250' onclick='getmoji("emoji_1250")'>🍾</span>
<span id='emoji_1251' onclick='getmoji("emoji_1251")'>🥄</span>
<span id='emoji_1252' onclick='getmoji("emoji_1252")'>🍴</span>
<span id='emoji_1253' onclick='getmoji("emoji_1253")'>🍽</span>
<span id='emoji_1254' onclick='getmoji("emoji_1254")'>🥣</span>
<span id='emoji_1255' onclick='getmoji("emoji_1255")'>🥡</span>
<span id='emoji_1256' onclick='getmoji("emoji_1256")'>🥢</span>
<span id='emoji_1257' onclick='getmoji("emoji_1257")'></span>
<span id='emoji_1258' onclick='getmoji("emoji_1258")'>⚽️</span>
<span id='emoji_1259' onclick='getmoji("emoji_1259")'>🏀</span>
<span id='emoji_1260' onclick='getmoji("emoji_1260")'>🏈</span>
<span id='emoji_1261' onclick='getmoji("emoji_1261")'>⚾️</span>
<span id='emoji_1262' onclick='getmoji("emoji_1262")'>🥎</span>
<span id='emoji_1263' onclick='getmoji("emoji_1263")'>🏐</span>
<span id='emoji_1264' onclick='getmoji("emoji_1264")'>🏉</span>
<span id='emoji_1265' onclick='getmoji("emoji_1265")'>🎾</span>
<span id='emoji_1266' onclick='getmoji("emoji_1266")'>🥏</span>
<span id='emoji_1267' onclick='getmoji("emoji_1267")'>🎱</span>
<span id='emoji_1268' onclick='getmoji("emoji_1268")'>🏓</span>
<span id='emoji_1269' onclick='getmoji("emoji_1269")'>🏸</span>
<span id='emoji_1270' onclick='getmoji("emoji_1270")'>🥅</span>
<span id='emoji_1271' onclick='getmoji("emoji_1271")'>🏒</span>
<span id='emoji_1272' onclick='getmoji("emoji_1272")'>🏑</span>
<span id='emoji_1273' onclick='getmoji("emoji_1273")'>🥍</span>
<span id='emoji_1274' onclick='getmoji("emoji_1274")'>🏏</span>
<span id='emoji_1275' onclick='getmoji("emoji_1275")'>⛳️</span>
<span id='emoji_1276' onclick='getmoji("emoji_1276")'>🏹</span>
<span id='emoji_1277' onclick='getmoji("emoji_1277")'>🎣</span>
<span id='emoji_1278' onclick='getmoji("emoji_1278")'>🥊</span>
<span id='emoji_1279' onclick='getmoji("emoji_1279")'>🥋</span>
<span id='emoji_1280' onclick='getmoji("emoji_1280")'>🎽</span>
<span id='emoji_1281' onclick='getmoji("emoji_1281")'>⛸</span>
<span id='emoji_1282' onclick='getmoji("emoji_1282")'>🥌</span>
<span id='emoji_1283' onclick='getmoji("emoji_1283")'>🛷</span>
<span id='emoji_1284' onclick='getmoji("emoji_1284")'>🛹</span>
<span id='emoji_1285' onclick='getmoji("emoji_1285")'>🎿</span>
<span id='emoji_1286' onclick='getmoji("emoji_1286")'>⛷</span>
<span id='emoji_1287' onclick='getmoji("emoji_1287")'>🏂</span>
<span id='emoji_1288' onclick='getmoji("emoji_1288")'>🏋️‍♀️</span>
<span id='emoji_1289' onclick='getmoji("emoji_1289")'>🏋🏻‍♀️</span>
<span id='emoji_1290' onclick='getmoji("emoji_1290")'>🏋🏼‍♀️</span>
<span id='emoji_1291' onclick='getmoji("emoji_1291")'>🏋🏽‍♀️</span>
<span id='emoji_1292' onclick='getmoji("emoji_1292")'>🏋🏾‍♀️</span>
<span id='emoji_1293' onclick='getmoji("emoji_1293")'>🏋🏿‍♀️</span>
<span id='emoji_1294' onclick='getmoji("emoji_1294")'>🏋️‍♂️</span>
<span id='emoji_1295' onclick='getmoji("emoji_1295")'>🏋🏻‍♂️</span>
<span id='emoji_1296' onclick='getmoji("emoji_1296")'>🏋🏼‍♂️</span>
<span id='emoji_1297' onclick='getmoji("emoji_1297")'>🏋🏽‍♂️</span>
<span id='emoji_1298' onclick='getmoji("emoji_1298")'>🏋🏾‍♂️</span>
<span id='emoji_1299' onclick='getmoji("emoji_1299")'>🏋🏿‍♂️</span>
<span id='emoji_1300' onclick='getmoji("emoji_1300")'>🤼‍♀️</span>
<span id='emoji_1301' onclick='getmoji("emoji_1301")'>🤼‍♂️</span>
<span id='emoji_1302' onclick='getmoji("emoji_1302")'>🤸‍♀️</span>
<span id='emoji_1303' onclick='getmoji("emoji_1303")'>🤸🏻‍♀️</span>
<span id='emoji_1304' onclick='getmoji("emoji_1304")'>🤸🏼‍♀️</span>
<span id='emoji_1305' onclick='getmoji("emoji_1305")'>🤸🏽‍♀️</span>
<span id='emoji_1306' onclick='getmoji("emoji_1306")'>🤸🏾‍♀️</span>
<span id='emoji_1307' onclick='getmoji("emoji_1307")'>🤸🏿‍♀️</span>
<span id='emoji_1308' onclick='getmoji("emoji_1308")'>🤸‍♂️</span>
<span id='emoji_1309' onclick='getmoji("emoji_1309")'>🤸🏻‍♂️</span>
<span id='emoji_1310' onclick='getmoji("emoji_1310")'>🤸🏼‍♂️</span>
<span id='emoji_1311' onclick='getmoji("emoji_1311")'>🤸🏽‍♂️</span>
<span id='emoji_1312' onclick='getmoji("emoji_1312")'>🤸🏾‍♂️</span>
<span id='emoji_1313' onclick='getmoji("emoji_1313")'>🤸🏿‍♂️</span>
<span id='emoji_1314' onclick='getmoji("emoji_1314")'>⛹️‍♀️</span>
<span id='emoji_1315' onclick='getmoji("emoji_1315")'>⛹🏻‍♀️</span>
<span id='emoji_1316' onclick='getmoji("emoji_1316")'>⛹🏼‍♀️</span>
<span id='emoji_1317' onclick='getmoji("emoji_1317")'>⛹🏽‍♀️</span>
<span id='emoji_1318' onclick='getmoji("emoji_1318")'>⛹🏾‍♀️</span>
<span id='emoji_1319' onclick='getmoji("emoji_1319")'>⛹🏿‍♀️</span>
<span id='emoji_1320' onclick='getmoji("emoji_1320")'>⛹️‍♂️</span>
<span id='emoji_1321' onclick='getmoji("emoji_1321")'>⛹🏻‍♂️</span>
<span id='emoji_1322' onclick='getmoji("emoji_1322")'>⛹🏼‍♂️</span>
<span id='emoji_1323' onclick='getmoji("emoji_1323")'>⛹🏽‍♂️</span>
<span id='emoji_1324' onclick='getmoji("emoji_1324")'>⛹🏾‍♂️</span>
<span id='emoji_1325' onclick='getmoji("emoji_1325")'>⛹🏿‍♂️</span>
<span id='emoji_1326' onclick='getmoji("emoji_1326")'>🤺</span>
<span id='emoji_1327' onclick='getmoji("emoji_1327")'>🤾‍♀️</span>
<span id='emoji_1328' onclick='getmoji("emoji_1328")'>🤾🏻‍♀️</span>
<span id='emoji_1329' onclick='getmoji("emoji_1329")'>🤾🏼‍♀️</span>
<span id='emoji_1330' onclick='getmoji("emoji_1330")'>🤾🏾‍♀️</span>
<span id='emoji_1331' onclick='getmoji("emoji_1331")'>🤾🏾‍♀️</span>
<span id='emoji_1332' onclick='getmoji("emoji_1332")'>🤾🏿‍♀️</span>
<span id='emoji_1333' onclick='getmoji("emoji_1333")'>🤾‍♂️</span>
<span id='emoji_1334' onclick='getmoji("emoji_1334")'>🤾🏻‍♂️</span>
<span id='emoji_1335' onclick='getmoji("emoji_1335")'>🤾🏼‍♂️</span>
<span id='emoji_1336' onclick='getmoji("emoji_1336")'>🤾🏽‍♂️</span>
<span id='emoji_1337' onclick='getmoji("emoji_1337")'>🤾🏾‍♂️</span>
<span id='emoji_1338' onclick='getmoji("emoji_1338")'>🤾🏿‍♂️</span>
<span id='emoji_1339' onclick='getmoji("emoji_1339")'>🏌️‍♀️</span>
<span id='emoji_1340' onclick='getmoji("emoji_1340")'>🏌🏻‍♀️</span>
<span id='emoji_1341' onclick='getmoji("emoji_1341")'>🏌🏼‍♀️</span>
<span id='emoji_1342' onclick='getmoji("emoji_1342")'>🏌🏽‍♀️</span>
<span id='emoji_1343' onclick='getmoji("emoji_1343")'>🏌🏾‍♀️</span>
<span id='emoji_1344' onclick='getmoji("emoji_1344")'>🏌🏿‍♀️</span>
<span id='emoji_1345' onclick='getmoji("emoji_1345")'>🏌️‍♂️</span>
<span id='emoji_1346' onclick='getmoji("emoji_1346")'>🏌🏻‍♂️</span>
<span id='emoji_1347' onclick='getmoji("emoji_1347")'>🏌🏼‍♂️</span>
<span id='emoji_1348' onclick='getmoji("emoji_1348")'>🏌🏽‍♂️</span>
<span id='emoji_1349' onclick='getmoji("emoji_1349")'>🏌🏾‍♂️</span>
<span id='emoji_1350' onclick='getmoji("emoji_1350")'>🏌🏿‍♂️</span>
<span id='emoji_1351' onclick='getmoji("emoji_1351")'>🏇</span>
<span id='emoji_1352' onclick='getmoji("emoji_1352")'>🏇🏻</span>
<span id='emoji_1353' onclick='getmoji("emoji_1353")'>🏇🏼</span>
<span id='emoji_1354' onclick='getmoji("emoji_1354")'>🏇🏽</span>
<span id='emoji_1355' onclick='getmoji("emoji_1355")'>🏇🏾</span>
<span id='emoji_1356' onclick='getmoji("emoji_1356")'>🏇🏿</span>
<span id='emoji_1357' onclick='getmoji("emoji_1357")'>🧘‍♀️</span>
<span id='emoji_1358' onclick='getmoji("emoji_1358")'>🧘🏻‍♀️</span>
<span id='emoji_1359' onclick='getmoji("emoji_1359")'>🧘🏼‍♀️</span>
<span id='emoji_1360' onclick='getmoji("emoji_1360")'>🧘🏽‍♀️</span>
<span id='emoji_1361' onclick='getmoji("emoji_1361")'>🧘🏾‍♀️</span>
<span id='emoji_1362' onclick='getmoji("emoji_1362")'>🧘🏿‍♀️</span>
<span id='emoji_1363' onclick='getmoji("emoji_1363")'>🧘‍♂️</span>
<span id='emoji_1364' onclick='getmoji("emoji_1364")'>🧘🏻‍♂️</span>
<span id='emoji_1365' onclick='getmoji("emoji_1365")'>🧘🏼‍♂️</span>
<span id='emoji_1366' onclick='getmoji("emoji_1366")'>🧘🏽‍♂️</span>
<span id='emoji_1367' onclick='getmoji("emoji_1367")'>🧘🏾‍♂️</span>
<span id='emoji_1368' onclick='getmoji("emoji_1368")'>🧘🏿‍♂️</span>
<span id='emoji_1369' onclick='getmoji("emoji_1369")'>🏄‍♀️</span>
<span id='emoji_1370' onclick='getmoji("emoji_1370")'>🏄🏻‍♀️</span>
<span id='emoji_1371' onclick='getmoji("emoji_1371")'>🏄🏼‍♀️</span>
<span id='emoji_1372' onclick='getmoji("emoji_1372")'>🏄🏽‍♀️</span>
<span id='emoji_1373' onclick='getmoji("emoji_1373")'>🏄🏾‍♀️</span>
<span id='emoji_1374' onclick='getmoji("emoji_1374")'>🏄🏿‍♀️</span>
<span id='emoji_1375' onclick='getmoji("emoji_1375")'>🏄‍♂️</span>
<span id='emoji_1376' onclick='getmoji("emoji_1376")'>🏄🏻‍♂️</span>
<span id='emoji_1377' onclick='getmoji("emoji_1377")'>🏄🏼‍♂️</span>
<span id='emoji_1378' onclick='getmoji("emoji_1378")'>🏄🏽‍♂️</span>
<span id='emoji_1379' onclick='getmoji("emoji_1379")'>🏄🏾‍♂️</span>
<span id='emoji_1380' onclick='getmoji("emoji_1380")'>🏄🏿‍♂️</span>
<span id='emoji_1381' onclick='getmoji("emoji_1381")'>🏊‍♀️</span>
<span id='emoji_1382' onclick='getmoji("emoji_1382")'>🏊🏻‍♀️</span>
<span id='emoji_1383' onclick='getmoji("emoji_1383")'>🏊🏼‍♀️</span>
<span id='emoji_1384' onclick='getmoji("emoji_1384")'>🏊🏽‍♀️</span>
<span id='emoji_1385' onclick='getmoji("emoji_1385")'>🏊🏾‍♀️</span>
<span id='emoji_1386' onclick='getmoji("emoji_1386")'>🏊🏿‍♀️</span>
<span id='emoji_1387' onclick='getmoji("emoji_1387")'>🏊‍♂️</span>
<span id='emoji_1388' onclick='getmoji("emoji_1388")'>🏊🏻‍♂️</span>
<span id='emoji_1389' onclick='getmoji("emoji_1389")'>🏊🏼‍♂️</span>
<span id='emoji_1390' onclick='getmoji("emoji_1390")'>🏊🏽‍♂️</span>
<span id='emoji_1391' onclick='getmoji("emoji_1391")'>🏊🏾‍♂️</span>
<span id='emoji_1392' onclick='getmoji("emoji_1392")'>🏊🏿‍♂️</span>
<span id='emoji_1393' onclick='getmoji("emoji_1393")'>🤽‍♀️</span>
<span id='emoji_1394' onclick='getmoji("emoji_1394")'>🤽🏻‍♀️</span>
<span id='emoji_1395' onclick='getmoji("emoji_1395")'>🤽🏼‍♀️</span>
<span id='emoji_1396' onclick='getmoji("emoji_1396")'>🤽🏽‍♀️</span>
<span id='emoji_1397' onclick='getmoji("emoji_1397")'>🤽🏾‍♀️</span>
<span id='emoji_1398' onclick='getmoji("emoji_1398")'>🤽🏿‍♀️</span>
<span id='emoji_1399' onclick='getmoji("emoji_1399")'>🤽‍♂️</span>
<span id='emoji_1400' onclick='getmoji("emoji_1400")'>🤽🏻‍♂️</span>
<span id='emoji_1401' onclick='getmoji("emoji_1401")'>🤽🏼‍♂️</span>
<span id='emoji_1402' onclick='getmoji("emoji_1402")'>🤽🏽‍♂️</span>
<span id='emoji_1403' onclick='getmoji("emoji_1403")'>🤽🏾‍♂️</span>
<span id='emoji_1404' onclick='getmoji("emoji_1404")'>🤽🏿‍♂️</span>
<span id='emoji_1405' onclick='getmoji("emoji_1405")'>🚣‍♀️</span>
<span id='emoji_1406' onclick='getmoji("emoji_1406")'>🚣🏻‍♀️</span>
<span id='emoji_1407' onclick='getmoji("emoji_1407")'>🚣🏼‍♀️</span>
<span id='emoji_1408' onclick='getmoji("emoji_1408")'>🚣🏽‍♀️</span>
<span id='emoji_1409' onclick='getmoji("emoji_1409")'>🚣🏾‍♀️</span>
<span id='emoji_1410' onclick='getmoji("emoji_1410")'>🚣🏿‍♀️</span>
<span id='emoji_1411' onclick='getmoji("emoji_1411")'>🚣‍♂️</span>
<span id='emoji_1412' onclick='getmoji("emoji_1412")'>🚣🏻‍♂️</span>
<span id='emoji_1413' onclick='getmoji("emoji_1413")'>🚣🏼‍♂️</span>
<span id='emoji_1414' onclick='getmoji("emoji_1414")'>🚣🏽‍♂️</span>
<span id='emoji_1415' onclick='getmoji("emoji_1415")'>🚣🏾‍♂️</span>
<span id='emoji_1416' onclick='getmoji("emoji_1416")'>🚣🏿‍♂️</span>
<span id='emoji_1417' onclick='getmoji("emoji_1417")'>🧗‍♀️</span>
<span id='emoji_1418' onclick='getmoji("emoji_1418")'>🧗🏻‍♀️</span>
<span id='emoji_1419' onclick='getmoji("emoji_1419")'>🧗🏼‍♀️</span>
<span id='emoji_1420' onclick='getmoji("emoji_1420")'>🧗🏽‍♀️</span>
<span id='emoji_1421' onclick='getmoji("emoji_1421")'>🧗🏾‍♀️</span>
<span id='emoji_1422' onclick='getmoji("emoji_1422")'>🧗🏿‍♀️</span>
<span id='emoji_1423' onclick='getmoji("emoji_1423")'>🧗‍♂️</span>
<span id='emoji_1424' onclick='getmoji("emoji_1424")'>🧗🏻‍♂️</span>
<span id='emoji_1425' onclick='getmoji("emoji_1425")'>🧗🏼‍♂️</span>
<span id='emoji_1426' onclick='getmoji("emoji_1426")'>🧗🏽‍♂️</span>
<span id='emoji_1427' onclick='getmoji("emoji_1427")'>🧗🏾‍♂️</span>
<span id='emoji_1428' onclick='getmoji("emoji_1428")'>🧗🏿‍♂️</span>
<span id='emoji_1429' onclick='getmoji("emoji_1429")'>🚵‍♀️</span>
<span id='emoji_1430' onclick='getmoji("emoji_1430")'>🚵🏻‍♀️</span>
<span id='emoji_1431' onclick='getmoji("emoji_1431")'>🚵🏼‍♀️</span>
<span id='emoji_1432' onclick='getmoji("emoji_1432")'>🚵🏽‍♀️</span>
<span id='emoji_1433' onclick='getmoji("emoji_1433")'>🚵🏾‍♀️</span>
<span id='emoji_1434' onclick='getmoji("emoji_1434")'>🚵🏿‍♀️</span>
<span id='emoji_1435' onclick='getmoji("emoji_1435")'>🚵‍♂️</span>
<span id='emoji_1436' onclick='getmoji("emoji_1436")'>🚵🏻‍♂️</span>
<span id='emoji_1437' onclick='getmoji("emoji_1437")'>🚵🏼‍♂️</span>
<span id='emoji_1438' onclick='getmoji("emoji_1438")'>🚵🏽‍♂️</span>
<span id='emoji_1439' onclick='getmoji("emoji_1439")'>🚵🏾‍♂️</span>
<span id='emoji_1440' onclick='getmoji("emoji_1440")'>🚵🏿‍♂️</span>
<span id='emoji_1441' onclick='getmoji("emoji_1441")'>🚴‍♀️</span>
<span id='emoji_1442' onclick='getmoji("emoji_1442")'>🚴🏻‍♀️</span>
<span id='emoji_1443' onclick='getmoji("emoji_1443")'>🚴🏼‍♀️</span>
<span id='emoji_1444' onclick='getmoji("emoji_1444")'>🚴🏽‍♀️</span>
<span id='emoji_1445' onclick='getmoji("emoji_1445")'>🚴🏾‍♀️</span>
<span id='emoji_1446' onclick='getmoji("emoji_1446")'>🚴🏿‍♀️</span>
<span id='emoji_1447' onclick='getmoji("emoji_1447")'>🚴‍♂️</span>
<span id='emoji_1448' onclick='getmoji("emoji_1448")'>🚴🏻‍♂️</span>
<span id='emoji_1449' onclick='getmoji("emoji_1449")'>🚴🏼‍♂️</span>
<span id='emoji_1450' onclick='getmoji("emoji_1450")'>🚴🏽‍♂️</span>
<span id='emoji_1451' onclick='getmoji("emoji_1451")'>🚴🏾‍♂️</span>
<span id='emoji_1452' onclick='getmoji("emoji_1452")'>🚴🏿‍♂️</span>
<span id='emoji_1453' onclick='getmoji("emoji_1453")'>🏆</span>
<span id='emoji_1454' onclick='getmoji("emoji_1454")'>🥇</span>
<span id='emoji_1455' onclick='getmoji("emoji_1455")'>🥈</span>
<span id='emoji_1456' onclick='getmoji("emoji_1456")'>🥉</span>
<span id='emoji_1457' onclick='getmoji("emoji_1457")'>🏅</span>
<span id='emoji_1458' onclick='getmoji("emoji_1458")'>🎖</span>
<span id='emoji_1459' onclick='getmoji("emoji_1459")'>🏵</span>
<span id='emoji_1460' onclick='getmoji("emoji_1460")'>🎗</span>
<span id='emoji_1461' onclick='getmoji("emoji_1461")'>🎫</span>
<span id='emoji_1462' onclick='getmoji("emoji_1462")'>🎟</span>
<span id='emoji_1463' onclick='getmoji("emoji_1463")'>🎪</span>
<span id='emoji_1464' onclick='getmoji("emoji_1464")'>🤹‍♀️</span>
<span id='emoji_1465' onclick='getmoji("emoji_1465")'>🤹🏻‍♀️</span>
<span id='emoji_1466' onclick='getmoji("emoji_1466")'>🤹🏼‍♀️</span>
<span id='emoji_1467' onclick='getmoji("emoji_1467")'>🤹🏽‍♀️</span>
<span id='emoji_1468' onclick='getmoji("emoji_1468")'>🤹🏾‍♀️</span>
<span id='emoji_1469' onclick='getmoji("emoji_1469")'>🤹🏿‍♀️</span>
<span id='emoji_1470' onclick='getmoji("emoji_1470")'>🤹‍♂️</span>
<span id='emoji_1471' onclick='getmoji("emoji_1471")'>🤹🏻‍♂️</span>
<span id='emoji_1472' onclick='getmoji("emoji_1472")'>🤹🏼‍♂️</span>
<span id='emoji_1473' onclick='getmoji("emoji_1473")'>🤹🏽‍♂️</span>
<span id='emoji_1474' onclick='getmoji("emoji_1474")'>🤹🏾‍♂️</span>
<span id='emoji_1475' onclick='getmoji("emoji_1475")'>🤹🏿‍♂️</span>
<span id='emoji_1476' onclick='getmoji("emoji_1476")'>🎭</span>
<span id='emoji_1477' onclick='getmoji("emoji_1477")'>🎨</span>
<span id='emoji_1478' onclick='getmoji("emoji_1478")'>🎬</span>
<span id='emoji_1479' onclick='getmoji("emoji_1479")'>🎤</span>
<span id='emoji_1480' onclick='getmoji("emoji_1480")'>🎧</span>
<span id='emoji_1481' onclick='getmoji("emoji_1481")'>🎼</span>
<span id='emoji_1482' onclick='getmoji("emoji_1482")'>🎹</span>
<span id='emoji_1483' onclick='getmoji("emoji_1483")'>🥁</span>
<span id='emoji_1484' onclick='getmoji("emoji_1484")'>🎷</span>
<span id='emoji_1485' onclick='getmoji("emoji_1485")'>🎺</span>
<span id='emoji_1486' onclick='getmoji("emoji_1486")'>🎸</span>
<span id='emoji_1487' onclick='getmoji("emoji_1487")'>🎻</span>
<span id='emoji_1488' onclick='getmoji("emoji_1488")'>🎲</span>
<span id='emoji_1489' onclick='getmoji("emoji_1489")'>🧩</span>
<span id='emoji_1490' onclick='getmoji("emoji_1490")'>♟</span>
<span id='emoji_1491' onclick='getmoji("emoji_1491")'>🎯</span>
<span id='emoji_1492' onclick='getmoji("emoji_1492")'>🎳</span>
<span id='emoji_1493' onclick='getmoji("emoji_1493")'>🎮</span>
<span id='emoji_1494' onclick='getmoji("emoji_1494")'>🎰</span>
<span id='emoji_1495' onclick='getmoji("emoji_1495")'></span>
<span id='emoji_1496' onclick='getmoji("emoji_1496")'>🚗</span>
<span id='emoji_1497' onclick='getmoji("emoji_1497")'>🚕</span>
<span id='emoji_1498' onclick='getmoji("emoji_1498")'>🚙</span>
<span id='emoji_1499' onclick='getmoji("emoji_1499")'>🚌</span>
<span id='emoji_1500' onclick='getmoji("emoji_1500")'>🚎</span>
<span id='emoji_1501' onclick='getmoji("emoji_1501")'>🏎</span>
<span id='emoji_1502' onclick='getmoji("emoji_1502")'>🚓</span>
<span id='emoji_1503' onclick='getmoji("emoji_1503")'>🚑</span>
<span id='emoji_1504' onclick='getmoji("emoji_1504")'>🚒</span>
<span id='emoji_1505' onclick='getmoji("emoji_1505")'>🚐</span>
<span id='emoji_1506' onclick='getmoji("emoji_1506")'>🚚</span>
<span id='emoji_1507' onclick='getmoji("emoji_1507")'>🚛</span>
<span id='emoji_1508' onclick='getmoji("emoji_1508")'>🚜</span>
<span id='emoji_1509' onclick='getmoji("emoji_1509")'>🛴</span>
<span id='emoji_1510' onclick='getmoji("emoji_1510")'>🚲</span>
<span id='emoji_1511' onclick='getmoji("emoji_1511")'>🛵</span>
<span id='emoji_1512' onclick='getmoji("emoji_1512")'>🏍</span>
<span id='emoji_1513' onclick='getmoji("emoji_1513")'>🚨</span>
<span id='emoji_1514' onclick='getmoji("emoji_1514")'>🚔</span>
<span id='emoji_1515' onclick='getmoji("emoji_1515")'>🚍</span>
<span id='emoji_1516' onclick='getmoji("emoji_1516")'>🚘</span>
<span id='emoji_1517' onclick='getmoji("emoji_1517")'>🚖</span>
<span id='emoji_1518' onclick='getmoji("emoji_1518")'>🚡</span>
<span id='emoji_1519' onclick='getmoji("emoji_1519")'>🚠</span>
<span id='emoji_1520' onclick='getmoji("emoji_1520")'>🚟</span>
<span id='emoji_1521' onclick='getmoji("emoji_1521")'>🚃</span>
<span id='emoji_1522' onclick='getmoji("emoji_1522")'>🚋</span>
<span id='emoji_1523' onclick='getmoji("emoji_1523")'>🚞</span>
<span id='emoji_1524' onclick='getmoji("emoji_1524")'>🚝</span>
<span id='emoji_1525' onclick='getmoji("emoji_1525")'>🚄</span>
<span id='emoji_1526' onclick='getmoji("emoji_1526")'>🚅</span>
<span id='emoji_1527' onclick='getmoji("emoji_1527")'>🚈</span>
<span id='emoji_1528' onclick='getmoji("emoji_1528")'>🚂</span>
<span id='emoji_1529' onclick='getmoji("emoji_1529")'>🚆</span>
<span id='emoji_1530' onclick='getmoji("emoji_1530")'>🚇</span>
<span id='emoji_1531' onclick='getmoji("emoji_1531")'>🚊</span>
<span id='emoji_1532' onclick='getmoji("emoji_1532")'>🚉</span>
<span id='emoji_1533' onclick='getmoji("emoji_1533")'>✈️</span>
<span id='emoji_1534' onclick='getmoji("emoji_1534")'>🛫</span>
<span id='emoji_1535' onclick='getmoji("emoji_1535")'>🛬</span>
<span id='emoji_1536' onclick='getmoji("emoji_1536")'>🛩</span>
<span id='emoji_1537' onclick='getmoji("emoji_1537")'>💺</span>
<span id='emoji_1538' onclick='getmoji("emoji_1538")'>🛰</span>
<span id='emoji_1539' onclick='getmoji("emoji_1539")'>🚀</span>
<span id='emoji_1540' onclick='getmoji("emoji_1540")'>🛸</span>
<span id='emoji_1541' onclick='getmoji("emoji_1541")'>🚁</span>
<span id='emoji_1542' onclick='getmoji("emoji_1542")'>🛶</span>
<span id='emoji_1543' onclick='getmoji("emoji_1543")'>⛵️</span>
<span id='emoji_1544' onclick='getmoji("emoji_1544")'>🚤</span>
<span id='emoji_1545' onclick='getmoji("emoji_1545")'>🛥</span>
<span id='emoji_1546' onclick='getmoji("emoji_1546")'>🛳</span>
<span id='emoji_1547' onclick='getmoji("emoji_1547")'>⛴</span>
<span id='emoji_1548' onclick='getmoji("emoji_1548")'>🚢</span>
<span id='emoji_1549' onclick='getmoji("emoji_1549")'>⚓️</span>
<span id='emoji_1550' onclick='getmoji("emoji_1550")'>⛽️</span>
<span id='emoji_1551' onclick='getmoji("emoji_1551")'>🚧</span>
<span id='emoji_1552' onclick='getmoji("emoji_1552")'>🚦</span>
<span id='emoji_1553' onclick='getmoji("emoji_1553")'>🚥</span>
<span id='emoji_1554' onclick='getmoji("emoji_1554")'>🚏</span>
<span id='emoji_1555' onclick='getmoji("emoji_1555")'>🗺</span>
<span id='emoji_1556' onclick='getmoji("emoji_1556")'>🗿</span>
<span id='emoji_1557' onclick='getmoji("emoji_1557")'>🗽</span>
<span id='emoji_1558' onclick='getmoji("emoji_1558")'>🗼</span>
<span id='emoji_1559' onclick='getmoji("emoji_1559")'>🏰</span>
<span id='emoji_1560' onclick='getmoji("emoji_1560")'>🏯</span>
<span id='emoji_1561' onclick='getmoji("emoji_1561")'>🏟</span>
<span id='emoji_1562' onclick='getmoji("emoji_1562")'>🎡</span>
<span id='emoji_1563' onclick='getmoji("emoji_1563")'>🎢</span>
<span id='emoji_1564' onclick='getmoji("emoji_1564")'>🎠</span>
<span id='emoji_1565' onclick='getmoji("emoji_1565")'>⛲️</span>
<span id='emoji_1566' onclick='getmoji("emoji_1566")'>⛱</span>
<span id='emoji_1567' onclick='getmoji("emoji_1567")'>🏖</span>
<span id='emoji_1568' onclick='getmoji("emoji_1568")'>🏝</span>
<span id='emoji_1569' onclick='getmoji("emoji_1569")'>🏜</span>
<span id='emoji_1570' onclick='getmoji("emoji_1570")'>🌋</span>
<span id='emoji_1571' onclick='getmoji("emoji_1571")'>⛰</span>
<span id='emoji_1572' onclick='getmoji("emoji_1572")'>🏔</span>
<span id='emoji_1573' onclick='getmoji("emoji_1573")'>🗻</span>
<span id='emoji_1574' onclick='getmoji("emoji_1574")'>🏕</span>
<span id='emoji_1575' onclick='getmoji("emoji_1575")'>⛺️</span>
<span id='emoji_1576' onclick='getmoji("emoji_1576")'>🏠</span>
<span id='emoji_1577' onclick='getmoji("emoji_1577")'>🏡</span>
<span id='emoji_1578' onclick='getmoji("emoji_1578")'>🏘</span>
<span id='emoji_1579' onclick='getmoji("emoji_1579")'>🏚</span>
<span id='emoji_1580' onclick='getmoji("emoji_1580")'>🏗</span>
<span id='emoji_1581' onclick='getmoji("emoji_1581")'>🏭</span>
<span id='emoji_1582' onclick='getmoji("emoji_1582")'>🏢</span>
<span id='emoji_1583' onclick='getmoji("emoji_1583")'>🏬</span>
<span id='emoji_1584' onclick='getmoji("emoji_1584")'>🏣</span>
<span id='emoji_1585' onclick='getmoji("emoji_1585")'>🏤</span>
<span id='emoji_1586' onclick='getmoji("emoji_1586")'>🏥</span>
<span id='emoji_1587' onclick='getmoji("emoji_1587")'>🏦</span>
<span id='emoji_1588' onclick='getmoji("emoji_1588")'>🏨</span>
<span id='emoji_1589' onclick='getmoji("emoji_1589")'>🏪</span>
<span id='emoji_1590' onclick='getmoji("emoji_1590")'>🏫</span>
<span id='emoji_1591' onclick='getmoji("emoji_1591")'>🏩</span>
<span id='emoji_1592' onclick='getmoji("emoji_1592")'>💒</span>
<span id='emoji_1593' onclick='getmoji("emoji_1593")'>🏛</span>
<span id='emoji_1594' onclick='getmoji("emoji_1594")'>⛪️</span>
<span id='emoji_1595' onclick='getmoji("emoji_1595")'>🕌</span>
<span id='emoji_1596' onclick='getmoji("emoji_1596")'>🕍</span>
<span id='emoji_1597' onclick='getmoji("emoji_1597")'>🕋</span>
<span id='emoji_1598' onclick='getmoji("emoji_1598")'>⛩</span>
<span id='emoji_1599' onclick='getmoji("emoji_1599")'>🛤</span>
<span id='emoji_1600' onclick='getmoji("emoji_1600")'>🛣</span>
<span id='emoji_1601' onclick='getmoji("emoji_1601")'>🗾</span>
<span id='emoji_1602' onclick='getmoji("emoji_1602")'>🎑</span>
<span id='emoji_1603' onclick='getmoji("emoji_1603")'>🏞</span>
<span id='emoji_1604' onclick='getmoji("emoji_1604")'>🌅</span>
<span id='emoji_1605' onclick='getmoji("emoji_1605")'>🌄</span>
<span id='emoji_1606' onclick='getmoji("emoji_1606")'>🌠</span>
<span id='emoji_1607' onclick='getmoji("emoji_1607")'>🎇</span>
<span id='emoji_1608' onclick='getmoji("emoji_1608")'>🎆</span>
<span id='emoji_1609' onclick='getmoji("emoji_1609")'>🌇</span>
<span id='emoji_1610' onclick='getmoji("emoji_1610")'>🌆</span>
<span id='emoji_1611' onclick='getmoji("emoji_1611")'>🏙</span>
<span id='emoji_1612' onclick='getmoji("emoji_1612")'>🌃</span>
<span id='emoji_1613' onclick='getmoji("emoji_1613")'>🌌</span>
<span id='emoji_1614' onclick='getmoji("emoji_1614")'>🌉</span>
<span id='emoji_1615' onclick='getmoji("emoji_1615")'>🌁</span>
<span id='emoji_1616' onclick='getmoji("emoji_1616")'></span>
<span id='emoji_1617' onclick='getmoji("emoji_1617")'>⌚️</span>
<span id='emoji_1618' onclick='getmoji("emoji_1618")'>📱</span>
<span id='emoji_1619' onclick='getmoji("emoji_1619")'>📲</span>
<span id='emoji_1620' onclick='getmoji("emoji_1620")'>💻</span>
<span id='emoji_1621' onclick='getmoji("emoji_1621")'>⌨️</span>
<span id='emoji_1622' onclick='getmoji("emoji_1622")'>🖥</span>
<span id='emoji_1623' onclick='getmoji("emoji_1623")'>🖨</span>
<span id='emoji_1624' onclick='getmoji("emoji_1624")'>🖱</span>
<span id='emoji_1625' onclick='getmoji("emoji_1625")'>🖲</span>
<span id='emoji_1626' onclick='getmoji("emoji_1626")'>🕹</span>
<span id='emoji_1627' onclick='getmoji("emoji_1627")'>🗜</span>
<span id='emoji_1628' onclick='getmoji("emoji_1628")'>💽</span>
<span id='emoji_1629' onclick='getmoji("emoji_1629")'>💾</span>
<span id='emoji_1630' onclick='getmoji("emoji_1630")'>💿</span>
<span id='emoji_1631' onclick='getmoji("emoji_1631")'>📀</span>
<span id='emoji_1632' onclick='getmoji("emoji_1632")'>📼</span>
<span id='emoji_1633' onclick='getmoji("emoji_1633")'>📷</span>
<span id='emoji_1634' onclick='getmoji("emoji_1634")'>📸</span>
<span id='emoji_1635' onclick='getmoji("emoji_1635")'>📹</span>
<span id='emoji_1636' onclick='getmoji("emoji_1636")'>🎥</span>
<span id='emoji_1637' onclick='getmoji("emoji_1637")'>📽</span>
<span id='emoji_1638' onclick='getmoji("emoji_1638")'>🎞</span>
<span id='emoji_1639' onclick='getmoji("emoji_1639")'>📞</span>
<span id='emoji_1640' onclick='getmoji("emoji_1640")'>☎️</span>
<span id='emoji_1641' onclick='getmoji("emoji_1641")'>📟</span>
<span id='emoji_1642' onclick='getmoji("emoji_1642")'>📠</span>
<span id='emoji_1643' onclick='getmoji("emoji_1643")'>📺</span>
<span id='emoji_1644' onclick='getmoji("emoji_1644")'>📻</span>
<span id='emoji_1645' onclick='getmoji("emoji_1645")'>🎙</span>
<span id='emoji_1646' onclick='getmoji("emoji_1646")'>🎚</span>
<span id='emoji_1647' onclick='getmoji("emoji_1647")'>🎛</span>
<span id='emoji_1648' onclick='getmoji("emoji_1648")'>⏱</span>
<span id='emoji_1649' onclick='getmoji("emoji_1649")'>⏲</span>
<span id='emoji_1650' onclick='getmoji("emoji_1650")'>⏰</span>
<span id='emoji_1651' onclick='getmoji("emoji_1651")'>🕰</span>
<span id='emoji_1652' onclick='getmoji("emoji_1652")'>⌛️</span>
<span id='emoji_1653' onclick='getmoji("emoji_1653")'>⏳</span>
<span id='emoji_1654' onclick='getmoji("emoji_1654")'>📡</span>
<span id='emoji_1655' onclick='getmoji("emoji_1655")'>🔋</span>
<span id='emoji_1656' onclick='getmoji("emoji_1656")'>🔌</span>
<span id='emoji_1657' onclick='getmoji("emoji_1657")'>💡</span>
<span id='emoji_1658' onclick='getmoji("emoji_1658")'>🔦</span>
<span id='emoji_1659' onclick='getmoji("emoji_1659")'>🕯</span>
<span id='emoji_1660' onclick='getmoji("emoji_1660")'>🗑</span>
<span id='emoji_1661' onclick='getmoji("emoji_1661")'>🛢</span>
<span id='emoji_1662' onclick='getmoji("emoji_1662")'>💸</span>
<span id='emoji_1663' onclick='getmoji("emoji_1663")'>💵</span>
<span id='emoji_1664' onclick='getmoji("emoji_1664")'>💴</span>
<span id='emoji_1665' onclick='getmoji("emoji_1665")'>💶</span>
<span id='emoji_1666' onclick='getmoji("emoji_1666")'>💷</span>
<span id='emoji_1667' onclick='getmoji("emoji_1667")'>💰</span>
<span id='emoji_1668' onclick='getmoji("emoji_1668")'>💳</span>
<span id='emoji_1669' onclick='getmoji("emoji_1669")'>🧾</span>
<span id='emoji_1670' onclick='getmoji("emoji_1670")'>💎</span>
<span id='emoji_1671' onclick='getmoji("emoji_1671")'>⚖️</span>
<span id='emoji_1672' onclick='getmoji("emoji_1672")'>🔧</span>
<span id='emoji_1673' onclick='getmoji("emoji_1673")'>🔨</span>
<span id='emoji_1674' onclick='getmoji("emoji_1674")'>⚒</span>
<span id='emoji_1675' onclick='getmoji("emoji_1675")'>🛠</span>
<span id='emoji_1676' onclick='getmoji("emoji_1676")'>⛏</span>
<span id='emoji_1677' onclick='getmoji("emoji_1677")'>🔩</span>
<span id='emoji_1678' onclick='getmoji("emoji_1678")'>⚙️</span>
<span id='emoji_1679' onclick='getmoji("emoji_1679")'>⛓</span>
<span id='emoji_1680' onclick='getmoji("emoji_1680")'>🔫</span>
<span id='emoji_1681' onclick='getmoji("emoji_1681")'>💣</span>
<span id='emoji_1682' onclick='getmoji("emoji_1682")'>🔪</span>
<span id='emoji_1683' onclick='getmoji("emoji_1683")'>🗡</span>
<span id='emoji_1684' onclick='getmoji("emoji_1684")'>⚔️</span>
<span id='emoji_1685' onclick='getmoji("emoji_1685")'>🛡</span>
<span id='emoji_1686' onclick='getmoji("emoji_1686")'>🚬</span>
<span id='emoji_1687' onclick='getmoji("emoji_1687")'>⚰️</span>
<span id='emoji_1688' onclick='getmoji("emoji_1688")'>⚱️</span>
<span id='emoji_1689' onclick='getmoji("emoji_1689")'>🏺</span>
<span id='emoji_1690' onclick='getmoji("emoji_1690")'>🧭</span>
<span id='emoji_1691' onclick='getmoji("emoji_1691")'>🧱</span>
<span id='emoji_1692' onclick='getmoji("emoji_1692")'>🔮</span>
<span id='emoji_1693' onclick='getmoji("emoji_1693")'>🧿</span>
<span id='emoji_1694' onclick='getmoji("emoji_1694")'>🧸</span>
<span id='emoji_1695' onclick='getmoji("emoji_1695")'>📿</span>
<span id='emoji_1696' onclick='getmoji("emoji_1696")'>💈</span>
<span id='emoji_1697' onclick='getmoji("emoji_1697")'>⚗️</span>
<span id='emoji_1698' onclick='getmoji("emoji_1698")'>🔭</span>
<span id='emoji_1699' onclick='getmoji("emoji_1699")'>🧰</span>
<span id='emoji_1700' onclick='getmoji("emoji_1700")'>🧲</span>
<span id='emoji_1701' onclick='getmoji("emoji_1701")'>🧪</span>
<span id='emoji_1702' onclick='getmoji("emoji_1702")'>🧫</span>
<span id='emoji_1703' onclick='getmoji("emoji_1703")'>🧬</span>
<span id='emoji_1704' onclick='getmoji("emoji_1704")'>🧯</span>
<span id='emoji_1705' onclick='getmoji("emoji_1705")'>🔬</span>
<span id='emoji_1706' onclick='getmoji("emoji_1706")'>🕳</span>
<span id='emoji_1707' onclick='getmoji("emoji_1707")'>💊</span>
<span id='emoji_1708' onclick='getmoji("emoji_1708")'>💉</span>
<span id='emoji_1709' onclick='getmoji("emoji_1709")'>🌡</span>
<span id='emoji_1710' onclick='getmoji("emoji_1710")'>🚽</span>
<span id='emoji_1711' onclick='getmoji("emoji_1711")'>🚰</span>
<span id='emoji_1712' onclick='getmoji("emoji_1712")'>🚿</span>
<span id='emoji_1713' onclick='getmoji("emoji_1713")'>🛁</span>
<span id='emoji_1714' onclick='getmoji("emoji_1714")'>🛀</span>
<span id='emoji_1715' onclick='getmoji("emoji_1715")'>🛀🏻</span>
<span id='emoji_1716' onclick='getmoji("emoji_1716")'>🛀🏼</span>
<span id='emoji_1717' onclick='getmoji("emoji_1717")'>🛀🏽</span>
<span id='emoji_1718' onclick='getmoji("emoji_1718")'>🛀🏾</span>
<span id='emoji_1719' onclick='getmoji("emoji_1719")'>🛀🏿</span>
<span id='emoji_1720' onclick='getmoji("emoji_1720")'>🧴</span>
<span id='emoji_1721' onclick='getmoji("emoji_1721")'>🧵</span>
<span id='emoji_1722' onclick='getmoji("emoji_1722")'>🧶</span>
<span id='emoji_1723' onclick='getmoji("emoji_1723")'>🧷</span>
<span id='emoji_1724' onclick='getmoji("emoji_1724")'>🧹</span>
<span id='emoji_1725' onclick='getmoji("emoji_1725")'>🧺</span>
<span id='emoji_1726' onclick='getmoji("emoji_1726")'>🧻</span>
<span id='emoji_1727' onclick='getmoji("emoji_1727")'>🧼</span>
<span id='emoji_1728' onclick='getmoji("emoji_1728")'>🧽</span>
<span id='emoji_1729' onclick='getmoji("emoji_1729")'>🛎</span>
<span id='emoji_1730' onclick='getmoji("emoji_1730")'>🔑</span>
<span id='emoji_1731' onclick='getmoji("emoji_1731")'>🗝</span>
<span id='emoji_1732' onclick='getmoji("emoji_1732")'>🚪</span>
<span id='emoji_1733' onclick='getmoji("emoji_1733")'>🛋</span>
<span id='emoji_1734' onclick='getmoji("emoji_1734")'>🛏</span>
<span id='emoji_1735' onclick='getmoji("emoji_1735")'>🛌</span>
<span id='emoji_1736' onclick='getmoji("emoji_1736")'>🖼</span>
<span id='emoji_1737' onclick='getmoji("emoji_1737")'>🛍</span>
<span id='emoji_1738' onclick='getmoji("emoji_1738")'>🧳</span>
<span id='emoji_1739' onclick='getmoji("emoji_1739")'>🛒</span>
<span id='emoji_1740' onclick='getmoji("emoji_1740")'>🎁</span>
<span id='emoji_1741' onclick='getmoji("emoji_1741")'>🎈</span>
<span id='emoji_1742' onclick='getmoji("emoji_1742")'>🎏</span>
<span id='emoji_1743' onclick='getmoji("emoji_1743")'>🎀</span>
<span id='emoji_1744' onclick='getmoji("emoji_1744")'>🎊</span>
<span id='emoji_1745' onclick='getmoji("emoji_1745")'>🎉</span>
<span id='emoji_1746' onclick='getmoji("emoji_1746")'>🧨</span>
<span id='emoji_1747' onclick='getmoji("emoji_1747")'>🎎</span>
<span id='emoji_1748' onclick='getmoji("emoji_1748")'>🏮</span>
<span id='emoji_1749' onclick='getmoji("emoji_1749")'>🎐</span>
<span id='emoji_1750' onclick='getmoji("emoji_1750")'>🧧</span>
<span id='emoji_1751' onclick='getmoji("emoji_1751")'>✉️</span>
<span id='emoji_1752' onclick='getmoji("emoji_1752")'>📩</span>
<span id='emoji_1753' onclick='getmoji("emoji_1753")'>📨</span>
<span id='emoji_1754' onclick='getmoji("emoji_1754")'>📧</span>
<span id='emoji_1755' onclick='getmoji("emoji_1755")'>💌</span>
<span id='emoji_1756' onclick='getmoji("emoji_1756")'>📥</span>
<span id='emoji_1757' onclick='getmoji("emoji_1757")'>📤</span>
<span id='emoji_1758' onclick='getmoji("emoji_1758")'>📦</span>
<span id='emoji_1759' onclick='getmoji("emoji_1759")'>🏷</span>
<span id='emoji_1760' onclick='getmoji("emoji_1760")'>📪</span>
<span id='emoji_1761' onclick='getmoji("emoji_1761")'>📫</span>
<span id='emoji_1762' onclick='getmoji("emoji_1762")'>📬</span>
<span id='emoji_1763' onclick='getmoji("emoji_1763")'>📭</span>
<span id='emoji_1764' onclick='getmoji("emoji_1764")'>📮</span>
<span id='emoji_1765' onclick='getmoji("emoji_1765")'>📯</span>
<span id='emoji_1766' onclick='getmoji("emoji_1766")'>📜</span>
<span id='emoji_1767' onclick='getmoji("emoji_1767")'>📃</span>
<span id='emoji_1768' onclick='getmoji("emoji_1768")'>📄</span>
<span id='emoji_1769' onclick='getmoji("emoji_1769")'>📑</span>
<span id='emoji_1770' onclick='getmoji("emoji_1770")'>📊</span>
<span id='emoji_1771' onclick='getmoji("emoji_1771")'>📈</span>
<span id='emoji_1772' onclick='getmoji("emoji_1772")'>📉</span>
<span id='emoji_1773' onclick='getmoji("emoji_1773")'>🗒</span>
<span id='emoji_1774' onclick='getmoji("emoji_1774")'>🗓</span>
<span id='emoji_1775' onclick='getmoji("emoji_1775")'>📆</span>
<span id='emoji_1776' onclick='getmoji("emoji_1776")'>📅</span>
<span id='emoji_1777' onclick='getmoji("emoji_1777")'>📇</span>
<span id='emoji_1778' onclick='getmoji("emoji_1778")'>🗃</span>
<span id='emoji_1779' onclick='getmoji("emoji_1779")'>🗳</span>
<span id='emoji_1780' onclick='getmoji("emoji_1780")'>🗄</span>
<span id='emoji_1781' onclick='getmoji("emoji_1781")'>📋</span>
<span id='emoji_1782' onclick='getmoji("emoji_1782")'>📁</span>
<span id='emoji_1783' onclick='getmoji("emoji_1783")'>📂</span>
<span id='emoji_1784' onclick='getmoji("emoji_1784")'>🗂</span>
<span id='emoji_1785' onclick='getmoji("emoji_1785")'>🗞</span>
<span id='emoji_1786' onclick='getmoji("emoji_1786")'>📰</span>
<span id='emoji_1787' onclick='getmoji("emoji_1787")'>📓</span>
<span id='emoji_1788' onclick='getmoji("emoji_1788")'>📔</span>
<span id='emoji_1789' onclick='getmoji("emoji_1789")'>📒</span>
<span id='emoji_1790' onclick='getmoji("emoji_1790")'>📕</span>
<span id='emoji_1791' onclick='getmoji("emoji_1791")'>📗</span>
<span id='emoji_1792' onclick='getmoji("emoji_1792")'>📘</span>
<span id='emoji_1793' onclick='getmoji("emoji_1793")'>📙</span>
<span id='emoji_1794' onclick='getmoji("emoji_1794")'>📚</span>
<span id='emoji_1795' onclick='getmoji("emoji_1795")'>📖</span>
<span id='emoji_1796' onclick='getmoji("emoji_1796")'>🔖</span>
<span id='emoji_1797' onclick='getmoji("emoji_1797")'>🔗</span>
<span id='emoji_1798' onclick='getmoji("emoji_1798")'>📎</span>
<span id='emoji_1799' onclick='getmoji("emoji_1799")'>🖇</span>
<span id='emoji_1800' onclick='getmoji("emoji_1800")'>📐</span>
<span id='emoji_1801' onclick='getmoji("emoji_1801")'>📏</span>
<span id='emoji_1802' onclick='getmoji("emoji_1802")'>📌</span>
<span id='emoji_1803' onclick='getmoji("emoji_1803")'>📍</span>
<span id='emoji_1804' onclick='getmoji("emoji_1804")'>✂️</span>
<span id='emoji_1805' onclick='getmoji("emoji_1805")'>🖊</span>
<span id='emoji_1806' onclick='getmoji("emoji_1806")'>🖋</span>
<span id='emoji_1807' onclick='getmoji("emoji_1807")'>✒️</span>
<span id='emoji_1808' onclick='getmoji("emoji_1808")'>🖌</span>
<span id='emoji_1809' onclick='getmoji("emoji_1809")'>🖍</span>
<span id='emoji_1810' onclick='getmoji("emoji_1810")'>📝</span>
<span id='emoji_1811' onclick='getmoji("emoji_1811")'>✏️</span>
<span id='emoji_1812' onclick='getmoji("emoji_1812")'>🔍</span>
<span id='emoji_1813' onclick='getmoji("emoji_1813")'>🔎</span>
<span id='emoji_1814' onclick='getmoji("emoji_1814")'>🔏</span>
<span id='emoji_1815' onclick='getmoji("emoji_1815")'>🔐</span>
<span id='emoji_1816' onclick='getmoji("emoji_1816")'>🔒</span>
<span id='emoji_1817' onclick='getmoji("emoji_1817")'>🔓</span>
<span id='emoji_1818' onclick='getmoji("emoji_1818")'></span>
<span id='emoji_1819' onclick='getmoji("emoji_1819")'>❤️</span>
<span id='emoji_1820' onclick='getmoji("emoji_1820")'>🧡</span>
<span id='emoji_1821' onclick='getmoji("emoji_1821")'>💛</span>
<span id='emoji_1822' onclick='getmoji("emoji_1822")'>💚</span>
<span id='emoji_1823' onclick='getmoji("emoji_1823")'>💙</span>
<span id='emoji_1824' onclick='getmoji("emoji_1824")'>💜</span>
<span id='emoji_1825' onclick='getmoji("emoji_1825")'>🖤</span>
<span id='emoji_1826' onclick='getmoji("emoji_1826")'>💔</span>
<span id='emoji_1827' onclick='getmoji("emoji_1827")'>❣️</span>
<span id='emoji_1828' onclick='getmoji("emoji_1828")'>💕</span>
<span id='emoji_1829' onclick='getmoji("emoji_1829")'>💞</span>
<span id='emoji_1830' onclick='getmoji("emoji_1830")'>💓</span>
<span id='emoji_1831' onclick='getmoji("emoji_1831")'>💗</span>
<span id='emoji_1832' onclick='getmoji("emoji_1832")'>💖</span>
<span id='emoji_1833' onclick='getmoji("emoji_1833")'>💘</span>
<span id='emoji_1834' onclick='getmoji("emoji_1834")'>💝</span>
<span id='emoji_1835' onclick='getmoji("emoji_1835")'>💟</span>
<span id='emoji_1836' onclick='getmoji("emoji_1836")'>☮️</span>
<span id='emoji_1837' onclick='getmoji("emoji_1837")'>✝️</span>
<span id='emoji_1838' onclick='getmoji("emoji_1838")'>☪️</span>
<span id='emoji_1839' onclick='getmoji("emoji_1839")'>🕉</span>
<span id='emoji_1840' onclick='getmoji("emoji_1840")'>☸️</span>
<span id='emoji_1841' onclick='getmoji("emoji_1841")'>✡️</span>
<span id='emoji_1842' onclick='getmoji("emoji_1842")'>🔯</span>
<span id='emoji_1843' onclick='getmoji("emoji_1843")'>🕎</span>
<span id='emoji_1844' onclick='getmoji("emoji_1844")'>☯️</span>
<span id='emoji_1845' onclick='getmoji("emoji_1845")'>☦️</span>
<span id='emoji_1846' onclick='getmoji("emoji_1846")'>🛐</span>
<span id='emoji_1847' onclick='getmoji("emoji_1847")'>⛎</span>
<span id='emoji_1848' onclick='getmoji("emoji_1848")'>♈️</span>
<span id='emoji_1849' onclick='getmoji("emoji_1849")'>♉️</span>
<span id='emoji_1850' onclick='getmoji("emoji_1850")'>♊️</span>
<span id='emoji_1851' onclick='getmoji("emoji_1851")'>♋️</span>
<span id='emoji_1852' onclick='getmoji("emoji_1852")'>♌️</span>
<span id='emoji_1853' onclick='getmoji("emoji_1853")'>♍️</span>
<span id='emoji_1854' onclick='getmoji("emoji_1854")'>♎️</span>
<span id='emoji_1855' onclick='getmoji("emoji_1855")'>♏️</span>
<span id='emoji_1856' onclick='getmoji("emoji_1856")'>♐️</span>
<span id='emoji_1857' onclick='getmoji("emoji_1857")'>♑️</span>
<span id='emoji_1858' onclick='getmoji("emoji_1858")'>♒️</span>
<span id='emoji_1859' onclick='getmoji("emoji_1859")'>♓️</span>
<span id='emoji_1860' onclick='getmoji("emoji_1860")'>🆔</span>
<span id='emoji_1861' onclick='getmoji("emoji_1861")'>⚛️</span>
<span id='emoji_1862' onclick='getmoji("emoji_1862")'>🉑</span>
<span id='emoji_1863' onclick='getmoji("emoji_1863")'>☢️</span>
<span id='emoji_1864' onclick='getmoji("emoji_1864")'>☣️</span>
<span id='emoji_1865' onclick='getmoji("emoji_1865")'>📴</span>
<span id='emoji_1866' onclick='getmoji("emoji_1866")'>📳</span>
<span id='emoji_1867' onclick='getmoji("emoji_1867")'>🈶</span>
<span id='emoji_1868' onclick='getmoji("emoji_1868")'>🈚️</span>
<span id='emoji_1869' onclick='getmoji("emoji_1869")'>🈸</span>
<span id='emoji_1870' onclick='getmoji("emoji_1870")'>🈺</span>
<span id='emoji_1871' onclick='getmoji("emoji_1871")'>🈷️</span>
<span id='emoji_1872' onclick='getmoji("emoji_1872")'>✴️</span>
<span id='emoji_1873' onclick='getmoji("emoji_1873")'>🆚</span>
<span id='emoji_1874' onclick='getmoji("emoji_1874")'>💮</span>
<span id='emoji_1875' onclick='getmoji("emoji_1875")'>🉐</span>
<span id='emoji_1876' onclick='getmoji("emoji_1876")'>㊙️</span>
<span id='emoji_1877' onclick='getmoji("emoji_1877")'>㊗️</span>
<span id='emoji_1878' onclick='getmoji("emoji_1878")'>🈴</span>
<span id='emoji_1879' onclick='getmoji("emoji_1879")'>🈵</span>
<span id='emoji_1880' onclick='getmoji("emoji_1880")'>🈹</span>
<span id='emoji_1881' onclick='getmoji("emoji_1881")'>🈲</span>
<span id='emoji_1882' onclick='getmoji("emoji_1882")'>🅰️</span>
<span id='emoji_1883' onclick='getmoji("emoji_1883")'>🅱️</span>
<span id='emoji_1884' onclick='getmoji("emoji_1884")'>🆎</span>
<span id='emoji_1885' onclick='getmoji("emoji_1885")'>🆑</span>
<span id='emoji_1886' onclick='getmoji("emoji_1886")'>🅾️</span>
<span id='emoji_1887' onclick='getmoji("emoji_1887")'>🆘</span>
<span id='emoji_1888' onclick='getmoji("emoji_1888")'>❌</span>
<span id='emoji_1889' onclick='getmoji("emoji_1889")'>⭕️</span>
<span id='emoji_1890' onclick='getmoji("emoji_1890")'>🛑</span>
<span id='emoji_1891' onclick='getmoji("emoji_1891")'>⛔️</span>
<span id='emoji_1892' onclick='getmoji("emoji_1892")'>📛</span>
<span id='emoji_1893' onclick='getmoji("emoji_1893")'>🚫</span>
<span id='emoji_1894' onclick='getmoji("emoji_1894")'>💯</span>
<span id='emoji_1895' onclick='getmoji("emoji_1895")'>💢</span>
<span id='emoji_1896' onclick='getmoji("emoji_1896")'>♨️</span>
<span id='emoji_1897' onclick='getmoji("emoji_1897")'>🚷</span>
<span id='emoji_1898' onclick='getmoji("emoji_1898")'>🚯</span>
<span id='emoji_1899' onclick='getmoji("emoji_1899")'>🚳</span>
<span id='emoji_1900' onclick='getmoji("emoji_1900")'>🚱</span>
<span id='emoji_1901' onclick='getmoji("emoji_1901")'>🔞</span>
<span id='emoji_1902' onclick='getmoji("emoji_1902")'>📵</span>
<span id='emoji_1903' onclick='getmoji("emoji_1903")'>🚭</span>
<span id='emoji_1904' onclick='getmoji("emoji_1904")'>❗️</span>
<span id='emoji_1905' onclick='getmoji("emoji_1905")'>❕</span>
<span id='emoji_1906' onclick='getmoji("emoji_1906")'>❓</span>
<span id='emoji_1907' onclick='getmoji("emoji_1907")'>❔</span>
<span id='emoji_1908' onclick='getmoji("emoji_1908")'>‼️</span>
<span id='emoji_1909' onclick='getmoji("emoji_1909")'>⁉️</span>
<span id='emoji_1910' onclick='getmoji("emoji_1910")'>🔅</span>
<span id='emoji_1911' onclick='getmoji("emoji_1911")'>🔆</span>
<span id='emoji_1912' onclick='getmoji("emoji_1912")'>〽️</span>
<span id='emoji_1913' onclick='getmoji("emoji_1913")'>⚠️</span>
<span id='emoji_1914' onclick='getmoji("emoji_1914")'>🚸</span>
<span id='emoji_1915' onclick='getmoji("emoji_1915")'>🔱</span>
<span id='emoji_1916' onclick='getmoji("emoji_1916")'>⚜️</span>
<span id='emoji_1917' onclick='getmoji("emoji_1917")'>🔰</span>
<span id='emoji_1918' onclick='getmoji("emoji_1918")'>♻️</span>
<span id='emoji_1919' onclick='getmoji("emoji_1919")'>✅</span>
<span id='emoji_1920' onclick='getmoji("emoji_1920")'>🈯️</span>
<span id='emoji_1921' onclick='getmoji("emoji_1921")'>💹</span>
<span id='emoji_1922' onclick='getmoji("emoji_1922")'>❇️</span>
<span id='emoji_1923' onclick='getmoji("emoji_1923")'>✳️</span>
<span id='emoji_1924' onclick='getmoji("emoji_1924")'>❎</span>
<span id='emoji_1925' onclick='getmoji("emoji_1925")'>🌐</span>
<span id='emoji_1926' onclick='getmoji("emoji_1926")'>💠</span>
<span id='emoji_1927' onclick='getmoji("emoji_1927")'>Ⓜ️</span>
<span id='emoji_1928' onclick='getmoji("emoji_1928")'>🌀</span>
<span id='emoji_1929' onclick='getmoji("emoji_1929")'>💤</span>
<span id='emoji_1930' onclick='getmoji("emoji_1930")'>🏧</span>
<span id='emoji_1931' onclick='getmoji("emoji_1931")'>🚾</span>
<span id='emoji_1932' onclick='getmoji("emoji_1932")'>♿️</span>
<span id='emoji_1933' onclick='getmoji("emoji_1933")'>🅿️</span>
<span id='emoji_1934' onclick='getmoji("emoji_1934")'>🈳</span>
<span id='emoji_1935' onclick='getmoji("emoji_1935")'>🈂️</span>
<span id='emoji_1936' onclick='getmoji("emoji_1936")'>🛂</span>
<span id='emoji_1937' onclick='getmoji("emoji_1937")'>🛃</span>
<span id='emoji_1938' onclick='getmoji("emoji_1938")'>🛄</span>
<span id='emoji_1939' onclick='getmoji("emoji_1939")'>🛅</span>
<span id='emoji_1940' onclick='getmoji("emoji_1940")'>🚹</span>
<span id='emoji_1941' onclick='getmoji("emoji_1941")'>🚺</span>
<span id='emoji_1942' onclick='getmoji("emoji_1942")'>🚼</span>
<span id='emoji_1943' onclick='getmoji("emoji_1943")'>🚻</span>
<span id='emoji_1944' onclick='getmoji("emoji_1944")'>🚮</span>
<span id='emoji_1945' onclick='getmoji("emoji_1945")'>🎦</span>
<span id='emoji_1946' onclick='getmoji("emoji_1946")'>📶</span>
<span id='emoji_1947' onclick='getmoji("emoji_1947")'>🈁</span>
<span id='emoji_1948' onclick='getmoji("emoji_1948")'>🔣</span>
<span id='emoji_1949' onclick='getmoji("emoji_1949")'>ℹ️</span>
<span id='emoji_1950' onclick='getmoji("emoji_1950")'>🔤</span>
<span id='emoji_1951' onclick='getmoji("emoji_1951")'>🔡</span>
<span id='emoji_1952' onclick='getmoji("emoji_1952")'>🔠</span>
<span id='emoji_1953' onclick='getmoji("emoji_1953")'>🆖</span>
<span id='emoji_1954' onclick='getmoji("emoji_1954")'>🆗</span>
<span id='emoji_1955' onclick='getmoji("emoji_1955")'>🆙</span>
<span id='emoji_1956' onclick='getmoji("emoji_1956")'>🆒</span>
<span id='emoji_1957' onclick='getmoji("emoji_1957")'>🆕</span>
<span id='emoji_1958' onclick='getmoji("emoji_1958")'>🆓</span>
<span id='emoji_1959' onclick='getmoji("emoji_1959")'>0️⃣</span>
<span id='emoji_1960' onclick='getmoji("emoji_1960")'>1️⃣</span>
<span id='emoji_1961' onclick='getmoji("emoji_1961")'>2️⃣</span>
<span id='emoji_1962' onclick='getmoji("emoji_1962")'>3️⃣</span>
<span id='emoji_1963' onclick='getmoji("emoji_1963")'>4️⃣</span>
<span id='emoji_1964' onclick='getmoji("emoji_1964")'>5️⃣</span>
<span id='emoji_1965' onclick='getmoji("emoji_1965")'>6️⃣</span>
<span id='emoji_1966' onclick='getmoji("emoji_1966")'>7️⃣</span>
<span id='emoji_1967' onclick='getmoji("emoji_1967")'>8️⃣</span>
<span id='emoji_1968' onclick='getmoji("emoji_1968")'>9️⃣</span>
<span id='emoji_1969' onclick='getmoji("emoji_1969")'>🔟</span>
<span id='emoji_1970' onclick='getmoji("emoji_1970")'>🔢</span>
<span id='emoji_1971' onclick='getmoji("emoji_1971")'>#️⃣</span>
<span id='emoji_1972' onclick='getmoji("emoji_1972")'>*️⃣</span>
<span id='emoji_1973' onclick='getmoji("emoji_1973")'>⏏️</span>
<span id='emoji_1974' onclick='getmoji("emoji_1974")'>▶️</span>
<span id='emoji_1975' onclick='getmoji("emoji_1975")'>⏸</span>
<span id='emoji_1976' onclick='getmoji("emoji_1976")'>⏯</span>
<span id='emoji_1977' onclick='getmoji("emoji_1977")'>⏹</span>
<span id='emoji_1978' onclick='getmoji("emoji_1978")'>⏺</span>
<span id='emoji_1979' onclick='getmoji("emoji_1979")'>⏭</span>
<span id='emoji_1980' onclick='getmoji("emoji_1980")'>⏮</span>
<span id='emoji_1981' onclick='getmoji("emoji_1981")'>⏩</span>
<span id='emoji_1982' onclick='getmoji("emoji_1982")'>⏪</span>
<span id='emoji_1983' onclick='getmoji("emoji_1983")'>⏫</span>
<span id='emoji_1984' onclick='getmoji("emoji_1984")'>⏬</span>
<span id='emoji_1985' onclick='getmoji("emoji_1985")'>◀️</span>
<span id='emoji_1986' onclick='getmoji("emoji_1986")'>🔼</span>
<span id='emoji_1987' onclick='getmoji("emoji_1987")'>🔽</span>
<span id='emoji_1988' onclick='getmoji("emoji_1988")'>➡️</span>
<span id='emoji_1989' onclick='getmoji("emoji_1989")'>⬅️</span>
<span id='emoji_1990' onclick='getmoji("emoji_1990")'>⬆️</span>
<span id='emoji_1991' onclick='getmoji("emoji_1991")'>⬇️</span>
<span id='emoji_1992' onclick='getmoji("emoji_1992")'>↗️</span>
<span id='emoji_1993' onclick='getmoji("emoji_1993")'>↘️</span>
<span id='emoji_1994' onclick='getmoji("emoji_1994")'>↙️</span>
<span id='emoji_1995' onclick='getmoji("emoji_1995")'>↖️</span>
<span id='emoji_1996' onclick='getmoji("emoji_1996")'>↕️</span>
<span id='emoji_1997' onclick='getmoji("emoji_1997")'>↔️</span>
<span id='emoji_1998' onclick='getmoji("emoji_1998")'>↪️</span>
<span id='emoji_1999' onclick='getmoji("emoji_1999")'>↩️</span>
<span id='emoji_2000' onclick='getmoji("emoji_2000")'>⤴️</span>
<span id='emoji_2001' onclick='getmoji("emoji_2001")'>⤵️</span>
<span id='emoji_2002' onclick='getmoji("emoji_2002")'>🔀</span>
<span id='emoji_2003' onclick='getmoji("emoji_2003")'>🔁</span>
<span id='emoji_2004' onclick='getmoji("emoji_2004")'>🔂</span>
<span id='emoji_2005' onclick='getmoji("emoji_2005")'>🔄</span>
<span id='emoji_2006' onclick='getmoji("emoji_2006")'>🔃</span>
<span id='emoji_2007' onclick='getmoji("emoji_2007")'>🎵</span>
<span id='emoji_2008' onclick='getmoji("emoji_2008")'>🎶</span>
<span id='emoji_2009' onclick='getmoji("emoji_2009")'>➕</span>
<span id='emoji_2010' onclick='getmoji("emoji_2010")'>➖</span>
<span id='emoji_2011' onclick='getmoji("emoji_2011")'>➗</span>
<span id='emoji_2012' onclick='getmoji("emoji_2012")'>✖️</span>
<span id='emoji_2013' onclick='getmoji("emoji_2013")'>♾</span>
<span id='emoji_2014' onclick='getmoji("emoji_2014")'>💲</span>
<span id='emoji_2015' onclick='getmoji("emoji_2015")'>💱</span>
<span id='emoji_2016' onclick='getmoji("emoji_2016")'>™️</span>
<span id='emoji_2017' onclick='getmoji("emoji_2017")'>©️</span>
<span id='emoji_2018' onclick='getmoji("emoji_2018")'>®️</span>
<span id='emoji_2019' onclick='getmoji("emoji_2019")'>〰️</span>
<span id='emoji_2020' onclick='getmoji("emoji_2020")'>➰</span>
<span id='emoji_2021' onclick='getmoji("emoji_2021")'>➿</span>
<span id='emoji_2022' onclick='getmoji("emoji_2022")'>🔚</span>
<span id='emoji_2023' onclick='getmoji("emoji_2023")'>🔙</span>
<span id='emoji_2024' onclick='getmoji("emoji_2024")'>🔛</span>
<span id='emoji_2025' onclick='getmoji("emoji_2025")'>🔝</span>
<span id='emoji_2026' onclick='getmoji("emoji_2026")'>🔜</span>
<span id='emoji_2027' onclick='getmoji("emoji_2027")'>✔️</span>
<span id='emoji_2028' onclick='getmoji("emoji_2028")'>☑️</span>
<span id='emoji_2029' onclick='getmoji("emoji_2029")'>🔘</span>
<span id='emoji_2030' onclick='getmoji("emoji_2030")'>⚪️</span>
<span id='emoji_2031' onclick='getmoji("emoji_2031")'>⚫️</span>
<span id='emoji_2032' onclick='getmoji("emoji_2032")'>🔴</span>
<span id='emoji_2033' onclick='getmoji("emoji_2033")'>🔵</span>
<span id='emoji_2034' onclick='getmoji("emoji_2034")'>🔺</span>
<span id='emoji_2035' onclick='getmoji("emoji_2035")'>🔻</span>
<span id='emoji_2036' onclick='getmoji("emoji_2036")'>🔸</span>
<span id='emoji_2037' onclick='getmoji("emoji_2037")'>🔹</span>
<span id='emoji_2038' onclick='getmoji("emoji_2038")'>🔶</span>
<span id='emoji_2039' onclick='getmoji("emoji_2039")'>🔷</span>
<span id='emoji_2040' onclick='getmoji("emoji_2040")'>🔳</span>
<span id='emoji_2041' onclick='getmoji("emoji_2041")'>🔲</span>
<span id='emoji_2042' onclick='getmoji("emoji_2042")'>▪️</span>
<span id='emoji_2043' onclick='getmoji("emoji_2043")'>▫️</span>
<span id='emoji_2044' onclick='getmoji("emoji_2044")'>◾️</span>
<span id='emoji_2045' onclick='getmoji("emoji_2045")'>◽️</span>
<span id='emoji_2046' onclick='getmoji("emoji_2046")'>◼️</span>
<span id='emoji_2047' onclick='getmoji("emoji_2047")'>◻️</span>
<span id='emoji_2048' onclick='getmoji("emoji_2048")'>⬛️</span>
<span id='emoji_2049' onclick='getmoji("emoji_2049")'>⬜️</span>
<span id='emoji_2050' onclick='getmoji("emoji_2050")'>🔈</span>
<span id='emoji_2051' onclick='getmoji("emoji_2051")'>🔇</span>
<span id='emoji_2052' onclick='getmoji("emoji_2052")'>🔉</span>
<span id='emoji_2053' onclick='getmoji("emoji_2053")'>🔊</span>
<span id='emoji_2054' onclick='getmoji("emoji_2054")'>🔔</span>
<span id='emoji_2055' onclick='getmoji("emoji_2055")'>🔕</span>
<span id='emoji_2056' onclick='getmoji("emoji_2056")'>📣</span>
<span id='emoji_2057' onclick='getmoji("emoji_2057")'>📢</span>
<span id='emoji_2058' onclick='getmoji("emoji_2058")'>👁‍🗨</span>
<span id='emoji_2059' onclick='getmoji("emoji_2059")'>💬</span>
<span id='emoji_2060' onclick='getmoji("emoji_2060")'>💭</span>
<span id='emoji_2061' onclick='getmoji("emoji_2061")'>🗯</span>
<span id='emoji_2062' onclick='getmoji("emoji_2062")'>♠️</span>
<span id='emoji_2063' onclick='getmoji("emoji_2063")'>♣️</span>
<span id='emoji_2064' onclick='getmoji("emoji_2064")'>♥️</span>
<span id='emoji_2065' onclick='getmoji("emoji_2065")'>♦️</span>
<span id='emoji_2066' onclick='getmoji("emoji_2066")'>🃏</span>
<span id='emoji_2067' onclick='getmoji("emoji_2067")'>🎴</span>
<span id='emoji_2068' onclick='getmoji("emoji_2068")'>🀄️</span>
<span id='emoji_2069' onclick='getmoji("emoji_2069")'>🕐</span>
<span id='emoji_2070' onclick='getmoji("emoji_2070")'>🕑</span>
<span id='emoji_2071' onclick='getmoji("emoji_2071")'>🕒</span>
<span id='emoji_2072' onclick='getmoji("emoji_2072")'>🕓</span>
<span id='emoji_2073' onclick='getmoji("emoji_2073")'>🕔</span>
<span id='emoji_2074' onclick='getmoji("emoji_2074")'>🕕</span>
<span id='emoji_2075' onclick='getmoji("emoji_2075")'>🕖</span>
<span id='emoji_2076' onclick='getmoji("emoji_2076")'>🕗</span>
<span id='emoji_2077' onclick='getmoji("emoji_2077")'>🕘</span>
<span id='emoji_2078' onclick='getmoji("emoji_2078")'>🕙</span>
<span id='emoji_2079' onclick='getmoji("emoji_2079")'>🕚</span>
<span id='emoji_2080' onclick='getmoji("emoji_2080")'>🕛</span>
<span id='emoji_2081' onclick='getmoji("emoji_2081")'>🕜</span>
<span id='emoji_2082' onclick='getmoji("emoji_2082")'>🕝</span>
<span id='emoji_2083' onclick='getmoji("emoji_2083")'>🕞</span>
<span id='emoji_2084' onclick='getmoji("emoji_2084")'>🕟</span>
<span id='emoji_2085' onclick='getmoji("emoji_2085")'>🕠</span>
<span id='emoji_2086' onclick='getmoji("emoji_2086")'>🕡</span>
<span id='emoji_2087' onclick='getmoji("emoji_2087")'>🕢</span>
<span id='emoji_2088' onclick='getmoji("emoji_2088")'>🕣</span>
<span id='emoji_2089' onclick='getmoji("emoji_2089")'>🕤</span>
<span id='emoji_2090' onclick='getmoji("emoji_2090")'>🕥</span>
<span id='emoji_2091' onclick='getmoji("emoji_2091")'>🕦</span>
<span id='emoji_2092' onclick='getmoji("emoji_2092")'>🕧</span>
<span id='emoji_2093' onclick='getmoji("emoji_2093")'></span>
<span id='emoji_2094' onclick='getmoji("emoji_2094")'>🏳️</span>
<span id='emoji_2095' onclick='getmoji("emoji_2095")'>🏴</span>
<span id='emoji_2096' onclick='getmoji("emoji_2096")'>🏁</span>
<span id='emoji_2097' onclick='getmoji("emoji_2097")'>🚩</span>
<span id='emoji_2098' onclick='getmoji("emoji_2098")'>🏳️‍🌈</span>
<span id='emoji_2099' onclick='getmoji("emoji_2099")'>🏴‍☠️</span>
<span id='emoji_2100' onclick='getmoji("emoji_2100")'>🇦🇫</span>
<span id='emoji_2101' onclick='getmoji("emoji_2101")'>🇦🇽</span>
<span id='emoji_2102' onclick='getmoji("emoji_2102")'>🇦🇱</span>
<span id='emoji_2103' onclick='getmoji("emoji_2103")'>🇩🇿</span>
<span id='emoji_2104' onclick='getmoji("emoji_2104")'>🇦🇸</span>
<span id='emoji_2105' onclick='getmoji("emoji_2105")'>🇦🇩</span>
<span id='emoji_2106' onclick='getmoji("emoji_2106")'>🇦🇴</span>
<span id='emoji_2107' onclick='getmoji("emoji_2107")'>🇦🇮</span>
<span id='emoji_2108' onclick='getmoji("emoji_2108")'>🇦🇶</span>
<span id='emoji_2109' onclick='getmoji("emoji_2109")'>🇦🇬</span>
<span id='emoji_2110' onclick='getmoji("emoji_2110")'>🇦🇷</span>
<span id='emoji_2111' onclick='getmoji("emoji_2111")'>🇦🇲</span>
<span id='emoji_2112' onclick='getmoji("emoji_2112")'>🇦🇼</span>
<span id='emoji_2113' onclick='getmoji("emoji_2113")'>🇦🇺</span>
<span id='emoji_2114' onclick='getmoji("emoji_2114")'>🇦🇹</span>
<span id='emoji_2115' onclick='getmoji("emoji_2115")'>🇦🇿</span>
<span id='emoji_2116' onclick='getmoji("emoji_2116")'>🇧🇸</span>
<span id='emoji_2117' onclick='getmoji("emoji_2117")'>🇧🇭</span>
<span id='emoji_2118' onclick='getmoji("emoji_2118")'>🇧🇩</span>
<span id='emoji_2119' onclick='getmoji("emoji_2119")'>🇧🇧</span>
<span id='emoji_2120' onclick='getmoji("emoji_2120")'>🇧🇾</span>
<span id='emoji_2121' onclick='getmoji("emoji_2121")'>🇧🇪</span>
<span id='emoji_2122' onclick='getmoji("emoji_2122")'>🇧🇿</span>
<span id='emoji_2123' onclick='getmoji("emoji_2123")'>🇧🇯</span>
<span id='emoji_2124' onclick='getmoji("emoji_2124")'>🇧🇲</span>
<span id='emoji_2125' onclick='getmoji("emoji_2125")'>🇧🇹</span>
<span id='emoji_2126' onclick='getmoji("emoji_2126")'>🇧🇴</span>
<span id='emoji_2127' onclick='getmoji("emoji_2127")'>🇧🇦</span>
<span id='emoji_2128' onclick='getmoji("emoji_2128")'>🇧🇼</span>
<span id='emoji_2129' onclick='getmoji("emoji_2129")'>🇧🇷</span>
<span id='emoji_2130' onclick='getmoji("emoji_2130")'>🇮🇴</span>
<span id='emoji_2131' onclick='getmoji("emoji_2131")'>🇻🇬</span>
<span id='emoji_2132' onclick='getmoji("emoji_2132")'>🇧🇳</span>
<span id='emoji_2133' onclick='getmoji("emoji_2133")'>🇧🇬</span>
<span id='emoji_2134' onclick='getmoji("emoji_2134")'>🇧🇫</span>
<span id='emoji_2135' onclick='getmoji("emoji_2135")'>🇧🇮</span>
<span id='emoji_2136' onclick='getmoji("emoji_2136")'>🇰🇭</span>
<span id='emoji_2137' onclick='getmoji("emoji_2137")'>🇨🇲</span>
<span id='emoji_2138' onclick='getmoji("emoji_2138")'>🇨🇦</span>
<span id='emoji_2139' onclick='getmoji("emoji_2139")'>🇮🇨</span>
<span id='emoji_2140' onclick='getmoji("emoji_2140")'>🇨🇻</span>
<span id='emoji_2141' onclick='getmoji("emoji_2141")'>🇧🇶</span>
<span id='emoji_2142' onclick='getmoji("emoji_2142")'>🇰🇾</span>
<span id='emoji_2143' onclick='getmoji("emoji_2143")'>🇨🇫</span>
<span id='emoji_2144' onclick='getmoji("emoji_2144")'>🇹🇩</span>
<span id='emoji_2145' onclick='getmoji("emoji_2145")'>🇨🇱</span>
<span id='emoji_2146' onclick='getmoji("emoji_2146")'>🇨🇳</span>
<span id='emoji_2147' onclick='getmoji("emoji_2147")'>🇨🇽</span>
<span id='emoji_2148' onclick='getmoji("emoji_2148")'>🇨🇨</span>
<span id='emoji_2149' onclick='getmoji("emoji_2149")'>🇨🇴</span>
<span id='emoji_2150' onclick='getmoji("emoji_2150")'>🇰🇲</span>
<span id='emoji_2151' onclick='getmoji("emoji_2151")'>🇨🇬</span>
<span id='emoji_2152' onclick='getmoji("emoji_2152")'>🇨🇩</span>
<span id='emoji_2153' onclick='getmoji("emoji_2153")'>🇨🇰</span>
<span id='emoji_2154' onclick='getmoji("emoji_2154")'>🇨🇷</span>
<span id='emoji_2155' onclick='getmoji("emoji_2155")'>🇨🇮</span>
<span id='emoji_2156' onclick='getmoji("emoji_2156")'>🇭🇷</span>
<span id='emoji_2157' onclick='getmoji("emoji_2157")'>🇨🇺</span>
<span id='emoji_2158' onclick='getmoji("emoji_2158")'>🇨🇼</span>
<span id='emoji_2159' onclick='getmoji("emoji_2159")'>🇨🇾</span>
<span id='emoji_2160' onclick='getmoji("emoji_2160")'>🇨🇿</span>
<span id='emoji_2161' onclick='getmoji("emoji_2161")'>🇩🇰</span>
<span id='emoji_2162' onclick='getmoji("emoji_2162")'>🇩🇯</span>
<span id='emoji_2163' onclick='getmoji("emoji_2163")'>🇩🇲</span>
<span id='emoji_2164' onclick='getmoji("emoji_2164")'>🇩🇴</span>
<span id='emoji_2165' onclick='getmoji("emoji_2165")'>🇪🇨</span>
<span id='emoji_2166' onclick='getmoji("emoji_2166")'>🇪🇬</span>
<span id='emoji_2167' onclick='getmoji("emoji_2167")'>🇸🇻</span>
<span id='emoji_2168' onclick='getmoji("emoji_2168")'>🇬🇶</span>
<span id='emoji_2169' onclick='getmoji("emoji_2169")'>🇪🇷</span>
<span id='emoji_2170' onclick='getmoji("emoji_2170")'>🇪🇪</span>
<span id='emoji_2171' onclick='getmoji("emoji_2171")'>🇪🇹</span>
<span id='emoji_2172' onclick='getmoji("emoji_2172")'>🇪🇺</span>
<span id='emoji_2173' onclick='getmoji("emoji_2173")'>🇫🇰</span>
<span id='emoji_2174' onclick='getmoji("emoji_2174")'>🇫🇴</span>
<span id='emoji_2175' onclick='getmoji("emoji_2175")'>🇫🇯</span>
<span id='emoji_2176' onclick='getmoji("emoji_2176")'>🇫🇮</span>
<span id='emoji_2177' onclick='getmoji("emoji_2177")'>🇫🇷</span>
<span id='emoji_2178' onclick='getmoji("emoji_2178")'>🇬🇫</span>
<span id='emoji_2179' onclick='getmoji("emoji_2179")'>🇵🇫</span>
<span id='emoji_2180' onclick='getmoji("emoji_2180")'>🇹🇫</span>
<span id='emoji_2181' onclick='getmoji("emoji_2181")'>🇬🇦</span>
<span id='emoji_2182' onclick='getmoji("emoji_2182")'>🇬🇲</span>
<span id='emoji_2183' onclick='getmoji("emoji_2183")'>🇬🇪</span>
<span id='emoji_2184' onclick='getmoji("emoji_2184")'>🇩🇪</span>
<span id='emoji_2185' onclick='getmoji("emoji_2185")'>🇬🇭</span>
<span id='emoji_2186' onclick='getmoji("emoji_2186")'>🇬🇮</span>
<span id='emoji_2187' onclick='getmoji("emoji_2187")'>🇬🇷</span>
<span id='emoji_2188' onclick='getmoji("emoji_2188")'>🇬🇱</span>
<span id='emoji_2189' onclick='getmoji("emoji_2189")'>🇬🇩</span>
<span id='emoji_2190' onclick='getmoji("emoji_2190")'>🇬🇵</span>
<span id='emoji_2191' onclick='getmoji("emoji_2191")'>🇬🇺</span>
<span id='emoji_2192' onclick='getmoji("emoji_2192")'>🇬🇹</span>
<span id='emoji_2193' onclick='getmoji("emoji_2193")'>🇬🇬</span>
<span id='emoji_2194' onclick='getmoji("emoji_2194")'>🇬🇳</span>
<span id='emoji_2195' onclick='getmoji("emoji_2195")'>🇬🇼</span>
<span id='emoji_2196' onclick='getmoji("emoji_2196")'>🇬🇾</span>
<span id='emoji_2197' onclick='getmoji("emoji_2197")'>🇭🇹</span>
<span id='emoji_2198' onclick='getmoji("emoji_2198")'>🇭🇳</span>
<span id='emoji_2199' onclick='getmoji("emoji_2199")'>🇭🇰</span>
<span id='emoji_2200' onclick='getmoji("emoji_2200")'>🇭🇺</span>
<span id='emoji_2201' onclick='getmoji("emoji_2201")'>🇮🇸</span>
<span id='emoji_2202' onclick='getmoji("emoji_2202")'>🇮🇳</span>
<span id='emoji_2203' onclick='getmoji("emoji_2203")'>🇮🇩</span>
<span id='emoji_2204' onclick='getmoji("emoji_2204")'>🇮🇷</span>
<span id='emoji_2205' onclick='getmoji("emoji_2205")'>🇮🇶</span>
<span id='emoji_2206' onclick='getmoji("emoji_2206")'>🇮🇪</span>
<span id='emoji_2207' onclick='getmoji("emoji_2207")'>🇮🇲</span>
<span id='emoji_2208' onclick='getmoji("emoji_2208")'>🇮🇱</span>
<span id='emoji_2209' onclick='getmoji("emoji_2209")'>🇮🇹</span>
<span id='emoji_2210' onclick='getmoji("emoji_2210")'>🇯🇲</span>
<span id='emoji_2211' onclick='getmoji("emoji_2211")'>🇯🇵</span>
<span id='emoji_2212' onclick='getmoji("emoji_2212")'>🎌</span>
<span id='emoji_2213' onclick='getmoji("emoji_2213")'>🇯🇪</span>
<span id='emoji_2214' onclick='getmoji("emoji_2214")'>🇯🇴</span>
<span id='emoji_2215' onclick='getmoji("emoji_2215")'>🇰🇿</span>
<span id='emoji_2216' onclick='getmoji("emoji_2216")'>🇰🇪</span>
<span id='emoji_2217' onclick='getmoji("emoji_2217")'>🇰🇮</span>
<span id='emoji_2218' onclick='getmoji("emoji_2218")'>🇽🇰</span>
<span id='emoji_2219' onclick='getmoji("emoji_2219")'>🇰🇼</span>
<span id='emoji_2220' onclick='getmoji("emoji_2220")'>🇰🇬</span>
<span id='emoji_2221' onclick='getmoji("emoji_2221")'>🇱🇦</span>
<span id='emoji_2222' onclick='getmoji("emoji_2222")'>🇱🇻</span>
<span id='emoji_2223' onclick='getmoji("emoji_2223")'>🇱🇧</span>
<span id='emoji_2224' onclick='getmoji("emoji_2224")'>🇱🇸</span>
<span id='emoji_2225' onclick='getmoji("emoji_2225")'>🇱🇷</span>
<span id='emoji_2226' onclick='getmoji("emoji_2226")'>🇱🇾</span>
<span id='emoji_2227' onclick='getmoji("emoji_2227")'>🇱🇮</span>
<span id='emoji_2228' onclick='getmoji("emoji_2228")'>🇱🇹</span>
<span id='emoji_2229' onclick='getmoji("emoji_2229")'>🇱🇺</span>
<span id='emoji_2230' onclick='getmoji("emoji_2230")'>🇲🇴</span>
<span id='emoji_2231' onclick='getmoji("emoji_2231")'>🇲🇰</span>
<span id='emoji_2232' onclick='getmoji("emoji_2232")'>🇲🇬</span>
<span id='emoji_2233' onclick='getmoji("emoji_2233")'>🇲🇼</span>
<span id='emoji_2234' onclick='getmoji("emoji_2234")'>🇲🇾</span>
<span id='emoji_2235' onclick='getmoji("emoji_2235")'>🇲🇻</span>
<span id='emoji_2236' onclick='getmoji("emoji_2236")'>🇲🇱</span>
<span id='emoji_2237' onclick='getmoji("emoji_2237")'>🇲🇹</span>
<span id='emoji_2238' onclick='getmoji("emoji_2238")'>🇲🇭</span>
<span id='emoji_2239' onclick='getmoji("emoji_2239")'>🇲🇶</span>
<span id='emoji_2240' onclick='getmoji("emoji_2240")'>🇲🇷</span>
<span id='emoji_2241' onclick='getmoji("emoji_2241")'>🇲🇺</span>
<span id='emoji_2242' onclick='getmoji("emoji_2242")'>🇾🇹</span>
<span id='emoji_2243' onclick='getmoji("emoji_2243")'>🇲🇽</span>
<span id='emoji_2244' onclick='getmoji("emoji_2244")'>🇫🇲</span>
<span id='emoji_2245' onclick='getmoji("emoji_2245")'>🇲🇩</span>
<span id='emoji_2246' onclick='getmoji("emoji_2246")'>🇲🇨</span>
<span id='emoji_2247' onclick='getmoji("emoji_2247")'>🇲🇳</span>
<span id='emoji_2248' onclick='getmoji("emoji_2248")'>🇲🇪</span>
<span id='emoji_2249' onclick='getmoji("emoji_2249")'>🇲🇸</span>
<span id='emoji_2250' onclick='getmoji("emoji_2250")'>🇲🇦</span>
<span id='emoji_2251' onclick='getmoji("emoji_2251")'>🇲🇿</span>
<span id='emoji_2252' onclick='getmoji("emoji_2252")'>🇲🇲</span>
<span id='emoji_2253' onclick='getmoji("emoji_2253")'>🇳🇦</span>
<span id='emoji_2254' onclick='getmoji("emoji_2254")'>🇳🇷</span>
<span id='emoji_2255' onclick='getmoji("emoji_2255")'>🇳🇵</span>
<span id='emoji_2256' onclick='getmoji("emoji_2256")'>🇳🇱</span>
<span id='emoji_2257' onclick='getmoji("emoji_2257")'>🇳🇨</span>
<span id='emoji_2258' onclick='getmoji("emoji_2258")'>🇳🇿</span>
<span id='emoji_2259' onclick='getmoji("emoji_2259")'>🇳🇮</span>
<span id='emoji_2260' onclick='getmoji("emoji_2260")'>🇳🇪</span>
<span id='emoji_2261' onclick='getmoji("emoji_2261")'>🇳🇬</span>
<span id='emoji_2262' onclick='getmoji("emoji_2262")'>🇳🇺</span>
<span id='emoji_2263' onclick='getmoji("emoji_2263")'>🇳🇫</span>
<span id='emoji_2264' onclick='getmoji("emoji_2264")'>🇰🇵</span>
<span id='emoji_2265' onclick='getmoji("emoji_2265")'>🇲🇵</span>
<span id='emoji_2266' onclick='getmoji("emoji_2266")'>🇳🇴</span>
<span id='emoji_2267' onclick='getmoji("emoji_2267")'>🇴🇲</span>
<span id='emoji_2268' onclick='getmoji("emoji_2268")'>🇵🇰</span>
<span id='emoji_2269' onclick='getmoji("emoji_2269")'>🇵🇼</span>
<span id='emoji_2270' onclick='getmoji("emoji_2270")'>🇵🇸</span>
<span id='emoji_2271' onclick='getmoji("emoji_2271")'>🇵🇦</span>
<span id='emoji_2272' onclick='getmoji("emoji_2272")'>🇵🇬</span>
<span id='emoji_2273' onclick='getmoji("emoji_2273")'>🇵🇾</span>
<span id='emoji_2274' onclick='getmoji("emoji_2274")'>🇵🇪</span>
<span id='emoji_2275' onclick='getmoji("emoji_2275")'>🇵🇭</span>
<span id='emoji_2276' onclick='getmoji("emoji_2276")'>🇵🇳</span>
<span id='emoji_2277' onclick='getmoji("emoji_2277")'>🇵🇱</span>
<span id='emoji_2278' onclick='getmoji("emoji_2278")'>🇵🇹</span>
<span id='emoji_2279' onclick='getmoji("emoji_2279")'>🇵🇷</span>
<span id='emoji_2280' onclick='getmoji("emoji_2280")'>🇶🇦</span>
<span id='emoji_2281' onclick='getmoji("emoji_2281")'>🇷🇪</span>
<span id='emoji_2282' onclick='getmoji("emoji_2282")'>🇷🇴</span>
<span id='emoji_2283' onclick='getmoji("emoji_2283")'>🇷🇺</span>
<span id='emoji_2284' onclick='getmoji("emoji_2284")'>🇷🇼</span>
<span id='emoji_2285' onclick='getmoji("emoji_2285")'>🇼🇸</span>
<span id='emoji_2286' onclick='getmoji("emoji_2286")'>🇸🇲</span>
<span id='emoji_2287' onclick='getmoji("emoji_2287")'>🇸🇦</span>
<span id='emoji_2288' onclick='getmoji("emoji_2288")'>🇸🇳</span>
<span id='emoji_2289' onclick='getmoji("emoji_2289")'>🇷🇸</span>
<span id='emoji_2290' onclick='getmoji("emoji_2290")'>🇸🇨</span>
<span id='emoji_2291' onclick='getmoji("emoji_2291")'>🇸🇱</span>
<span id='emoji_2292' onclick='getmoji("emoji_2292")'>🇸🇬</span>
<span id='emoji_2293' onclick='getmoji("emoji_2293")'>🇸🇽</span>
<span id='emoji_2294' onclick='getmoji("emoji_2294")'>🇸🇰</span>
<span id='emoji_2295' onclick='getmoji("emoji_2295")'>🇸🇮</span>
<span id='emoji_2296' onclick='getmoji("emoji_2296")'>🇬🇸</span>
<span id='emoji_2297' onclick='getmoji("emoji_2297")'>🇸🇧</span>
<span id='emoji_2298' onclick='getmoji("emoji_2298")'>🇸🇴</span>
<span id='emoji_2299' onclick='getmoji("emoji_2299")'>🇿🇦</span>
<span id='emoji_2300' onclick='getmoji("emoji_2300")'>🇰🇷</span>
<span id='emoji_2301' onclick='getmoji("emoji_2301")'>🇸🇸</span>
<span id='emoji_2302' onclick='getmoji("emoji_2302")'>🇪🇸</span>
<span id='emoji_2303' onclick='getmoji("emoji_2303")'>🇱🇰</span>
<span id='emoji_2304' onclick='getmoji("emoji_2304")'>🇧🇱</span>
<span id='emoji_2305' onclick='getmoji("emoji_2305")'>🇸🇭</span>
<span id='emoji_2306' onclick='getmoji("emoji_2306")'>🇰🇳</span>
<span id='emoji_2307' onclick='getmoji("emoji_2307")'>🇱🇨</span>
<span id='emoji_2308' onclick='getmoji("emoji_2308")'>🇵🇲</span>
<span id='emoji_2309' onclick='getmoji("emoji_2309")'>🇻🇨</span>
<span id='emoji_2310' onclick='getmoji("emoji_2310")'>🇸🇩</span>
<span id='emoji_2311' onclick='getmoji("emoji_2311")'>🇸🇷</span>
<span id='emoji_2312' onclick='getmoji("emoji_2312")'>🇸🇿</span>
<span id='emoji_2313' onclick='getmoji("emoji_2313")'>🇸🇪</span>
<span id='emoji_2314' onclick='getmoji("emoji_2314")'>🇨🇭</span>
<span id='emoji_2315' onclick='getmoji("emoji_2315")'>🇸🇾</span>
<span id='emoji_2316' onclick='getmoji("emoji_2316")'>🇹🇼</span>
<span id='emoji_2317' onclick='getmoji("emoji_2317")'>🇹🇯</span>
<span id='emoji_2318' onclick='getmoji("emoji_2318")'>🇹🇿</span>
<span id='emoji_2319' onclick='getmoji("emoji_2319")'>🇹🇭</span>
<span id='emoji_2320' onclick='getmoji("emoji_2320")'>🇹🇱</span>
<span id='emoji_2321' onclick='getmoji("emoji_2321")'>🇹🇬</span>
<span id='emoji_2322' onclick='getmoji("emoji_2322")'>🇹🇰</span>
<span id='emoji_2323' onclick='getmoji("emoji_2323")'>🇹🇴</span>
<span id='emoji_2324' onclick='getmoji("emoji_2324")'>🇹🇹</span>
<span id='emoji_2325' onclick='getmoji("emoji_2325")'>🇹🇳</span>
<span id='emoji_2326' onclick='getmoji("emoji_2326")'>🇹🇷</span>
<span id='emoji_2327' onclick='getmoji("emoji_2327")'>🇹🇲</span>
<span id='emoji_2328' onclick='getmoji("emoji_2328")'>🇹🇨</span>
<span id='emoji_2329' onclick='getmoji("emoji_2329")'>🇹🇻</span>
<span id='emoji_2330' onclick='getmoji("emoji_2330")'>🇻🇮</span>
<span id='emoji_2331' onclick='getmoji("emoji_2331")'>🇺🇬</span>
<span id='emoji_2332' onclick='getmoji("emoji_2332")'>🇺🇦</span>
<span id='emoji_2333' onclick='getmoji("emoji_2333")'>🇦🇪</span>
<span id='emoji_2334' onclick='getmoji("emoji_2334")'>🇬🇧</span>
<span id='emoji_2335' onclick='getmoji("emoji_2335")'>🏴󠁧󠁢󠁥󠁮󠁧󠁿</span>
<span id='emoji_2336' onclick='getmoji("emoji_2336")'>🏴󠁧󠁢󠁳󠁣󠁴󠁿</span>
<span id='emoji_2337' onclick='getmoji("emoji_2337")'>🏴󠁧󠁢󠁷󠁬󠁳󠁿</span>
<span id='emoji_2338' onclick='getmoji("emoji_2338")'>🇺🇳</span>
<span id='emoji_2339' onclick='getmoji("emoji_2339")'>🇺🇸</span>
<span id='emoji_2340' onclick='getmoji("emoji_2340")'>🇺🇾</span>
<span id='emoji_2341' onclick='getmoji("emoji_2341")'>🇺🇿</span>
<span id='emoji_2342' onclick='getmoji("emoji_2342")'>🇻🇺</span>
<span id='emoji_2343' onclick='getmoji("emoji_2343")'>🇻🇦</span>
<span id='emoji_2344' onclick='getmoji("emoji_2344")'>🇻🇪</span>
<span id='emoji_2345' onclick='getmoji("emoji_2345")'>🇻🇳</span>
<span id='emoji_2346' onclick='getmoji("emoji_2346")'>🇼🇫</span>
<span id='emoji_2347' onclick='getmoji("emoji_2347")'>🇪🇭</span>
<span id='emoji_2348' onclick='getmoji("emoji_2348")'>🇾🇪</span>
<span id='emoji_2349' onclick='getmoji("emoji_2349")'>🇿🇲</span>
<span id='emoji_2350' onclick='getmoji("emoji_2350")'>🇿🇼</span>

      </div>


      <button onclick="getmoji('open')">Emojis anzeigen!</button></div>

<script>

function getmoji(hash){
    if (hash == "open"){
        var doc= document.getElementById("emoji");
        doc.style.display = (doc.style.display == "none") ? "block" : "none";
    }else{
        try{
var mojie= document.getElementById(hash).innerHTML;
document.getElementById("space").value += " <span id='em' onclick='getmoji('" + hash + "')'>" + mojie + "</span> ";
        }catch(e){}
    }
}
dragElement(document.getElementById("emojies"));
</script>
<!--
<div class="stars"></div>
<div class="twinkling"></div>
<div class="clouds"></div>
-->
<canvas style="z-index: -2; position:relative;"></canvas>
  <script>
var orbs = [];
var amount= document.getElementById("schiebe").value;

function checkchange(){
    if (amount != document.getElementById("schiebe").value){
        console.log("test");
        amount = document.getElementById("schiebe").value;
        var ammount= document.getElementById("schiebe").value;
        orbs = [];
console.log(ammount)
for (var i = 0; i < ammount; i++) {
	orbs.push(new Orb(Math.floor((Math.random() * 50) + 10), fillColors[Math.floor(Math.random() * 5)]));
}
}
}
///hell0
//dis is a test
var loop = setInterval(checkchange,100);

  // script für den Hintergrund mit den Bällen!!!
  var canvas = document.querySelector('canvas');
var c = canvas.getContext('2d');
let scrollHeight = Math.max(
  document.body.scrollHeight, document.documentElement.scrollHeight,
  document.body.offsetHeight, document.documentElement.offsetHeight,
  document.body.clientHeight, document.documentElement.clientHeight
);
canvas.width = window.innerWidth ;
var elmnt = document.querySelector("body")
canvas.height = scrollHeight;

var mouseX = canvas.width/2;
var mouseY = canvas.height/2;
var pullTowardsMouse = false;

window.addEventListener("mousemove", function(e) {
	mouseX = e.clientX;
	mouseY = e.clientY;
});

window.addEventListener("mousedown", function(e) {
	pullTowardsMouse = true;
});

window.addEventListener("mouseup", function(e) {
	pullTowardsMouse = false;

	orbs.forEach(function(orb) {
		var xPositiveOrNegative = Math.random() < 0.5 ? -1 : 1;
		var yPositiveOrNegative = Math.random() < 0.5 ? -1 : 1;
		orb.xVelocity = xPositiveOrNegative * orb.xVelocity;
		orb.yVelocity = yPositiveOrNegative * orb.yVelocity;
	});
});

window.addEventListener("resize", function(e) {
	let scrollHeight = Math.max(
  document.body.scrollHeight, document.documentElement.scrollHeight,
  document.body.offsetHeight, document.documentElement.offsetHeight,
  document.body.clientHeight, document.documentElement.clientHeight
);
canvas.width = window.innerWidth;
var elmnt = document.querySelector("body")
canvas.height = scrollHeight;
});

function Orb(radius, fillColor) {
	this.radius = radius;
	this.fillColor = fillColor;

	// Prevent orbs from spawning past the canvas boundaries
	this.xCoordinate = this.radius + (canvas.width - this.radius * 2) * Math.random();
	this.yCoordinate = this.radius + (canvas.height - this.radius * 2) * Math.random();
	this.xVelocity = Math.random() * 2 - 1;
	this.yVelocity = Math.random() * 2 - 1;
	this.gravity = .15;
	this.xShift = 0;
	this.yShift = 0;
	this.friction = .83;

	this.update = function() {
		if (pullTowardsMouse == true) {
			this.xShift += (mouseX - this.xShift) * 0.05;	
			this.yShift += (mouseY - this.yShift) * 0.05;	

			// Create circling effect when mouse is down
			this.xCoordinate = this.xShift + Math.sin(this.xVelocity) * 50;
			this.yCoordinate = this.yShift + Math.cos(this.yVelocity) * 50;

			// Increment velocity --- The longer you hold, the more powerful the burst
			if (this.xVelocity < 0) {
				this.xVelocity -= (Math.random() * 0.15); 
			} else {
				this.xVelocity += (Math.random() * 0.15); 
			};

			if (this.yVelocity < 0) {
				this.yVelocity -= (Math.random() * 0.15); 
			} else {
				this.yVelocity += (Math.random() * 0.15); 
			};

			// Prevent orbs from going off screen
			this.xCoordinate = Math.max(Math.min(this.xCoordinate, canvas.width - this.radius), 0 + this.radius);
			this.yCoordinate = Math.max(Math.min(this.yCoordinate, canvas.height - this.radius), 0  + this.radius);

		} else {
			if (this.xCoordinate + this.radius + this.xVelocity > canvas.width || this.xCoordinate - this.radius + this.xVelocity < 0) {
				this.xVelocity = -this.xVelocity * this.friction;
			}
			if (this.yCoordinate + this.radius + this.yVelocity > canvas.height || this.yCoordinate - this.radius + this.yVelocity < 0) {
				this.yVelocity = -this.yVelocity * this.friction;	
				this.xVelocity = this.xVelocity * 0.99; 

			} else {
				this.yVelocity += this.gravity;
			}

			this.xCoordinate = this.xCoordinate + this.xVelocity;
			this.yCoordinate = this.yCoordinate + this.yVelocity;

			// Store the current position of the x and y coordinates for a smooth shift
			this.xShift = this.xCoordinate;
			this.yShift = this.yCoordinate;
		}

		this.draw();
	}

	this.draw = function() {
		// View variables if needed
		// c.fillText("yCoordinate:"+ Math.floor(this.yCoordinate),this.xCoordinate + 40,this.yCoordinate);
		// c.fillText("yVelocity:"+ Math.floor(this.yVelocity),this.xCoordinate + 40,this.yCoordinate + 20);
		// c.fillText("xShift: " + this.xShift ,this.xCoordinate + 40,this.yCoordinate + 40);

		c.beginPath()	
		c.arc(this.xCoordinate, this.yCoordinate, this.radius, 0, 2 * Math.PI, false);
		c.fillStyle = fillColor;
		c.fill();
		c.closePath();
	}
}

var fillColors = [
	"#2A3B30",
	"#ABFFD1",
	"#EBFFF5",
	"#9DFEFF",
	"#273B40"
];

var orbs = [];

for (var i = 0; i < 410; i++) {
	orbs.push(new Orb(Math.floor((Math.random() * 50) + 10), fillColors[Math.floor(Math.random() * 5)]));
}


function animate() {
  window.requestAnimationFrame(animate);	

	c.fillStyle = "rgba(0,0,0,0.25)";
	c.fillRect(0, 0, canvas.width, canvas.height);

	orbs.forEach(function(orb) {
		orb.update();
	});
}

animate();
</script>
<script>
//jeder user hat eigene knöpfe und Eigenschaften 
//--> Premium kann den Hintergrund ändern
var inh = document.getElementById("console").innerHTML;
var index= inh.indexOf("Angemeldet als Lvl: 9") + inh.indexOf("Angemeldet als Lvl: 8") + inh.indexOf("Angemeldet als Lvl: 7");

</script>
    </body>


</html>