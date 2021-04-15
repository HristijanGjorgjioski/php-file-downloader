<?php
    if(!empty($_GET['file'])) {
        $filename = basename($_GET['file']);
        $filepath = 'files/user1/'.$filename;

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
    <link rel="stylesheet" href="index.css">
    <title>Index</title>
</head>
<body>
    <form class="example" method="post">
        <input type="text" name="term" placeholder="Search.." required />
        <button type="submit" name="search"><i class="fa fa-search"></i></button>
    </form>
</body>
</html>

<?php
    if(isset($_POST['search'])) {
        $term = $_POST['term'];
        $path = "files/user1/$term*";
        $fileinfo = glob($path);
        $fileactualname = $fileinfo[1];

        if($fileinfo) {
            foreach($fileinfo as $item) {
                echo "$item"."   "."<a href='index.php?file=$item'>Click to download</a>"."<br />";
            };
        };
    }
?>