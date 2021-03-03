<?php
	$name_bd = "lab2_bd";
	//подключаемся к MySQL, пользователь root без пароля, база данных
	$mysqli = new mysqli("localhost", "root", "", $name_bd);
	if ($mysqli->connect_errno)
		echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	
    $id = $_GET['id'];
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

            #image
            {
                float: left;
                width: 300px;
                height: 200px;
            }

            #data
            {
                margin-left: 300px;
                width: 460px;
                height: 225px;
            }

            #date
            {
		        color: #313131;
		        text-align: right;
		        font-size: 14px;
	        }

            #header
            { 
	            text-align: center; 	/* Выравнивание по центру */
	            background: #DFDCCE;	/* Цвет фона шапки */
	            color: #2b4697;
	        }

            #anons
            {
                padding: 2px;
                margin-left: 10%;
                width: 80%;
                margin-top: -30px;
                background-color: #b6c0e3;
                color: #000000;;
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
            <?php 
        		if( isset( $_POST['submit1']))
        		{       		
        			$date = date("Y-m-d H:i:s");

        			$title = $_POST['title'];
        			$text = $_POST['text'];
        			$image = $_POST['image'];
        			$anons = $_POST['anons'];
        			$author = $_POST['author'];

             		$sql = "INSERT INTO `my_bd` (`id`, `title`, `text_new`, `pict`, `anons`, `author`, `date_new`) VALUES ('$id', '$title','$text' ,'$image' ,'$anons', '$author' , '$date')";
        	 		if (mysqli_query($mysqli, $sql))
        	 		{
        				header("Location:main.php?creation=success");
        				exit;
        	 		}	 
        	 		else
        	 		{
        	 			header("Location:main.php?creation=failed");
        				exit;
        	 		}
        		}
        	?>
			<form method="POST">    
        	<tr> Заголовок </tr>
        	<input type="text" name="title" style="margin: 10px">
        	<br>
        	<tr> Картинка </tr>
        	<input type="text" name="image" style="margin: 10px">
        	<br>
        	<!-- <input type="file" name="Главное изображение">  -->        	
        	<tr> Анонс </tr>
        	<input type="text" name="anons" style="margin: 10px">
        	<br>
        	<tr> Текст </tr>
        	<input type="text" name="text" style="margin: 10px">
        	<br>
        	<tr> Автор </tr>
        	<input type="text" name="author" style="margin: 10px"> 
        	<br>         	
        	  	<input type="submit" name="submit1" value="Отправить" style="margin: 10px">
        	 	<br>
        	</form>
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