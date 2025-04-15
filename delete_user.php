<?php 
include "config.php";

$delete = isset($_REQUEST["delID"])?$_REQUEST["delID"]:"0";

$sql = "DELETE FROM user_form WHERE id = $delete";

$wynikSQL = mysqli_query($conn, $sql);

mysqli_close($conn);

include "management.php";
?>