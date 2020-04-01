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
$lines = file("../files/users.txt",FILE_IGNORE_NEW_LINES);

$key = array_search($user,$lines);
if ($key != false){
    if ($lines[$key+1]== "pw"){
if ($lines[$key+2]==$password){
    if ($lines[$key+3]>6){
    $start = $_POST["start"];
    $end = $_POST["end"];
    echo $start;
    $zeilen = file("../files/chat.chat",FILE_IGNORE_NEW_LINES);
    $keya = array_search("<div ".$start.">",$zeilen);
    $keyb = array_search("<div ".$end."></div>",$zeilen);
    $offset = $keyb -$keya;
    $safe = $zeilen;
    $res = array_slice($safe,$keya,$offset+1);
    array_splice($zeilen,$keya,$offset+1);
    echo $keya."qweqwe".$keyb;
    $deleted = implode("\r\n", $res);
    $ergebnis = implode("\r\n", $zeilen);
    $olddel = file_get_contents("deleted.log");
    $re = fopen("../files/chat.chat","w");
        fwrite($re,$ergebnis);
        fclose($re);
        $rb = fopen("deleted.log","w");
            fwrite($rb,$olddel."\r\n"."\r\n");
            fwrite($rb,$deleted."\r\n");
            fclose($rb);

echo $ergebnis;
}}}
}else {if ($key == false){
    echo "<h1 style='margin:auto;width:200px; margin-top:30px'>Bitte Anmelden!!!</h1>";
}}

?>
<meta http-equiv="refresh" content="0.1;url=../../chat">