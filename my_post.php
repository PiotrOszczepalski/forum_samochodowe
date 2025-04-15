<?php
    include "config.php";

    session_start();

    if(!isset($_SESSION['user-name'])) {

        header('location:login_form.php');

    }

?>

<!DOCTYPE html>
<html lang="pl">
<link rel="stylesheet" href="styl.css">

<head>
    <meta charset="UTF-8">
    <title>Moje posty</title>
</head>

<body>
    <section id="kontener">

            <section id="kontent">

                <h3><span>FORUM SAMOCHODOWE</span></h3>
                <h1>Witaj, <span><?php echo $_SESSION['user-name']?></span>!</h1>
                <p>Moje posty</p>
                <a href="user_page.php" id="btn">Wszystkie posty</a>
                <a href="logout.php" id="btn">Wyloguj się</a> <br> <br> <br>

                <h3><span>MOJE POSTY</span></h3> <br> 

                <?php 
                  $name = $_SESSION['user-name'];
                  $sql = "SELECT id,name,content,photo FROM post WHERE name = '$name'";
                  $wynik = mysqli_query($conn,$sql);

                  $rekord = mysqli_fetch_row($wynik);

                  while ($rekord != null) {
                    $tempID = $rekord[0];
                    echo "<section id='posty'>";
                    echo "<p id='g'>" . $rekord[1] . "</p>";
                    echo "<p>" . $rekord[2] . "</p>";
                    echo "<p><img src='uploads/" . $rekord[3] . "'></p>";
                    echo "<a href='delete.php?delID=$tempID' id='btn'>Usuń post</a>";
                    echo "<a href='form_update.php?delID=$tempID' id='btn'>Edytuj post</a>";
                    echo "</section>";
                    $rekord = mysqli_fetch_row($wynik);
                  }
                ?>
                
            </section>

    </section>
</body>

</html>