<?php
    session_start();
    include ('functions.php');
	$name_bd = "lab2_bd";
	//подключаемся к MySQL, пользователь root без пароля, база данных
	$mysqli = new mysqli("localhost", "root", "", $name_bd);
	if ($mysqli->connect_errno)
		echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    
    // Запрос всех записей
	$sql = "SELECT * FROM `my_bd`";
	$result = mysqli_query($mysqli, $sql);

    // Подсчет количесвта записей
    $num_news = 0;
    if($result)
    {
        $num_news = $result->num_rows;
    }
    $step_new = 0;
    // Проверка как вошел пользователь и настройка полей относительно этого
    if (isset($_SESSION['admin']) && ($_SESSION['admin']>0))
    {
            $is_admin=1;
            $height_new = 295;  # Высота новости для админа
    }
    else
    {
            $is_admin=0; 
            $height_new = 235;  # Высота новости для пользователя
    }

    // Шаг с которым будет перемещаться слайдер
    $step_new = $height_new + 40;
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Джо Джо NEWS</title>
    <link rel="stylesheet" type="text/css" href="Stili/main_back.css">
    <script>var height = '<?php echo $step_new;?>';</script>
    <script>var num_news = '<?php echo $num_news;?>';</script>
    <script src="main.js" defer></script>
</head>
 
<body>
    <div  id="top_site">
        <a id="name_magazine" style="margin-left: 90px" >   Джо Джо NEWS    </a>
        <div style="float: right; text-decoration: none;  text-align: center; margin-right: 5px">
            <a href="login.php" style="text-decoration: none; font-size: 30px;">    Sign in   </a> 
        </div>
    </div>
    
    <div id="container">
        <div id="content">
            <div id="button-arrow-top" class="button">
            <div id="arrow-top" class="arrow arrow-top"></div>
            </div>
<?php
// Установка размера области для новостей
echo '      <div id="list_news" style="height:' . $step_new*2 . 'px">';
?>
                <div id="polosa">
<?php
                    $id = writeAllNews($result, $height_new, $is_admin);
?>
                </div>
            </div>
            <div id="button-arrow-bottom" class="button">
            <div id="arrow-bottom" class="arrow arrow-bottom"></div>
            </div>
<?php
            addNew($id, $is_admin);
?>   
            <div id="footer">   &copy; Ефименко Алекcандра, Каральчук Артем </div> 
        </div>
    </div>
</body>
</html>

<?php
	mysqli_close($mysqli);
?>