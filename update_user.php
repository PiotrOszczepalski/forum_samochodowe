<?php
    include "config.php";

    session_start();

    if(!isset($_SESSION['admin-name'])) {

        header('location:login_form.php');

    }

?>
<body>
        
        <section id="regform">

            <section id="kontener">

            <section id="kontent">
<?php
    include "config.php";
    $update = isset($_REQUEST["updateID"])?$_REQUEST["updateID"]:"0";

    if(isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];

        if ($password != $cpassword) {
            $error[] = "Hasła się nie zgadzają!";
        }
        else {
            $sql2 = "UPDATE user_form SET name = '$name', email = '$email', password = '$password', user_type = '$user_type' WHERE id = $update";

            $wynik2 = mysqli_query($conn,$sql2);

            $ok[] = "Zaktualizowano dane";
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<link rel="stylesheet" href="styl.css">

<head>
    <meta charset="UTF-8">
    <title>Aktualizacja danych</title>
</head>

<?php

$sql = "SELECT * FROM user_form WHERE id = $update";
$wynik = mysqli_query($conn, $sql);

$rekord = mysqli_fetch_row($wynik);

?>

                <h3><span>Panel administratora</span></h3>
                <h1>Witaj, <span><?php echo $_SESSION['admin-name']?></span>!</h1>
                <p>Edycja użytkownika</p>
                <a href="management.php" id="btn">Wróć</a>
                <a href="logout.php" id="btn">Wyloguj się</a> <br> <br> <br>

            <form action="" method="post">
            <h3>Edytuj dane użytkownika</h3>

            <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo "<span id='error-msg'>" . $error . "</span>";
                    }
                }

                if (isset($ok)) {
                    foreach ($ok as $ok) {
                        echo "<span id='error-msg'>" . $ok . "</span>";
                    }
                }
            ?>

            <input type="text" name="name" required placeholder="Nick" value="<?php echo $rekord[1]; ?>" readonly>
            <input type="email" name="email" required placeholder="Adres email" value="<?php echo $rekord[2]; ?>" readonly>
            <input type="password" name="password" placeholder="Nowe hasło (wymagane przy zmianie roli)" required>
            <input type="password" name="cpassword" placeholder="Powtórz nowe hasło" required>
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="Zaktualizuj dane użytkownika">
            </form>

        </section>
                
        </section>

        </section>

</body>

</html>