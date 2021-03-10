<?php
	$name_bd = "lab2_bd";
	//подключаемся к MySQL, пользователь root без пароля, база данных
	$mysqli = new mysqli("localhost", "root", "", $name_bd);
	if ($mysqli->connect_errno)
		echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

    $id = $_GET['id'];
    $new = $_GET['new'];
	if ($new == 'FALSE')
    {
        
        $sql="SELECT * FROM `my_bd` WHERE id= '$id'";
        $result=mysqli_query($mysqli, $sql);
        $record = mysqli_fetch_assoc($result);
    }
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Джо Джо NEWS</title>
        <link rel="stylesheet" type="text/css" href="Stili/main_back.css">
    </head>
 
    <body>
        <div id="top_site">
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

                        if ($new == 'TRUE')
                        {
                        
             		    $sql = "INSERT INTO `my_bd` (`id`, `title`, `text_new`, `pict`, `anons`, `author`, `date_new`) VALUES (?, ?, ?, ?, ?, ?, ?)";

                        $stmt = mysqli_prepare($mysqli, $sql);
                        if ($stmt === FALSE)
                        {
                        	echo "Preparation failed. Data wasn't sent";
                        	return;
                        }

                        mysqli_stmt_bind_param($stmt, "issssss", $id, $title, $text, $image, $anons, $author, $date);
                        
                        }
                        else
                        {
                        $sql = "UPDATE `my_bd` SET `title` = '$title', `text_new` = '$text', `pict` = '$image', `anons` = '$anons', `date_new` = '$date' WHERE id='$id'"; 

                        $stmt = mysqli_prepare($mysqli, $sql);                       
                        if ($stmt === FALSE)
                        {
                        	echo "Preparation failed. Data wasn't sent";
                        	return;
                        }

                        mysqli_stmt_bind_param($stmt, "sssss", $title, $text, $image, $anons, $date);
                        }
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                        //mysqli_query($mysqli, $sql);
        			    header("Location:main.php");

        		    }
        	    ?>
			    <form method="POST">    
        	        <tr> Заголовок </tr>
                                        <br>
        	        <input type="text" name="title" style="margin: 10px" required maxlength=40 value=<?php 
                            if ($new == 'FALSE') {
                                echo $record['title'];
                            }
                        ?> > 
        	        <br>
        	        <tr> Картинка </tr>
                                        <br>
        	        <input type="text" name="image" style="margin: 10px;" placeholder="Img_1.png, Img_2.png, Img_3.png..." required value=<?php 
                            if ($new == 'FALSE') {
                                echo $record['pict'];
                            }
                        ?> >
                    
        	        <br>
        	        <!-- <input type="file" name="Главное изображение">  -->        	
        	        <tr> Анонс </tr>
                                        <br>
        	        <textarea name="anons" style="margin: 10px" required cols=50 rows=5 maxlength=1000>
                        <?php 
                            if ($new == 'FALSE') {
                                echo $record['anons'];
                            }
                        ?>   
                    </textarea> 
        	        <br>
        	        <tr> Текст </tr>
                                        <br>
        	        <textarea name="text" style="margin: 10px" required cols=50 rows=25 maxlength=5000 >  <?php 
                            if ($new == 'FALSE') {
                                echo $record['text_new'];
                            }
                        ?> 
                    </textarea>
        	        <br>
        	        <tr> Автор </tr>
                    <br>
        	        <input type="text" name="author" style="margin: 10px" required maxlength=25 
                    <?php 
                            if ($new == 'FALSE') {
                                echo 'value=' . $record['author'];
                                echo ' readonly';
                            }
                        ?>  > 
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
