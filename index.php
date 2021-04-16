<?php
    session_start();
    if(!$_SESSION['user']) {
		header("Location: http://localhost/file-downloader/login/login.php");
	}
?>

<?php
    if(!empty($_GET['file'])) {
        $loggedUser = $_SESSION['user'];
        $filename = basename($_GET['file']);
        $filepath = 'files/'.$loggedUser.'/'.$filename;

        if(!empty($filename) && file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Content-Transfer-Encoding: binary');
            header('Connection: Keep-Alive');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            readfile($filepath);
            exit;
        } else {
            echo "Error occured";
            echo "$filepath";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Index</title>
</head>
<body>
    <nav style="display: flex; justify-content: center; padding: 12px;">
        <button type="button" class="btn btn-primary"><?php echo $_SESSION['user'] ?></button>--
        <form method="post">
            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
        </form>
    </nav>
    <form class="example" method="post">
        <input type="text" name="term" placeholder="Search.." required />
        <button type="submit" name="search"><i class="fa fa-search"></i></button>
    </form>
</body>
</html>

<?php
    if(isset($_POST['logout'])) {
        session_destroy();
        header("Location: http://localhost/file-downloader/login/login.php");
    };
?>

<?php
    if(isset($_POST['search'])) {
        $term = $_POST['term'];
        if(strlen($term) < 2) {
            echo "You must enter 2 charachters before searching.";
        } else {
            $loggedUser = $_SESSION['user'];
            $path = "files/".$loggedUser."/*$term*";
            $fileinfo = glob($path);
            
            if($fileinfo) {
                foreach($fileinfo as $item) {
                    echo "<hr />";
                    echo "--------------------------------------".ltrim($item, "files/"."$loggedUser")."--------------------------------------"."<a href='index.php?file=$item'>Click to download</a>"."<br />";
                };
            };
        }
    }
?>