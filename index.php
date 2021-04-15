<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: http://localhost/file-downloader/login/login.php');
        exit;
    }
?>

<?php 
    echo "Hello!"
?>
