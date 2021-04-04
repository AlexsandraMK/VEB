<?php

function home($id)
{
?>
    <li class=" menu-homepage menu-item-has-child dropdown">
    <?php echo '<a href="home_html.php?id=' . $id . '" title="Home">'; ?>
    <i class="fa fa-home"></i>Профиль</a>
    </li>
<?php
}

function dialogs($id)
{
?>
    <li class=" menu-homepage menu-item-has-child dropdown">
    <?php echo '<a href="dialogs.php?id=' . $id . '" title="Dialogs">'; ?>
    <i class="fa fa-dialogs"></i>Диалоги</a>
    </li>
<?php
}

function user($id)
{
?>
    <li class=" menu-homepage menu-item-has-child dropdown" style="padding: 0px 10px; border: 5px solid #6bce04;"><p>
    <?php writeUser_2(findUserById($id)); ?>
    </p></li>
<?php
}

?>