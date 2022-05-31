<?php

if (empty($_POST['email'])) {
	echo 'Укажите логин';}
$data['email'] = $_POST['email'];

$errors = array();
$flag = false;

require_once 'db.php';
$sql = "SELECT * FROM users";
$result = mysqli_query($link, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($categories as $category)
{
    if ($category['email'] == $data['email']) {

        $length = 6;
        $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP'; 
        $size = strlen($chars) - 1; 
	    $password = ''; 
	    while($length--) {
	        $password .= $chars[random_int(0, $size)]; 
        }

        mail(''.$category['email'].'', 'Восстановление пароля', 'Ваш логин: '.$category['login'].' и новый пароль: '.$password.'', 'От: site@gmail.com');

        $sql = "UPDATE users SET password='".password_hash($password, PASSWORD_DEFAULT)."' WHERE email='".$category['email']."'";
        $result = mysqli_query($link, $sql);

        $sql = "UPDATE users SET ChPass=1 WHERE email='".$category['email']."'";
        $result = mysqli_query($link, $sql);

        mysqli_close($link);
        echo ('На вашу почту отправлено письмо');
        $flag = true;
    }
}

if (!$flag){
    $errors[] = 'Аккаунта с таким email`ом не существует!';
    echo array_shift($errors);   
}
 

?>