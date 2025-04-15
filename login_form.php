<?php
    include "config.php";

    session_start();

    if(isset($_POST['submit'])) {
        $name = isset($_POST['name'])?mysqli_real_escape_string($conn, $_POST['name']):"";
        $email = isset($_POST['email'])?mysqli_real_escape_string($conn, $_POST['email']):"";
        $password = isset($_POST['password'])?md5($_POST['password']):"";
        $cpassword = isset($_POST['cpassword'])?md5($_POST['cpassword']):"";
        $user_type = isset($_POST['user_type'])?$_POST['user_type']:"";

        $sql = "SELECT * FROM user_form WHERE email='$email' AND password='$password'";

        $wynik = mysqli_query($conn,$sql);

        $liczbarekordow = mysqli_num_rows($wynik);

        if ($liczbarekordow > 0) {

            $rekord = mysqli_fetch_array($wynik);

            if ($rekord['user_type'] == 'admin') {
                $_SESSION['admin-name'] = $rekord['name'];
                header('location:admin_page.php');
            }
            else if ($rekord['user_type'] == 'user') {
                $_SESSION['user-name'] = $rekord['name'];
                header('location:user_page.php');
            }
        }
        else {
            $error[] = "Niepoprawny email lub hasło!";
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<link rel="stylesheet" href="styl.css">

<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>

<body>
    <section id="regform">

        <form action="" method="post">
            <h3>Zaloguj się</h3>

            <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo "<span id='error-msg'>" . $error . "</span>";
                    }
                }
            ?>

            <input type="email" name="email" required placeholder="Adres email">
            <input type="password" name="password" required placeholder="Hasło">
            <input type="submit" name="submit" value="Zaloguj się">
            <p>Nie posiadasz konta? <a href="register_form.php">Zarejestruj się</a></p>
        </form>

    </section>
</body>

</html>