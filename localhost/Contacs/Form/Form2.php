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
</head>

<body>
  <header class="header">
    <h1 class="header__title">Заполнить форму</h1>
  </header>
  <nav class="menu">
    <div class="menu__nav">
      <button class="menu__button"><a href="../../index.php" class="menu__link">Главная страница </a></button>
      <button class="menu__button"><a href="../../News/News.php" class="menu__link">Новости</a></button>
      <button class="menu__button"><a href="../Contacs.php" class="menu__link">Контакты</a></button>
    </div>
    <div class="menu__auth">
      <a href="../../auth/changepass.php" class="">Поменять пароль /</a>
      <a href="../../auth/logout.php" class=""> Выйти</a>
    </div>
  </nav>
  <main class="main">
    <form action="data.php" method="post" enctype="multipart/form-data" class="form">

      <div class="form__rows">
        <p class="form__row">
          <label for="first_name" class="form__label">Имя</label>
          <input type="text" placeholder="Enter name" name="first_name" id="first_name" class="form__input">
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
        <p class="form__row">
          <label for="age" class="form__label">Возраст</label>
          <input type="number" name="age" id="age" min="0" max="100" step="4" class="form__input">
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
        <p for="number" class="form__row">
          <label class="form__label">Загрузить файл</label>
          <input type="file" name="userfile" id="userfile" class="form__input">
        </p>
      </div>
      <div class="form__button">
        <button class="form__button-text">Зарегистрироваться</button>
      </div>
      <div class="form__button">
        <button class="form__button-text"><a href="Form.php" class="form_button-text_link">Форма 1</a></button>
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