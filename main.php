<?php
    session_start();
	$name_bd = "lab2_bd";
	//подключаемся к MySQL, пользователь root без пароля, база данных
	$mysqli = new mysqli("localhost", "root", "", $name_bd);
	if ($mysqli->connect_errno)
		echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	$sql = "SELECT * FROM `my_bd`";
	$result = mysqli_query($mysqli, $sql);
    if (isset($_SESSION['admin']) && ($_SESSION['admin']>0))
        $is_admin=1;
    else
        $is_admin=0; 
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
    <div style=" background-color: #e3b688; text-align: center;">
        <a id="name_magazine" style="color: #5574d3; mix-blend-mode: color-burn; margin-left: 90px" >
            Джо Джо NEWS
        </a>
        <div style="float: right; text-decoration: none;  text-align: center; margin-right: 5px">
            <a href="login.php" style="text-decoration: none; font-size: 30px;"> 
                Sign in
            </a>
        </div>
    </div>
    
    <div id="container">
        <div id="content">
            <?php
                $id=0;
                while($record = mysqli_fetch_assoc($result))
                {
                    $id=$record['id'];
            ?>
            <?php
                echo '<a href="index.php?id=' . $record['id'] . '" style="text-decoration: none;" title="Читать новость подробнее">';
            ?>
            
            <div style=" margin-top: 20px; margin-left: 40px;">
                <div id="image">
                    <?php
                        echo '<img src=' . $record['pict'] . ' style="width: inherit; height: inherit;"></img>';
                    ?>
                </div>
                <div id="data">
                    <div style="height: 2px;"></div>
                    <div id="header" style="width: 80%;">
                        <h2>
                            <?php
                               echo $record['title'];
                            ?>
                        </h2>
                        <p style="height: 5px;"></p>
                    </div>
                    <div id="anons">
                        <p style="text-indent: 20px; margin-left: 10px;  color: #000000;">
                           <?php
                               echo $record['anons'];
                           ?>
                        </p>
                        <hr>
                        <div id="date">
                            <p>
                                <?php
                                    echo "Дата размещения: " . $record['date_new'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            </a>

            
            <?php
                if ($is_admin)
                {
            ?>
                <p>
                    <?php
                        echo '<a href="edit.php?id=' . $record['id'] . '" style="text-decoration: none;">';
                    ?>
                    <input type="button" name="change" value="Изменить запись">
                    </a>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                        # Если кнопка нажата
                        if( isset( $_POST["DELETE" . $id] ) )
                        {
                            $sql = "DELETE FROM `my_bd` WHERE id = $id";
                            $h = mysqli_query($mysqli, $sql);
                            header("Location:main.php?admin=1");
                        }
                    ?>
                    <form method="POST">
                    <?php
                        echo '<input type="submit" name="DELETE' . $id . '" value="Удалить запись" />';
                    ?>
                    </form>

                </p>
               
            <?php
                }
            ?>
            <hr>
            <?php
                }
            ?>
            <div style="height: 50px;">
            <?php
                if ($is_admin)
                {
                    echo '<a href="edit.php?id=' . $id+1 . '" style="text-decoration: none;">';
            ?>
            <input type="button" name="create" value="Добавить запись">
            </a>
            </div>
            <?php
                }
            ?>
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