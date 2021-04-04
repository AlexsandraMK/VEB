<?php

include_once ('functions_with_users.php');
$_SESSION["user"]=0;
$error = "";

if(isset($_POST['log_in']))   
{
    echo  $_POST['log_in'];
    if ($_POST['login'] != "" && $_POST['password'] != "") //если поля заполнены    
    {       
        $result = findUserByLogin($_POST['login']);

        if ( $result->num_rows == 1)
        {           
            $record = mysqli_fetch_assoc($result);
            if (md5($_POST['password']) == $record['password'])                        
            {
                $_SESSION["user"] = $record['id'];
                header("Location:home_html.php?id=" . $record['id']);
            }         
            else //если пароли не совпали           
            {               
                $error = "Неверный пароль";        
                return $error;          
            }       
        }       
        else //если такого пользователя не найдено в базе данных        
        {           
            $error = "Неверный логин и пароль";       
            return $error;      
        } 
    }  
    else    
    {       
        $error = "Поля не должны быть пустыми!";    
        return $error;  
    }    
}

if(isset($_POST['register']))   
{
     header("Location:registration_html.php");
}
return $error;
?>