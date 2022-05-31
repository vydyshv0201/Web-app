<?php

$data = $_POST;

if (isset($data['do_signup'])) 
{
  require_once 'db.php';
  $errors = array();

  if ($data['login'] == '') {
    $errors[] = 'Введите логин!';
  }

  if ($data['email'] == '') {
    $errors[] = 'Введите email!';
  }

  if ($data['password'] == '') {
    $errors[] = 'Введите password!';
  }

  if ($data['password_2'] != $data['password']) {
    $errors[] = 'Повторный пароль неверный!';
  }

  $sql = "SELECT * FROM users";
  $result = mysqli_query($link, $sql);
  $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
  foreach ($categories as $category)
  {
    if ($category['login'] == $data['login']) {
      $errors[] = 'Введенный логин уже существует!';
    }
    if ($category['email'] == $data['email']) {
      $errors[] = 'Введенный email уже существует!';
    }
  }    

  if (empty($errors)) {

    $sql = "INSERT INTO users (login, password, email, ChPass) VALUES ('".$data['login']."', '".password_hash($data['password'], PASSWORD_DEFAULT)."', '".$data['email']."', 0)";
    $result = mysqli_query($link, $sql);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo '<div style="color: green; text-align: center;">Вы зарегестрированы!</div><hr>';
    header("Location: http://localhost/auth/login.php");
  } else {
    echo '<div style="color: red; text-align: center;">' . array_shift($errors) . '</div><hr>';
  }
  mysqli_free_result($result);
  mysqli_close($link);
}

?>

<!doctype html>
<html lang="ru">

<head>
  <title>Регистрация</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>



<body class="form-body">
  <header class="header">
    <h1 class="header__title">Регистрация</h1>
  </header>
  <form method="post" enctype="multipart/form-data" class="form">

    <div class="form__rows">
      <p class="form__row">
        <label for="login" class="form__label">Логин</label>
        <input type="text" placeholder="Enter login" name="login" id="login" value="<?php echo $data['login']; ?>" class="form__input">
      </p>
      <p class="form__row">
        <label for="email" class="form__label">Email</label>
        <input type="email" name="email" placeholder="Enter email" id="email" value="<?php echo $data['email']; ?>" class="form__input">
      </p>
      <p class="form__row">
        <label label for="password" class="form__label">Пароль</label>
        <input type="password" name="password" placeholder="Enter password" id="password" value="<?php echo $data['password']; ?>" class="form__input">
      </p>
      <p class="form__row">
        <label for="password_2" class="form__label">Введите пароль повторно</label>
        <input type="password" name="password_2" placeholder="Enter password again" id="password_2" value="<?php echo $data['password_2']; ?>" class="form__input">
      </p>
      <p class="form__row">
        <label class="form__label"></label>
        <a href="login.php" class="form-body__link">Войти</a>
      </p>
    </div>
    <div class="form__button">
      <button class="form__button-text" type="submit" name="do_signup">Зарегистрироваться</button>
    </div>
  </form>
</body>

</html>