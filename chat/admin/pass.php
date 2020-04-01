<?php
session_start();?>
<script>
sessionStorage.removeItem("hallo");
</script>
<?php
if (!empty($_POST["user"])){
$_SESSION["user"] = $_POST["user"];
$_SESSION["password"] = $_POST["password"];
}
if(!empty($_POST["power"])){
$_SESSION["power"] = $_POST["power"];
}?>


<meta http-equiv="refresh" content="0;url=qweasaBenutzer.php">