<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Download files</h1>
    <a href="test.php?file=123211.js">Click to download</a>
</body>
</html>

<?php
if(!empty($_GET['file'])) {
        $filename = basename($_GET['file']);
        $filepath = 'files/user1/'.$filename;

        if(!empty($filename) && file_exists($filepath)) {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/zip");
            header("Content-Transfer-Emcoding: binary");

            readFile($filepath);
            exit;
        } else {
            echo "Error occured";
        }
    }
?>