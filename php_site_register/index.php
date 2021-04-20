 
<?php
require_once(__DIR__ .'/includes/connection.php');
function Register_user($link)
	{
       
		$err = [];
	// проверям логин
	$login=true;
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
	   $err[] = "Логин может состоять только из букв английского алфавита и цифр";
	   $login=false;
    }

    if(strlen($_POST['login']) < 3 || strlen($_POST['login']) > 30)
    {
		$err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
		$login=false;
    }
    // проверяем, не сущестует ли пользователя с таким именем

    $stmt = mysqli_stmt_init($link);
	if($login==true)
	{
    
    if (mysqli_stmt_prepare($stmt,"SELECT login FROM user_registr  where login=?")) {
    mysqli_stmt_bind_param($stmt, "s", $_POST['login']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $district);
    mysqli_stmt_fetch($stmt);
    if($district!=null)
    {
         $err[] = "Пользователь с таким логином уже существует в базе данных";
    }
    mysqli_stmt_close($stmt);
    }
    
	}
    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $login_name = $_POST['login'];
        $password = md5(md5(trim($_POST['password'])));
        $stmt = mysqli_stmt_init($link);
        

        
        if (mysqli_stmt_prepare( $stmt,"INSERT INTO user_registr (login, password) VALUES (?, ?)")) {
            mysqli_stmt_bind_param($stmt, "ss", $login_name, $password);
            if(mysqli_stmt_execute($stmt))
            {
                 header("Location: login.php"); exit();
            }else{
                echo "Ошибка";
            }
            mysqli_stmt_close($stmt);
        }
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err as $error)
        {
            print $error."<br>";
        }
    }
    
	mysqli_close($link);
};

if(isset($_POST['submit'])) Register_user($link);
?>
<?php include("includes/header.php"); ?>
<div class="container mregister">
<div id="login">
 <h1>Регистрация</h1>
<form  id="registerform" method="Post"name="registerform">
<p><label for="user_pass">Логин пользователя<br></label>
<input class="input" id="loginname" name="login"size="30" type="text" required ></p>
<p><label for="user_pass">E-mail<br></label>
<input class="input" id="email" name="email" size="32"type="email" value=""required ></p>
<p><label for="user_pass">Пароль<br>
<input class="input" id="password" name="password"size="32"   type="password" value="" required></label></p>
<button class="button" id="register" name= "submit" type="submit">Зарегестрироваться</button>
<p class="regtext">Уже зарегистрированы? <a href= "login.php">Введите имя пользователя</a>!</p>
 </form>
</div>
</div>
<?php include("includes/footer.php"); ?>
