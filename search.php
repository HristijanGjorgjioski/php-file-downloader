<?php
	session_start();
    include('./config/config.php');
?>
<!DOCTYPE html >
<html>
<head>
	<title>Search results</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
	if(isset($_GET['search'])) {
        $query = $_GET['term']; 
            
        $min_length = 3;

        if(strlen($query) >= $min_length){ 
            
            $query = htmlspecialchars($query); 
            
            $query = mysql_real_escape_string($query);
            
            $raw_results = mysql_query("SELECT * FROM links
                WHERE (`fileName` LIKE '%".$query."%')") or die(mysql_error());
            if(mysql_num_rows($raw_results) > 0) {
                while($results = mysql_fetch_array($raw_results)){
                    echo "<p><h3>".$results['fileName']."</h3></p>";
                }
            } else { 
                echo "No results";
            }
        } else { 
            echo "Minimum length is ".$min_length;
        }
    }
?>
</body>
</html>