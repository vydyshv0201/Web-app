<?php
session_start();
if (!isset($_SESSION['logged_user'])) {
  $_SESSION['authlink'] = 4;
  header("Location: http://localhost/auth/login.php");
}
?>
<!doctype html>
<html lang="ru">

<head>
  <title>Заполнить форму</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/calculator.js"></script>
</head>

<body>
  <header class="header">
    <h1 class="header__title">Калькулятор</h1>
  </header>
  <nav class="menu">
    <div class="menu__nav">
      <form>
        <button class="menu__button" formaction="http://localhost/index.php">Главная страница</button>
        <button class="menu__button" formaction="http://localhost/News/News.php">Новости</button>
        <button class="menu__button" formaction="http://localhost/Contacs/Contacs.php">Контакты</button>
      </form>
    </div>
    <div class="menu__auth">
      <a href="../../auth/changepass.php" class="">Поменять пароль /</a>
      <a href="../../auth/logout.php" class=""> Выйти</a>
    </div>
  </nav>

  <main class="main">

    <table class="calculator">
      <tr>
        <td>
          <input type="text" id="display" name="display" class="display" value="0" readonly>
        </td>
      </tr>
      <tr>
        <td class="buttons">
          <input type="button" class="calculator-button" name="doit" value="c" onclick="Clear()">
          <input type="button" class="calculator-button" name="zero" value="ce" onclick="ClearEntry()">
          <input type="button" class="calculator-button" name="clear" value="^" onclick="Operation('^')">
          <input type="button" class="calculator-button" name="div" value="/" onclick="Operation('/')">
          <br>
          <input type="button" class="calculator-button" name="one" value="7" onclick="NumPressed(7)">
          <input type="button" class="calculator-button" name="two" value="8" onclick="NumPressed(8)">
          <input type="button" class="calculator-button" name="three" value="9" onclick="NumPressed(9)">
          <input type="button" class="calculator-button" name="add" value="x" onclick="Operation('*')">
          <br>
          <input type="button" class="calculator-button" name="four" value="4" onclick="NumPressed(4)">
          <input type="button" class="calculator-button" name="five" value="5" onclick="NumPressed(5)">
          <input type="button" class="calculator-button" name="six" value="6" onclick="NumPressed(6)">
          <input type="button" class="calculator-button" name="sub" value="-" onclick="Operation('-')">
          <br>
          <input type="button" class="calculator-button" name="seven" value="1" onclick="NumPressed(1)">
          <input type="button" class="calculator-button" name="eight" value="2" onclick="NumPressed(2)">
          <input type="button" class="calculator-button" name="nine" value="3" onclick="NumPressed(3)">
          <input type="button" class="calculator-button" name="mul" value="+" onclick="Operation('+')">
          <br>
          <input type="button" class="calculator-button" name="clear" value="+/-" onclick="Neg()">
          <input type="button" class="calculator-button" name="zero" value="0" onclick="NumPressed(0)">
          <input type="button" class="calculator-button" name="div" value="." onclick="Decimal()">
          <input type="button" class="calculator-button" name="doit" value="=" onclick="Operation('=')">
        </td>
      </tr>
    </table>


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