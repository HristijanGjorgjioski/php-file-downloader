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
    session_start();
    include('./config/config.php');
    if (isset($_POST["search"])) {
        $str = $_POST["term"];
        $sth = $connection->prepare("SELECT * FROM links WHERE (`fileName` LIKE '%".$str."%')");

        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth -> execute();

        
        if($row = $sth->fetch()) {
            ?>
            <br><br><br>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Download</th>
                </tr>
                <tr>
                    <td><?php echo $row->fileName; ?></td>
                    <td><button type="submit" name="download">Download</button></td>
                </tr>
            </table>
<?php
        } else{
            echo "Name Does not exist";
        }
    }

?>