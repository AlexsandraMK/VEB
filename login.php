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

        <style type="text/css">
            #container 
            {
	            margin: 0 auto; 	
	            background-image: url(JotaroSide.jpg);
	            background-position: top;
	            background-repeat: repeat-x, round;
	            background-attachment: fixed;
	        }

            #name_magazine
            {
                background-color: #e3b688;
                text-align: center;
                font-size: 30px;
                font-family: fantasy; 
                text-decoration: none;
                text-shadow: 2px 2px 3px black;
            }

            #content
            {
	            background: #BFBBAC;
            	margin: 0 auto; 		/* Ширина колонок */
	            padding: 10px;
	            min-width: 800px;
	            max-width: 800px;
	            float: center;
                position: relative;
                min-height: 100%;
	        }

           
            p 
            {
                margin-top: 0.5em; /* Отступ сверху */
                margin-bottom: 0.5em; /* Отступ снизу */
            }

            hr
            {
                color: #ffffff;
            }
        </style>
    </head>
 
<body>
    <div id="name_magazine">
        <a style="color: #5574d3; mix-blend-mode: color-burn;" >
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

                <p align=center> Логин <br>
        	        <input type="text" name="login">
                </p>
        	    <p align=center> Пароль <br>
        	        <input type="text" name="password">
                </p>
                <p align=center> 
        	        <input type="submit" value="Войти как администратор" name="log_in" />
                </p> 
            </form>

            <p align=center>
            <?php
            if(isset($_POST['log_in']))      
               if ($_POST['login'] != "" && $_POST['password'] != "") //если поля заполнены    
               {       
                    $login = $_POST['login']; 
                    $password = $_POST['password'];
                    $rezult = mysqli_query($mysqli, "SELECT * FROM `users_bd` WHERE login= '$login'");
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
            </p>
           

           
            <div style="background-color: #667299; width: 97.5%; font-size: 18px; position: absolute; bottom: 0; scroll-behavior: smooth;">
                &copy; Ефименко Алекcандра; Каральчук Артем
            </div> 
        </div>    
    </div>
</body>
</html>

<?php
	mysqli_close($mysqli);
?>