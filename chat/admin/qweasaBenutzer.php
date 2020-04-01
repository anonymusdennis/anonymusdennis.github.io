<?php
session_start();
?>
<!DOCTYPE html>
<html>


<head>
    <link href="../https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Chat-Benutzer</title>

    <link href="../https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">

    <style>
        input {
            margin: auto;
        }
        #theoneandonly{
            text-align:center;
            margin:auto;
        }
        #span:hover{
            cursor:pointer;
        }
        #span:active{
            border:2px solid gray;
            top:-1px;
            background-color:grey;
        }
    </style>

</head>

<body>

    <div style="width:100%; text-align:center;  top:100px; z-index:-1; position:absolute;">
        <h1>Admin Anmeldung</h1>
        <form method="POST" style="float:none !important; padding:unset !important; margin:unset !important; width:unset;" action="pass.php">
            <input name="user" type="text" id="account" placeholder="Benutzer" autocomplete="username">
            <input name="password" type="password" id="password" placeholder="Passwort" autocomplete="new-password" style="width:149px;padding-right:24px;"><span id="span" onclick="toggle();" style="border:1px solid black;position:relative; left: -23px;height:20px;top:1px;"title="Passwort Anzeigen!">&#128065;</span>
            <input name="power" style="position:relative;left:-20px;"type="number" max="9" min="1" value="5" title="Dies ist Das Powerlevel des Benutzers(Admin=9)">
            <button type="submit"style="position:relative;left:-20px;">Hinzufügen</button></form>
            <div style="position:relative; top:10px; margin: auto;"><button onclick="random();">Zufällige Nummer</button><br/><div id="Output"></div><div></div></div>
            <script>
            function random(){
                var min = 10000;
                var max = 99999;
                var num = Math.floor(Math.random() * (max - min + 1)) + min;
                document.getElementById("password").value=num;
                document.getElementById("Output").innerHTML= "Zahl: " + num
                timer(5);
            }
            function toggle(){
                var test = (document.getElementById("password").getAttribute("type") == "text") ? "password" : "text";
                document.getElementById("password").setAttribute("type", test);

                document.getElementById("Output").innerHTML = "";
                if(test=="password"){
                    timer(-2);
                }else {
                    timer(5);
                }
                }

            function timer(time){
                if(time>0){
                document.getElementById("Output").innerHTML += "<br> <div id='time'> In "+ time + " Sekunden wird das Passwort ausgeblendet!";
                time--;}else{
                    document.getElementById("Output").innerHTML = "";
                }
                sessionStorage.setItem("time",time);
                if (time < 0){

                }else{
                    setTimeout(timed,1000);
                }

            }
            var timed = function() {
                var time = JSON.parse(sessionStorage.getItem("time"));
                document.getElementById("time").innerHTML = "In "+ time + " Sekunden wird das Passwort ausgeblendet!";
                time--;
                sessionStorage.setItem("time",time);
                if(time < 0){
                    document.getElementById("Output").innerHTML= "";
                    document.getElementById("password").setAttribute("type","password");
                    sessionStorage.removeItem("time");
                }else{
                setTimeout(timed,1000);}
            }
            </script>
            <div id="theoneandonly">
<?php

$liste = file_get_contents("../files/users.txt");
error_reporting("none");

try {
    //code...

    $user = $_SESSION["user"];
    $password = $_SESSION["password"];
    $power = $_SESSION["power"];
    $lines = file("../files/users.txt",FILE_IGNORE_NEW_LINES);
            $key = array_search($user,$lines);

if ($user !=""){
            if (array_key_exists(array_search($user,$lines),$lines)){
                echo "<h3>Benutzer existiert schon!</h3>";
    }else{
    $fp = fopen("../files/users.txt","w");
    fwrite($fp,"\r\n");
    fwrite($fp,$liste."\r\n");
    fwrite($fp,$user."\r\n");
    fwrite($fp,"pw"."\r\n");
    fwrite($fp,$password."\r\n");
    fwrite($fp,$power."\r\n");
    fclose($fp);

    echo "<h3>Benutzer wurde erstellt!!</h3>";
    }}else{
        echo "<h3>Benutzername nicht erlaubt!!</h3>";
    }
    $_SESSION["user"] = "";
    $_SESSION["password"] = "";
    $_SESSION["power"] = "";
} catch (\Throwable $th) {
    //throw $th;
}
$liste = nl2br(file_get_contents("../files/users.txt"));
echo "<h2>die Liste aller Benutzer: </h2><br> $liste";

?></div>
<a href="code.php" style="display:none;">.</a>
    <script>
    </script>
</body>


</html>