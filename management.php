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
    <title>Zarządzaj</title>
</head>

<body>

    <section id="kontener">

            <section id="kontent">

                <h3><span>Panel administratora</span></h3>
                <h1>Witaj, <span><?php echo $_SESSION['admin-name']?></span>!</h1>
                <p>Panel zarządzania</p>
                <a href="admin_page.php" id="btn">Strona główna</a>
                <a href="logout.php" id="btn">Wyloguj się</a>
                <p id="n"></p>
                <p id="n"></p>

                <h3><span>Zarządzaj użytkownikami</span></h3>
                <p id="n"></p>

                <table>
                    <th>ID</th> <th>Nick</th> <th>Email</th> <th>Rodzaj konta</th> <th>Usuń</th> <th>Edytuj</th>
                
                    <?php
                        $sql = "SELECT id,name,email,user_type FROM user_form";
                        $wynik = mysqli_query($conn,$sql);

                        $rekord = mysqli_fetch_assoc($wynik);

                        while ($rekord != null) {
                            $tempID = $rekord['id'];
                            echo "<tr><td>" . $rekord['id'] . "</td>";
                            echo "<td>" . $rekord['name'] . "</td>";
                            echo "<td>" . $rekord['email'] . "</td>";
                            echo "<td>" . $rekord['user_type'] . "</td>";
                            echo "<td>" . "<a href='delete_user.php?delID=$tempID' id='deletelink'>usuń</a>" . "</td>";
                            echo "<td>" . "<a href='update_user.php?updateID=$tempID' id='updatelink'>edytuj</a>" . "</td></tr>";
                            $rekord = mysqli_fetch_assoc($wynik);
                        }
                    ?>

                </table>

            </section>

    </section>

</body>

</html>