<?php

session_start();
$data = $_POST;

if (isset($data['do_login'])) {
    require_once 'db.php';
    $errors = array();
    $flag = false;

    $sql = "SELECT * FROM users";
    $result = mysqli_query($link, $sql);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($categories as $category)
    {
        if ($category['login'] == $data['login']) 
        {
            if (password_verify($data['password'], $category['password'])) 
            {
                $flag=true;
                $_SESSION['logged_user'] = $data['login'];
    
                if ($_SESSION['authlink'] == 1){
                    header("Location: http://localhost/");
                }
                if ($_SESSION['authlink'] == 2){
                    header("Location: http://localhost/News/News.php");
                }
                if ($_SESSION['authlink'] == 3){
                    header("Location: http://localhost/Contacs/Contacs.php");
                }
                if ($_SESSION['authlink'] == 4){
                    header("Location: http://localhost/calculator/calculator.php");
                }
                else {
                    header("Location: http://localhost/");
                }
            } else
            {
                $errors[] = 'Введен неверный пароль!';
            }
        } 
    } 

    if ($flag == false)
    {
        $errors[] = 'Пользователь с таким логином не найден!';
    }

    if (!empty($errors)) {
        echo '<div style="color: red; text-align: center;">' . array_shift($errors) . '</div><hr>';
    } 
    mysqli_free_result($result);
    mysqli_close($link);
}

?>
<!doctype html>
<html lang="ru">

<head>
    <title>Вход</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="form-body">
    <header class="header">
        <h1 class="header__title">Вход</h1>
    </header>
    <form method="post" enctype="multipart/form-data" class="form">

        <div class="form__rows">
            <p class="form__row">
                <label for="login" class="form__label">Логин</label>
                <input type="text" placeholder="Enter login" name="login" id="login" value="<?php echo $data['login']; ?>" class="form__input">
            </p>
            <p class="form__row">
                <label label for="password" class="form__label">Пароль</label>
                <input type="password" name="password" placeholder="Enter password" id="password" value="<?php echo $data['password']; ?>" class="form__input">
            </p>
            <p class="form__row">
                <label class="form__label"></label>
                <a href="recovery.php" class="form-body__link">Восстановить пароль</a>
            </p>
            <p class="form__row">
                <label class="form__label"></label>
                <a href="signup.php" class="form-body__link">Зарегистрироваться</a>
            </p>
        </div>
        <div class="form__button">
            <button class="form__button-text" type="submit" name="do_login">Войти</button>
        </div>
    </form>
</body>

</html>