<?php
session_start();
if (!isset($_SESSION['logged_user'])) {
	$_SESSION['authlink'] = 2;
	header("Location: http://localhost/auth/login.php");
}
?>
<!doctype html>
<html lang="ru">

<head>
	<title>Новости</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<header class="header">
		<h1 class="header__title">Новости</h1>
	</header>
	<nav class="menu">
		<div class="menu__nav">
			<form>
				<button class="menu__button" formaction="http://localhost/index.php">Главная страница</button>
				<button class="menu__button" formaction="http://localhost/Contacs/Contacs.php">Контакты</button>
				<button class="menu__button" formaction="http://localhost/calculator/calculator.php">Калькулятор</button>
			</form>
		</div>
		<div class="menu__auth">
			<a href="../../auth/changepass.php" class="">Поменять пароль /</a>
			<a href="../../auth/logout.php" class=""> Выйти</a>
		</div>
	</nav>
	<main class="main">

		<section class="main__section">
			<h2 class="main__text-title">Недавние</h2>
			<ul class="main__section__column">
				<li class="main__section__row"><a href="News1/News1.php" class="main__section__row-link">Новость №1 </a>
					<p class="hidden-text">Краткое описание</p>
				</li>
				<li class="main__section__row"><a href="" class="main__section__row-link">Новость №2</a>
					<p class="hidden-text">Краткое описание</p>
				</li>
				<li class="main__section__row"><a href="" class="main__section__row-link">Новость №3</a>
					<p class="hidden-text">Краткое описание</p>
				</li>
				<li class="main__section__row"><a href="" class="main__section__row-link">Новость №4</a>
					<p class="hidden-text">Краткое описание</p>
				</li>
				<li class="main__section__row"><a href="" class="main__section__row-link">Новость №5</a>
					<p class="hidden-text">Краткое описание</p>
				</li>
				<li class="main__section__row"><a href="" class="main__section__row-link">Новость №6</a>
					<p class="hidden-text">Краткое описание</p>
				</li>
			</ul>

		</section>

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