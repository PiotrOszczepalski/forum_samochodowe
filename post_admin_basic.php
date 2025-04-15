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
    <title>Aktualności</title>
</head>

<body>
    <section id="kontener">

            <section id="kontent">

                <h3><span>FORUM SAMOCHODOWE</span></h3>
                <h1>Witaj, <span><?php echo $_SESSION['user-name']?></span>!</h1>
                <p>Aktualności</p>
                <a href="user_page.php" id="btn">Strona główna</a>
                <a href="logout.php" id="btn">Wyloguj się</a> <br> <br> <br>

                <h3><span>AKTUALNOŚCI</span></h3> <br> 

                <?php 
                  $sql2 = "SELECT name FROM user_form WHERE user_type = 'admin'";
                  $wynik2 = mysqli_query($conn,$sql2);
                  $rekord2 = mysqli_fetch_assoc($wynik2);

                  while ($rekord2 != null) {
                    $name = $rekord2['name'];
                    $sql = "SELECT id,name,content,photo FROM post WHERE name = '$name'";
                    $wynik = mysqli_query($conn,$sql);
    
                    $rekord = mysqli_fetch_row($wynik);
                    $rekord2 = mysqli_fetch_assoc($wynik2);

                    while ($rekord != null) {
                        $tempID = $rekord[0];
                        echo "<section id='posty'>";
                        echo "<p id='g'>" . $rekord[1] . "</p>";
                        echo "<p>" . $rekord[2] . "</p>";
                        echo "<p><img src='uploads/" . $rekord[3] . "'></p>";
                        echo "</section>";
                        $rekord = mysqli_fetch_row($wynik);
                      }
                  }
                ?>
                
            </section>

    </section>
</body>

</html>