<?php
$gfg_folderpath = "files/";

if (is_dir($gfg_folderpath)) {
    $files = opendir($gfg_folderpath); {
        if ($files) {
            while (($gfg_subfolder = readdir($files)) !== FALSE) {
             if ($gfg_subfolder != '.' && $gfg_subfolder != '..') {
                    echo "SUBFOLDER--" .$gfg_subfolder . "<br>
                    "."Files in ".$gfg_subfolder."--<br>";
                      
                $dirpath = "files/" . $gfg_subfolder . "/";
                    if (is_dir($dirpath)) {
                        $file = opendir($dirpath); {
                            if ($file) {
               while (($gfg_filename = readdir($file)) !== FALSE) {
                if ($gfg_filename != '.' && $gfg_filename != '..') {
                        echo $gfg_filename . "<br>";
                           }
                         }
                      }
                   }
               }
                    echo "<br>";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>What's there in files</title>
</head>
<body>
</body>
</html>
