<?php
    $method=$_GET['method'];
    $str=$_GET['str'];
    if($method == "writefile"){
        try {
            $message = $str;
            $myFile = "coords.txt";
            if (file_exists($myFile)) {
                $fh = fopen($myFile, 'a');
                fwrite($fh, $message."\n");
            } else {
                //chmod("/path/to/dir/*", 0755);
                $fh = fopen($myFile, 'w')  or die("Cannot open file \"$myFile\"...\n");
                fwrite($fh, $message."\n") ;
            }
            fclose($fh);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }else if ($method == "remove"){
        unlink("coords.txt");
    }
    
?>

