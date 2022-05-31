<!doctype html>
<html lang="ru">


<form action="#" method="get" class="form">
<input style="display: none" placeholder="Enter name" name="first_name" id="first_name" value="<?php echo htmlspecialchars($_GET['first_name']); ?>">
</form>

<?php
$fd = fopen("data.txt", 'a+') or die("не удалось открыть файл");
fwrite($fd, $_GET['first_name'] . "\n");
fclose($fd);
?>

</html>