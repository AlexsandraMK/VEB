<link rel="stylesheet" type="text/css" href="Stili/list_news.css">

<?php
// Вводим список новостей + высоту новости(зависит от того админ клиент или нет)
function writeAllNews($mysqli, $news, $height_new, $is_admin)
{
    $id=0;
    while($record = mysqli_fetch_assoc($news))
    {
        $id=$record['id'];
        echo '<div id="one_new' . $id . '" class="one_new" style="height:' . $height_new .'px;">';
        echo '  <a id="a' . $id . '" href="index.php?id=' . $record['id'] . '" style="text-decoration: none;" title="Читать новость подробнее">';

        // Изображение новости
        echo '      <div id="image' . $id . '" class="image">';
        echo '          <img id="img' . $id . '"src=' . $record['pict'] . '> </img>';
        echo '      </div>';

        // Информации новости
        echo '      <div id="data' . $id . '" class="data">';
        echo '          <div id="empty' . $id . '_1" class="empty"></div>';
        echo '          <div id="title' . $id . '" class="title">';
        echo '              <h2 id="h2' . $id . '">' . $record['title'] . '</h2>';
        echo '              <div id="empty' . $id . '_2" class="empty"></div>';
        echo '          </div>';
        echo '          <div id="anons' . $id . '" class="anons">';
        echo '              <p id="p_anons' . $id . '" style="text-indent: 20px; margin-left: 10px;  color: #000000;">' . $record['anons'] . '</p>';
        echo '              <hr id="hr_anons' . $id . '">';
        echo '              <div id="date' . $id . '" class="date">';
        echo '                  <p id="p_date' . $id . '"> "Дата размещения: "' . $record['date_new'] . '</p>';
        echo '              </div>';
        echo '          </div>';
        echo '      </div>';
        echo '      <hr id="hr_a' . $id . '">';
        echo '  </a>';
        
        if ($is_admin)
        {
            echo '<p id="p_is_admin' . $id . '">';
            echo '  <a id="a_is_admin' . $id . '" href="edit.php?id=' . $record['id'] . '&new=FALSE' . '" style="text-decoration: none;">';
            echo '      <input id="input_is_admin_change' . $id . '" type="button" name="change" value="Изменить запись">';
            echo '  </a>';
            # Если кнопка нажата
            if( isset( $_POST["DELETE" . $id] ) )
            {
                $sql = "DELETE FROM `my_bd` WHERE id = $id";
                mysqli_query($mysqli, $sql);
                mysqli_close($mysqli);
?>
                <script>
                    location.href=location.href;
                </script>
<?php
            }                        
            echo '  <form id="form_is_admin' . $id . '" method="POST">';
            echo '      <input id="input_is_admin_delete' . $id . '" type="submit" name="DELETE' . $id . '" value="Удалить запись" />';
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
        echo '  <a href="edit.php?id=' . ($id+1) . '&new=TRUE' . '" style="text-decoration: none;">';
        echo '      <input type="button" name="create" value="Добавить запись">';
        echo '  </a>';
        echo '</div>';
    }
}
?>                     
                   