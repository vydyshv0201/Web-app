<?php
session_start();
$_SESSION['authlink'] = 1;

?>
<!doctype html>
<html lang="ru">

<head>
	<title>Главная страница</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<header class="header">
		<h1 class="header__title">Главная страница</h1>
	</header>

	<nav class="menu">
		<div class="menu__nav">
			<form>
				<button class="menu__button" formaction="http://localhost/News/News.php">Новости</button>
				<button class="menu__button" formaction="http://localhost/Contacs/Contacs.php">Контакты</button>
				<button class="menu__button" formaction="http://localhost/calculator/calculator.php">Калькулятор</button>
			</form>
		</div>
		<div class="menu__auth">
			<?php if (isset($_SESSION['logged_user'])) {
				echo '<a href="auth/changepass.php" class="">Поменять пароль /</a>';
				echo '<a href="auth/logout.php" class=""> Выйти</a>';
			} else {
				echo '<a href="auth/login.php" class=""> Войти</a>';
			}
			?>
		</div>
	</nav>
	<main class="main">
		<section class="main__section">
			<h2 class="main__text-title">Подзаголовок</h2>
			<p class="main__text">
				Флексагон представляет собой бумажную фигуру, которая имеет
				три и более стороны. Поначалу кажется, что это невозможно, но вспомните
				ленту Мёбиуса, она ведь имеет всего одну сторону, в отличие от листа бумаги,
				и, тем не менее, реальна. Так же реален и флексагон, который легко сделать и
				склеить в домашних условиях. Он выглядит как двухсторонний шестиугольник, но
				стоит согнуть его особым образом, и мы увидим третью сторону. Легко убедиться,
				что мы имеем дело именно с тремя сторонами, если раскрасить их в разные цвета.
				Перегибая флексагон, по очереди будем наблюдать все его поверхности.
			</p>
			<h2 class="main__text-title">Подзаголовок</h2>
			<p class="main__text">
				Флексагон представляет собой бумажную фигуру, которая имеет
				три и более стороны. Поначалу кажется, что это невозможно, но вспомните
				ленту Мёбиуса, она ведь имеет всего одну сторону, в отличие от листа бумаги,
				и, тем не менее, реальна. Так же реален и флексагон, который легко сделать и
				склеить в домашних условиях. Он выглядит как двухсторонний шестиугольник, но
				стоит согнуть его особым образом, и мы увидим третью сторону. Легко убедиться,
				что мы имеем дело именно с тремя сторонами, если раскрасить их в разные цвета.
				Перегибая флексагон, по очереди будем наблюдать все его поверхности.
			</p>
			<h2 class="main__text-title">Подзаголовок</h2>
			<p class="main__text">
				Флексагон представляет собой бумажную фигуру, которая имеет
				три и более стороны. Поначалу кажется, что это невозможно, но вспомните
				ленту Мёбиуса, она ведь имеет всего одну сторону, в отличие от листа бумаги,
				и, тем не менее, реальна. Так же реален и флексагон, который легко сделать и
				склеить в домашних условиях. Он выглядит как двухсторонний шестиугольник, но
				стоит согнуть его особым образом, и мы увидим третью сторону. Легко убедиться,
				что мы имеем дело именно с тремя сторонами, если раскрасить их в разные цвета.
				Перегибая флексагон, по очереди будем наблюдать все его поверхности.
			</p>



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