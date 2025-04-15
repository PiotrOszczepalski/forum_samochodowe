<?php
    include "config.php";

    session_start();

    if(!isset($_SESSION['admin-name'])) {

        header('location:login_form.php');

    }

?>

<!DOCTYPE html>
<html lang="pl">
<link rel="stylesheet" href="styl.css">

<head>
    <meta charset="UTF-8">
    <title>Edycja postu</title>
</head>

<body>
    <section id="kontener">

            <section id="kontent">

                <h3><span>Panel administratora</span></h3>
                <h1>Witaj, <span><?php echo $_SESSION['admin-name']?></span>!</h1>
                <p>Tryb edycji</p>
                <a href="admin_page.php" id="btn">Strona główna</a>
                <a href="logout.php" id="btn">Wyloguj się</a> <br> <br> <br>

                <h3><span>Edytowanie postu</span></h3> <br> 

<?php
include "config.php";

$update = isset($_REQUEST["delID"])?$_REQUEST["delID"]:"0";

$sql = "SELECT * FROM post WHERE id = $update";
$wynik = mysqli_query($conn, $sql);

$rekord = mysqli_fetch_row($wynik);

?>

<form action="update_admin.php" method="post">
    <input type="hidden" name="hidden" value="<?php echo $rekord[0]; ?>">
    <textarea placeholder="Napisz coś o swoim samochodzie" name="post" id="post" required><?php echo $rekord[2]; ?></textarea> <br>
    <input type="submit" value="Zapisz zmiany" id="addpost" name="submit">
</form>

</section>

</section>

</body>

</html>