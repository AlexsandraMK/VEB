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
  <style type="text/css">

	a { color: #5574d3; text-decoration: none;  mix-blend-mode: color-burn; text-shadow: 2px 2px 3px black} 	/* Цвет ссылок */

	#container {
	margin: 0 auto; 	
	background-image: url(JotaroSide.jpg);
	background-position: top;
	background-repeat: repeat-x, round;
	background-attachment: fixed;
	}
	
	#header { 
	font-size: 2.2em; 		/* Размер текста */
	text-align: center; 	/* Выравнивание по центру */
	padding: 7px; 			/* Отступы вокруг текста */
	background: #DFDCCE;	/* Цвет фона шапки */
	color: #5574d3;
	}
	
	#content {
	background: #BFBBAC;
	margin: 0 auto; 		/* Ширина колонок */
	padding: 10px;
	min-width: 800px;
	max-width: 800px;
	float: center;
	}

	#synopsis {
	background: #BFBBAC;
	margin: 0 160px; 		/* Ширина колонок */
	padding: 10px;
	}
	#stext{ 
		color:#4f0f0f; 
		font-size:  24px;
		padding: 8px;} /* 4f0f0f */

	#date {
		padding: 2px;
		color: #707070;
		text-align: right;
		font-size: 14px;
	}
	#links {	
		padding-right: 7%; /*не робит*/
		text-align = center;
		font-size: 12px;
	}
	#divide{
		text-align: "center";
		font-size: 30px;
		font-weight: 700;
		color: #B0AD9D;
	}
	#author{
		padding: 2px;
		color: #444444;
		text-align: right;
		font-size: 14px;	
	}
		#footer { 
		clear: both; 			/* Отменяем действие float */
		padding: 5px; 			/* Отступы вокруг текста */
		background: #667299; 	/* Цвет фона подвала */
	}
  </style>
 </head>

 

 <body>	
 	<div style="background-color: #e3b688; text-align: center; font-size: 30px; font-family: fantasy;">
      <a href="main.php"> Джо Джо NEWS </a>     </div>
 

  <div id="container">
  	<div id="header">
		<?php
			echo $record['title'];
		?>
	</div>
   <div id="content"> 
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

   <!-- Текст ---------------------------------------------------------->

 		<p style="text-align: center">
			<?php
				echo '<img height="300" width="418" src=' . $record['pict_1'] . ' align="center" alt="Польнарефф">';
			?>
		</p>
		<div id="stext">
			<?php
				echo $record['text_new'];
			?>
		</div>
		<p style="text-align: center">
			<?php
				echo '<img height="300" width="418" src=' . $record['pict_2'] . ' align="middle" alt="Дэвушка">';
			?>
			
		</p>


  <div id="footer">&copy; Артём Каральчук, Александра Ефименко</div>

   </div>

 
  </div>
 </body>
</html>
