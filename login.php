<?php
    session_start();
	$name_bd = "lab2_bd";
	//подключаемся к MySQL, пользователь root без пароля, база данных
	$mysqli = new mysqli("localhost", "root", "", $name_bd);
	if ($mysqli->connect_errno)
		echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Джо Джо NEWS</title>
        <link rel="stylesheet" type="text/css" href="Stili/main_back.css">
    </head>
 
    <body>
        <div  id="top_site">
            <a id="name_magazine">
                Джо Джо NEWS
            </a>
        </div>
    
        <div id="container">
            <div id="content">
                <p>
                    Осуществить вход на сайт можно двумя способами: <br>
                    <li> Зайти как гость
                    <form method="POST">
                        <p align=center> 
        	                <input type="submit" value="Войти как гость" name="guest" />
                        </p> 
                    </form>
                    <?php 
                        if(isset($_POST['guest'])) 
                        {
                            $_SESSION["admin"] = 0;
                            header("Location:main.php");
                        }   
                    ?>
                    <li> Авторизоваться как администратор
                </p>
                <form method="POST">

                    <p align=center> 
                        Логин <br>
        	            <input type="text" name="login"> <br>
        	            Пароль <br>
        	            <input type="text" name="password"> <br> <br>
                        <input type="submit" value="Войти как администратор" name="log_in" />
                    </p> 
                </form>

                <?php
                    if(isset($_POST['log_in']))      
                        if ($_POST['login'] != "" && $_POST['password'] != "") //если поля заполнены    
                        {       
                            $login = $_POST['login']; 
                            $password = $_POST['password'];
                            $sql="SELECT * FROM `users_bd` WHERE login= '$login'";
                            $rezult = mysqli_query($mysqli, $sql);
                            if ( $rezult->num_rows == 1)       
                            {        
                                $record = mysqli_fetch_assoc($rezult);             
                                if ($password == $record['password'])                        
                                {
                                    $_SESSION["admin"] = 1;
                                    header("Location:main.php");
                                }         
                                else //если пароли не совпали           
                                {               
                                    $error = "Неверный пароль";        
                                    echo $error;
                                    return $error;          
                                }       
                            }       
                            else //если такого пользователя не найдено в базе данных        
                            {           
                                $error = "Неверный логин и пароль";       
                                echo $error;
                                return $error;      
                            }   
                        }  
                        else    
                        {       
                            $error = "Поля не должны быть пустыми!";    
                            echo $error;
                            return $error;  
                        } 
                ?>     
                <div id="footer">
                    &copy; Ефименко Алекcандра, Каральчук Артем
                </div> 
            </div>    
        </div>
    </body>
</html>

<?php
	mysqli_close($mysqli);
?>