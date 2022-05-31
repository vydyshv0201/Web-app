<!doctype html>
<html lang="ru">


<head>
    <title>Восстановить пароль</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/jquery-3.6.0.min.js"></script>
</head>

<body class="form-body">
    <header class="header">
        <h1 class="header__title">Восстановить пароль</h1>
    </header>
    <form name='user' action='http://localhost/auth/recoveryscript.php' class="form">
        <div class="form__rows">
            <p class="form__row">
                <label label for="password" class="form__label">Введите свой Email</label>
                <input type="text" name="email" placeholder="Enter email" id="email" value="<?php echo $_POST['email']; ?>" class="form__input">
            </p>
        </div>
        <div class="form__button">
            <input type="submit" name="submit" value="Отправить">
        </div>
    </form>   
    
<script>
// получаем объект формы
var form = document.forms.user;
// прикрепляем обработчик кнопки
form.submit.addEventListener("click", sendRequest);
 
// обработчик нажатия
function sendRequest(event){
     
    event.preventDefault();
    var formData = new FormData(form);
 
    var request = new XMLHttpRequest();
 
    request.open("POST", form.action);
     
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200)
            document.getElementById("output").innerHTML=request.responseText;
    }
    request.send(formData);
    request.onload = () => alert(request.response);
    setTimeout(function(){
        window.location.href = 'http://localhost/auth/login.php';
    }, 1 * 1000);
}
</script>
</body>



</html>