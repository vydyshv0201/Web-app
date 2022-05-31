Имя = <?php echo htmlspecialchars($_POST['first_name']); ?> <br>
Фамилия = <?php echo htmlspecialchars($_POST['surname']); ?> <br>
Email = <?php echo htmlspecialchars($_POST['email']); ?> <br>
Дата = <?php echo htmlspecialchars($_POST['date']); ?> <br>
Возраст = <?php echo htmlspecialchars($_POST['age']); ?> <br>
Должность = <?php echo htmlspecialchars($_POST['post']); ?> <br>
Номер = <?php echo htmlspecialchars($_POST['number']); ?> <br>
Пароль = <?php echo htmlspecialchars($_POST['password']); ?> <br>
<?php
$uploaddir = '../../upload/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$type = $_FILES["userfile"]['type'];
echo '<pre>';
if ($_FILES['userfile']['size'] < 30000 && $type != 'image/jpeg') {
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "Файл корректен и был успешно загружен.\n";
    }
} else {
    echo "Ошибка файловой загрузки!\n";
}
$dir    = '../../upload';
$files = scandir($dir);
echo "Файлы в папке uploads:\n";
for($i = 2; $i < count($files); $i++)
    print $files[$i]."<br>";

print "</pre>";

?>