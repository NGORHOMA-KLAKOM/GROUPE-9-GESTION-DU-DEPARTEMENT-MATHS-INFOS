 <?php
    session_start();

    //Contrôle de l'authentification de l'user 
    if (!isset($_SESSION['user'])) {
        header('location:login.php');
        exit();
    }
    // if (isset($_SESSION['user'])) {
    //     if ($_SESSION['user']['role'] == "ADMIN")
    //         header('location:../pagesCo/adminPage.php');
    //     if ($_SESSION['user']['role'] == "CD")
    //         header('location:../pages/adminPage.php');
    //     if ($_SESSION['user']['role'] == "ENSEIGNANT")
    //         header('location:../pages/adminPage.php');
    // }

    ?>
