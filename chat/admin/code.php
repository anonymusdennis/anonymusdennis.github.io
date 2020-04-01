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
        .text{
            width:1000px;
            resize: none;
            height: 500px;
        }
    </style>

</head>

<body>
    <p style="margin-left:100px; width:600px;">Dies ist die Benutzer-Datei:</p>
<form method="POST" name="input" action="do.php" style="margin-left:100px; width:600px;">
<textarea class="text" name="areaa">
<?php


if(!empty($_SESSION["areaa"])){
    $fp = fopen("../files/users.txt","w");
    fwrite($fp,$_SESSION["areaa"]);
    fclose($fp);
    $_SESSION["areaa"] = "";
}
echo file_get_contents("../files/users.txt");
?>
</textarea>
<p style="margin:auto; width:600px;">Dies ist die chat-Datei</p>
<textarea name="areab" class="text">
<?php
if(!empty($_SESSION["areab"])){
    $fp = fopen("../files/chat.chat","w");
    fwrite($fp,$_SESSION["areab"]);
    fclose($fp);
    $_SESSION["areab"] = "";
}
echo file_get_contents("../files/chat.chat");
?>
</textarea>

<p style="margin:auto; width:600px;">Dies ist die deleted-log-Datei</p>
<textarea name="areac" class="text">
<?php
echo file_get_contents("deleted.log");
?>
</textarea>
<p style="margin:auto; width:600px;">Dies ist die Strikes.txt Datei</p>
<textarea name="aread" class="text">
<?php
if(!empty($_SESSION["aread"])){
    $fp = fopen("../files/strikes.txt","w");
    fwrite($fp,$_SESSION["aread"]);
    fclose($fp);
    $_SESSION["aread"] = "";
}
echo file_get_contents("../files/strikes.txt");
?>
</textarea>
<p style="margin:auto; width:600px;">Dies ist die Letzte Benutzer-Datei:</p>
<textarea name="areae" class="text">
<?php
if(!empty($_SESSION["areae"])){
    $fp = fopen("../files/lately.txt","w");
    fwrite($fp,$_SESSION["areae"]);
    fclose($fp);
    $_SESSION["areae"] = "";
}
echo file_get_contents("../files/lately.txt");
?>
</textarea>
<button type="submit" style="display:none">useless Buttun that is useful</button>
</form>
<script>


var shortcut = {
 keys : new Object(),
 add : function(array, func){
  var hey = this;
  var counter = this.stingify(array);
  this.keys[counter] = func;
  var collect = new Array();
 document.body.addEventListener('keydown',function(e){
  if(e.keyCode===array[collect.length]){
   collect[collect.length] = e.keyCode;
  }else{
   collect = new Array();
  }
  if(collect.length===array.length){
   collect = new Array();
   hey.keys[counter]();
  }
 },false);

 },
 remove : function(array){
  this.keys[this.stingify(array)] = function(){

  };
 },
 stingify:function(array){
  var counter = '';
  for(x in array){
   if(x==0){
    counter+=array[x];
   }else{
    counter+='+'+array[x];
   }
  }
  return counter;
 }
};
shortcut.add([17,18,13,16], function(){document.input.submit();});
</script>
</body>


</html>