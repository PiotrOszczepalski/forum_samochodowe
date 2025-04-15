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
    <title>Administrator forum</title>
</head>

<body>
    <section id="kontener">

            <section id="kontent">

                <h3><span>Panel administratora</span></h3>
                <h1>Witaj, <span><?php echo $_SESSION['admin-name']?></span>!</h1>
                <p>Strona główna</p>
                <a href="post_admin.php" id="btn">Posty administratorów</a>
                <a href="post_user.php" id="btn">Posty użytkowników</a>
                <p id="n"></p>
                <a href="register_form_admin.php" id="btn">Dodaj nowego użytkownika</a>
                <a href="management.php" id="btn">Zarządzaj użytkownikami</a>
                <p id="n"></p>
                <a href="logout.php" id="btn">Wyloguj się</a>
                
                <form action="admin_page.php" method="post" enctype="multipart/form-data">
                    <textarea placeholder="Przekaż wiadomość użytkownikom forum" name="post" id="post" required></textarea> <br>
                    <input type="file" name="photo" required id="plik">
                    <input type="submit" value="Opublikuj" id="addpost" name="submit">
                </form>

                <?php
                    $target_dir = "uploads/";
                    $target_file = isset($_FILES["photo"]["name"])?$target_dir . basename($_FILES["photo"]["name"]):"";
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    
                    if ($target_file == "") {

                    }
                    else {
                    
                    if(isset($_POST["submit"])) {
                      $check = getimagesize($_FILES["photo"]["tmp_name"]);
                      if($check !== false) {
                        echo "";
                        $uploadOk = 1;
                      } 
                      else {
                        echo "<span id='e'> Plik nie jest obrazem!</span>";
                        $uploadOk = 0;
                      }
                    }
                    
                    if ($_FILES["photo"]["size"] > 500000) {
                      echo "<span id='e'> Twój plik jest zbyt duży!</span>";
                      $uploadOk = 0;
                    }
                    
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                      echo "<span id='e'> Dozwolone formaty plików to: JPG, JPEG, PNG, GIF!</span>";
                      $uploadOk = 0;
                    }
                    
                    if ($uploadOk == 0) {
                      echo "<span id='e'> Wystąpił błąd, spróbuj ponownie.</span>";
                    } 
                    else {
                      if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                    
                        $user = $_SESSION['admin-name'];
                        $content = $_POST['post'];
                        $photo = htmlspecialchars(basename($_FILES["photo"]["name"]));

                        $sql = "INSERT INTO post (name,content,photo) VALUES ('$user','$content','$photo')";
                        $wynik = mysqli_query($conn,$sql);

                      } else {
                        echo "<span id='e'> Wystąpił błąd, spróbuj ponownie.</span>";
                      }
                    }
                }

                    
                ?>

                <h3><span>WSZYSTKIE POSTY</span></h3>

                <?php 
                  $sql = "SELECT id,name,content,photo FROM post";
                  $wynik = mysqli_query($conn,$sql);

                  $rekord = mysqli_fetch_row($wynik);

                  while ($rekord != null) {
                    $tempID = $rekord[0];
                    echo "<section id='posty'>";
                    echo "<p id='g'>" . $rekord[1] . "</p>";
                    echo "<p>" . $rekord[2] . "</p>";
                    echo "<p><img src='uploads/" . $rekord[3] . "'></p>";
                    echo "<a href='delete_main.php?delID=$tempID' id='btn'>Usuń post</a>";
                    echo "<a href='main_form.php?delID=$tempID' id='btn'>Edytuj post</a>";
                    echo "</section>";
                    $rekord = mysqli_fetch_row($wynik);
                  }
                ?>

            </section>

    </section>
</body>

</html>