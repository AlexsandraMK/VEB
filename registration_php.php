<?php
include_once ('functions_with_users.php');
$error = "";

if(isset($_POST['register']))   
{
    if ( $_POST['name'] == "" )
    {
        $error = "Пожалуйста введите ваше имя<br/>";    
        return $error;  
    }

    if ( $_POST['surname'] == "" )
    {
        $error = "Пожалуйста введите вашу фамилию<br/>"; 
        return $error;     
    }

    if ($_POST['login'] == "" || $_POST['password'] == "") //если поля заполнены    
    {       
        $error = "Поля логина и пароля не должны быть пустыми!<br/>"; 
        return $error; 
    }

    if ($error == "") //если поля заполнены    
    {       
        $user = findUserByLogin($_POST['login']);
        $num_users = $user->num_rows;

        if ( $num_users == 0 )
        {
        // Добавление пользователя
            createUser($_POST['name'], $_POST['surname'], $_POST['login'], $_POST['password']); 
            header("Location:index.php");
        }       
        else //если такой пользователь есть в бд       
        {           
            $error = "Данный логин уже занят, пожалуйста введите другой<br/>";       
            echo $error;
            return $error;      
        }  
    }  
}

return $error;
?>