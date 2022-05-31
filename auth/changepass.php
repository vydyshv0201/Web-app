<?php


session_start();

$data = $_POST;

function getToken() {
    if(empty($_SESSION['token'])){
        $_SESSION['token'] = uniqid('', true);
    }
    return password_hash($_SESSION['token'], PASSWORD_DEFAULT);
}

function checkToken($token){
    return password_verify($_SESSION['token'], $token);
}

$token = $_POST['token'] ?? '';



if (!isset($_SESSION['logged_user'])){
    header("Location: http://localhost/");
}

if (isset($data['do_change'])) {
    $errors = array();

    if(!checkToken($token)){
        $errors[] = 'ахаха, не получилось (csrf) :)';
        unset($_SESSION['token']);
    }

    if ($data['password_2'] != $data['password']) {
      $errors[] = 'Повторный пароль неверный!';
    }

    if (empty($errors)) {
        $arr = array();
        $fd = fopen("database/database.txt", 'a+') or die("не удалось открыть файл");
        while(!feof($fd))
        {
            $arr[] = fgets($fd);
        } 
        fclose($fd);
        for ($i=0; $i<count($arr); $i++)
        {
            if ($arr[$i]==$_SESSION['logged_user']."\n")
            {
                $arr[$i+1]= password_hash($data['password'], PASSWORD_DEFAULT)."\n";
            }
            
        }
        $fd = fopen("database/database.txt", 'w') or die("не удалось открыть файл");

        for ($i=0; $i<count($arr); $i++){
            fwrite($fd, $arr[$i]);
        }
        fclose($fd);
        echo '<div style="color: red; text-align: center;">Пароль успешно изменен</div><hr>';
        header("Location: http://localhost/auth/logout.php");

      } else {
        echo '<div style="color: red; text-align: center;">' .array_shift($errors). '</div><hr>';
      }
      
  }

?>

<!doctype html>
<html lang="ru">


<head>
    <title>Заполнить форму</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="form-body">
    <header class="header">
        <h1 class="header__title">Поменять пароль</h1>
    </header>
    <form method="post" enctype="multipart/form-data" class="form">

        <div class="form__rows">
            <p class="form__row">
                <label label for="password" class="form__label">Введите новый пароль</label>
                <input type="password" name="password" placeholder="Enter password" id="password" value="<?php echo $data['password']; ?>" class="form__input">
            </p>
            <p class="form__row">
                <label label for="password_2" class="form__label">Повторно введите новый пароль</label>
                <input type="password" name="password_2" placeholder="Enter password again" id="password_2" class="form__input">
            </p>
            <input type="hidden" name="token" value="<?= getToken() ?>">
        </div>
        <div class="form__button">
            <button class="form__button-text" type="submit" name="do_change">Сохранить</button>
        </div>
    </form>
</body>

</html>