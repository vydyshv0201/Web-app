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
        require_once 'db.php';
        $sql = "SELECT * FROM users";
        $result = mysqli_query($link, $sql);
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($categories as $category)
        {
            if ($category['login'] == $_SESSION['logged_user']) {
                $sql = "UPDATE users SET password='".password_hash($data['password'], PASSWORD_DEFAULT)."' WHERE login='".$category['login']."'";
                $result = mysqli_query($link, $sql);
                $sql = "UPDATE users SET ChPass=0 WHERE email='".$category['email']."'";
                $result = mysqli_query($link, $sql);
            }
        }  

        mysqli_free_result($result);
        mysqli_close($link);
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
    <title>Поменять пароль</title>
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