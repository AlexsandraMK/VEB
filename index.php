<?php
	$name_bd = "lab2_bd";
	//подключаемся к MySQL, пользователь root без пароля, база данных
	$mysqli = new mysqli("localhost", "root", "", $name_bd);
	if ($mysqli->connect_errno)
		echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	$id = $_GET['id'];
	$sql = "SELECT * FROM `my_bd` WHERE id = $id";
	$result = mysqli_query($mysqli, $sql);
	$record = mysqli_fetch_assoc($result);

	mysqli_close($mysqli);
?>


<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="Стили/main_back.css">
		<link rel="stylesheet" type="text/css" href="Стили/only_news_page.css">
	</head>


	<body>	
 		<div style=" background-color: #e3b688; text-align: center;">
            <a id="name_magazine" href="main.php">
                Джо Джо NEWS
            </a>
        </div>

		<div id="container">
			<div id="content"> 
				<div id="header">
					<?php
						echo $record['title'];
					?>
				</div>
    			<div id="date">
					<?php
						echo "Дата размещения: " . $record['date_new'];
					?>
   				</div>  	
   	 			<div id="author">
					<?php
						echo "Автор статьи: " . $record['author'];
					?>
   				</div> 

 				<p style="text-align: center">
				<?php
					echo '<img height="300" width="418" src=' . $record['pict_1'] . ' align="center">';
				?>
				</p>
				<div id="stext">
					<?php
						echo $record['text_new'];
					?>
				</div>
				<p style="text-align: center">
				<?php
					echo '<img height="300" width="418" src=' . $record['pict_2'] . ' align="middle">';
				?>
				</p>
				<div id="footer">
					&copy; Ефименко Алекcандра, Каральчук Артем
				</div>
			</div>
		</div>
	</body>
</html>
