<?php
include "config.php";

$id = isset($_REQUEST["hidden"])?$_REQUEST["hidden"]:"";
$post = isset($_REQUEST["post"])?$_REQUEST["post"]:"";

$sql = "UPDATE post SET content='$post' WHERE id = $id";

mysqli_query($conn, $sql);

mysqli_close($conn);

include "admin_page.php";
?>