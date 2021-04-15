<?php
    session_start();
    include('./config/config.php');
    if(!isset($_SESSION['user_id'])){
        header('Location: http://localhost/file-downloader/login/login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">
    <title>Index</title>
</head>
<body>
    <form class="example" action="search.php" method="GET">
        <input type="text" name="term" placeholder="Search.." required />
        <button type="submit" name="search"><i class="fa fa-search"></i></button>
    </form>
</body>
</html>
