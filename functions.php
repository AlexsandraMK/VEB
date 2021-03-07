<link rel="stylesheet" type="text/css" href="Stili/list_news.css">

<?php
// Вводим список новостей + высоту новости(зависит от того админ клиент или нет)
function writeAllNews($news, $height_new, $is_admin)
{
    $id=0;
    while($record = mysqli_fetch_assoc($news))
    {
        $id=$record['id'];
        echo '<div id="one_new" style="height:' . $height_new .'px;">';
        echo '  <a href="index.php?id=' . $record['id'] . '" style="text-decoration: none;" title="Читать новость подробнее">';

        // Изображение новости
        echo '      <div id="image">';
        echo '          <img src=' . $record['pict'] . '> </img>';
        echo '      </div>';

        // Информации новости
        echo '      <div id="data">';
        echo '          <div id="empty"></div>';
        echo '          <div id="title">';
        echo '              <h2>' . $record['title'] . '</h2>';
        echo '              <div id="empty"></div>';
        echo '          </div>';
        echo '          <div id="anons">';
        echo '              <p style="text-indent: 20px; margin-left: 10px;  color: #000000;">' . $record['anons'] . '</p>';
        echo '              <hr>';
        echo '              <div id="date">';
        echo '                  <p> "Дата размещения: "' . $record['date_new'] . '</p>';
        echo '              </div>';
        echo '          </div>';
        echo '      </div>';
        echo '      <hr>';
        echo '  </a>';
        
        if ($is_admin)
        {
            echo '<p>';
            echo '  <a href="edit.php?id=' . $record['id'] . '" style="text-decoration: none;">';
            echo '      <input type="button" name="change" value="Изменить запись">';
            echo '  </a>';
            echo '  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            # Если кнопка нажата
            if( isset( $_POST["DELETE" . $id] ) )
            {
                $sql = "DELETE FROM `my_bd` WHERE id = $id";
                mysqli_query($mysqli, $sql);
                echo "<meta http-equiv='refresh' content='0;URL=main.php'>"; 
            }                        
            echo '  <form method="POST">';
            echo '      <input type="submit" name="DELETE' . $id . '" value="Удалить запись" />';
            echo '  </form>';
            echo '</p>';
        }
        echo '</div>';

    }

    return $id;
}

function addNew($id, $is_admin)
{
    // Добавление новости
    if ($is_admin)
    {
        echo '<div id="add_new">';
        echo '  <a href="edit.php?id=' . $id+1 . '" style="text-decoration: none;">';
        echo '      <input type="button" name="create" value="Добавить запись">';
        echo '  </a>';
        echo '</div>';
    }
}
?>                     
                   