<?php
session_start();
?>
<script>
sessionStorage.removeItem("hallo");
</script>
<?php
if(!empty($_POST["areaa"])){
$_SESSION["areaa"] = $_POST["areaa"];
$_SESSION["areab"] = $_POST["areab"];
$_SESSION["aread"] = $_POST["aread"];
$_SESSION["areae"] = $_POST["areae"];
}
?>
<meta http-equiv="refresh" content="0;url=code.php">