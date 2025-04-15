<?php
    include "config.php";

    session_start();

    if(!isset($_SESSION['admin-name'])) {

        header('location:login_form.php');

    }

?>

<?php
    include "config.php";

    if(isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];

        $sql = "SELECT * FROM user_form WHERE email='$email' AND password='$password'";
        $sql2 = "SELECT * FROM user_form WHERE name = '$name'";
        $sql3 = "SELECT * FROM user_form WHERE email = '$email'";

        $wynik = mysqli_query($conn,$sql);
        $wynik2 = mysqli_query($conn,$sql2);
        $wynik3 = mysqli_query($conn,$sql3);

        $liczbarekordow = mysqli_num_rows($wynik);
        $liczbarekordow2 = mysqli_num_rows($wynik2);
        $liczbarekordow3 = mysqli_num_rows($wynik3);

        if ($liczbarekordow > 0) {
            $error[] = "Użytkownik o podanym adresie email już istnieje!";
        }
        else if ($liczbarekordow2 > 0) {
            $error[] = "Użytkownik o podanym nicku już istnieje!";
        }
        else if ($liczbarekordow3 > 0) {
            $error[] = "Użytkownik o podanym adresie email już istnieje!";
        }
        else if ($password != $cpassword) {
            $error[] = "Hasła się nie zgadzają!";
        }
        else {
            $sql2 = "INSERT INTO user_form (name,email,password,user_type) VALUES ('$name','$email','$password','$user_type')";

            $wynik2 = mysqli_query($conn,$sql2);

            $ok[] = "Pomyślnie dodano użytkownika";
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<link rel="stylesheet" href="styl.css">

<head>
    <meta charset="UTF-8">
    <title>Nowy użytkownik</title>
</head>

<body>
        
        <section id="regform">

            <section id="kontener">

            <section id="kontent">

                <h3><span>Panel administratora</span></h3>
                <h1>Witaj, <span><?php echo $_SESSION['admin-name']?></span>!</h1>
                <p>Dodawanie użytkownika</p>
                <a href="admin_page.php" id="btn">Strona główna</a>
                <a href="logout.php" id="btn">Wyloguj się</a> <br> <br> <br>

            <form action="" method="post">
            <h3>Dodaj nowego użytkownika</h3>

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

            <input type="text" name="name" required placeholder="Nick">
            <input type="email" name="email" required placeholder="Adres email">
            <input type="password" name="password" required placeholder="Hasło">
            <input type="password" name="cpassword" required placeholder="Powtórz hasło">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="Dodaj użytkownika">
            </form>

        </section>

        </section>

        </section>

</body>

</html>