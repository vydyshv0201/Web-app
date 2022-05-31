<?php
    $fd = fopen("data.txt", 'a+') or die("не удалось открыть файл");
 while(!feof($fd))
 {
     $str = fgets($fd);
     echo $str.'<br>';
     
 }
 fclose($fd);
?>