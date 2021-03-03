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
        <link rel="stylesheet" type="text/css" href="Стили/main_back.css">
    </head>
 
    <body>
        <div style=" background-color: #e3b688; text-align: center;">
            <a id="name_magazine">
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
        				    header("Location:main.php");	 
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
                <div id="footer">
                    &copy; Ефименко Алекcандра; Каральчук Артем
                </div> 
            </div>    
        </div>
    </body>
</html>

<?php
	mysqli_close($mysqli);
?>