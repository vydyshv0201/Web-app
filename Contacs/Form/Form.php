<?php
session_start();
if (!isset($_SESSION['logged_user'])) {
  header("Location: http://localhost/auth/login.php");
}
?>

<!doctype html>
<html lang="ru">

<head>
  <title>Заполнить форму</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../../css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../../js/jquery-3.6.0.min.js"></script>
  <script src="../../js/scriptl7.js"></script>
</head>

<body>
  <header class="header">
    <h1 class="header__title">Заполнить форму</h1>
  </header>
  <nav class="menu">
    <div class="menu__nav">
      <form>
        <button class="menu__button" formaction="http://localhost/index.php">Главная страница</button>
        <button class="menu__button" formaction="http://localhost/News/News.php">Новости</button>
        <button class="menu__button" formaction="http://localhost/Contacs/Contacs.php">Контакты</button>
        <button class="menu__button" formaction="http://localhost/calculator/calculator.php">Калькулятор</button>
        <button class="menu__button" formaction="http://localhost/Contacs/Form/Form2.php">Форма 2</button>
      </form>
    </div>
    <div class="menu__auth">
      <a href="../../auth/changepass.php" class="">Поменять пароль /</a>
      <a href="../../auth/logout.php" class=""> Выйти</a>
    </div>
  </nav>
  <main class="main">


    <?php

    if (isset($_GET["do_signup1"])) {
      echo '<div style= "text-align: center;">' . addcslashes(
        $_GET['first_name'],
        '<>'
      )
        . ', ваша форма отправлена.</div>';
    }
    ?>



    <form action="#" method="get" class="form">
      <div class="form__rows">
        <p class="form__row">
          <label for="first_name" class="form__label">Имя</label>
          <input type="text" placeholder="Enter name" name="first_name" id="first_name" value="<?php echo htmlspecialchars($_GET['first_name']); ?>" class="form__input">
        </p>
        <p class="form__row">
          <label for="surname" class="form__label">Фамилия</label>
          <input type="text" placeholder="Enter " name="surname" id="surname" class="form__input">
        </p>
        <p class="form__row">
          <label for="date" class="form__label">Дата</label>
          <input type="date" name="date" id="date" class="form__input">
        </p>
        <p class="form__row">
          <label for="email" class="form__label">Email</label>
          <input type="email" name="email" id="email" class="form__input">
        </p>
        <p for="post" class="form__row">
          <label class="form__label">Должность</label>
          <input type="text" list="list" name="post" id="post" class="form__input">
          <datalist id="list">
            <option value="Студент">
            <option value="Преподаватель">
          </datalist>
        </p>
        <p for="number" class="form__row">
          <label class="form__label">Номер телефона</label>
          <input type="tel" name="number" id="number" class="form__input">
        </p>
        <p for="password" class="form__row">
          <label class="form__label">Пароль</label>
          <input type="password" name="password" id="password" class="form__input">
        </p>
        <p class="form__row">
          <label class="form__label"></label>
          <textarea rows="10" cols="45" name="textarea1" id="textarea1"></textarea>
        </p>
        <p class="form__row">
          <label for="first_name" class="form__label">Переменная a</label>
          <input type="number" name="value_a" id="value_a" class="form__input">
        </p>
        <p class="form__row">
          <label for="first_name" class="form__label">Переменная b</label>
          <input type="number" name="value_b" id="value_b" class="form__input">
        </p>
      </div>
      <div class="form__button">
        <button class="form__button-text" type="button" name="generation" onclick="ButtonClick()">Сгенерировать</button>
      </div>
      <div class="form__button">
        <button class="form__button-text" type="button" name="send" onclick="ButtonClick1()">Отправить</button>
      </div>
      <div class="form__button">
        <button class="form__button-text" type="submit" name="do_signup1">Зарегистрироваться</button>
      </div>
    </form>
  </main>
  <aside class="sidebar">
    <ul class="sidebar__column">
      <li class="sidebar__row">Пункт №1</li>
      <li class="sidebar__row">Пункт №2</li>
      <li class="sidebar__row">Пункт №3</li>
      <li class="sidebar__row">Пункт №4</li>
      <li class="sidebar__row">Пункт №5</li>
    </ul>
  </aside>
  <footer class="footer">
    <div class="footer__text">
      Это footer
    </div>
  </footer>

</body>

</html>