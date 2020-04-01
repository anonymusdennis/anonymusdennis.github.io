<?php
$doc = file_get_contents("lately.txt");
$file = file("lately.txt",FILE_IGNORE_NEW_LINES);
$key = array_search("Uhr",$file);
$time1 = new DateTime($file[$key-1]);
$timestamp = time();
$now = date("H:i:s", $timestamp); 
$time2 = new DateTime($now);

$interval = $time1->diff($time2);

$hours = $interval->format('%H');
$minutes = $interval->format('%i');
$seconds = $interval->format('%s');
$seconds = $seconds + 60 * $minutes + 60*60*$hours ;
echo "Letzte Uhrzeit: ".$file[$key-1]."<br>";
$di = $seconds - 3000;
echo "Zeit bis zum n&auml;chsten Reset: ".$di;
$late = fopen("lately.txt" , "w");
$diff = 20;
$mini = 3000;
if($seconds < $mini){
$old = date ("H",$timestamp);
$old++;
$hour = date("i:s ",$timestamp);
$new = "<span style='color:red;'><br>|||SREVER:|||<br>Es wurde  um \r\n$old:$hour\r\nUhr\r\n der Verlauf geleert<br>|||/SERVER/|||<br></span>";
fwrite($late, $new);
}else{
fwrite($late,$doc);
}
fclose($late);
?>