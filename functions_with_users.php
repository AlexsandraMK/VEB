<?php

function connectingBD()
{
	$name_bd = "lab7_bd";
	$mysqli = new mysqli("localhost", "root", "", $name_bd);
	if ($mysqli->connect_errno)
		echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	return $mysqli;
}


function closeBD($mysqli)
{
	mysqli_close($mysqli);
}


function findUserByLogin($login)
{
	$mysqli = connectingBD();
	$name_table = "users";
	$sql=" SELECT * FROM $name_table WHERE login= '$login'";
	$result = mysqli_query($mysqli, $sql);
	closeBD($mysqli);
	return $result;
}

function createUser($name, $surname, $login, $password)
{
	$mysqli = connectingBD();
	$name_table = "users";
	$new_password = md5($password);
	$sql="INSERT INTO $name_table (name, surname, login, password) VALUES ( '" . $name . "' , '" . $surname . "', '" . $login . "', '" . $new_password . "');";
	$result = mysqli_query($mysqli, $sql);
	closeBD($mysqli);
	return $result;
}


function findUserById($id)
{
	$mysqli = connectingBD();
	$name_table = "users";
	$sql=" SELECT * FROM $name_table WHERE id= '$id'";
	$result = mysqli_query($mysqli, $sql);
	closeBD($mysqli);
	return $result;
}

function writeUser($result)
{
	if($result)
	{
		$record = mysqli_fetch_assoc($result);
		if ($record)
		{
			echo $record['name'];
			echo "<br>";
			echo $record['surname'];
		}
	}
}

function writeUser_2($result)
{
	if($result)
	{
		$record = mysqli_fetch_assoc($result);
		if ($record)
		{
			echo $record['name'];
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo $record['surname'];
		}
	}
}

function findAllUsersWithoutId($id)
{
	$mysqli = connectingBD();
	$name_table = "users";
	$sql=" SELECT * FROM $name_table WHERE id!= '$id'";
	$result = mysqli_query($mysqli, $sql);
	closeBD($mysqli);
	return $result;
}

function writeAllUsers($result)
{
	if($result)
	{
		while($record = mysqli_fetch_assoc($result))
		{
			echo '<li><a href="home_html.php?id=' . $record['id'] . '">' . $record['name'] . " " . $record['surname'] . '</a><span class="icon icon-dialog"></span></li>';
		}
	}
}

function findDialog($id_out, $id_to)
{
	$mysqli = connectingBD();
	$name_table = "dialogs";
	$sql=" SELECT * FROM $name_table WHERE id_out='$id_out' AND id_to='$id_to' OR id_out='$id_to' AND id_to='$id_out'";
	$result = mysqli_query($mysqli, $sql);
	closeBD($mysqli);
	return $result;
}

function findAllDialogs($id)
{
	$mysqli = connectingBD();
	$name_table = "dialogs";
	$sql=" SELECT * FROM $name_table WHERE id_out='$id' OR id_to='$id'";
	$result = mysqli_query($mysqli, $sql);
	closeBD($mysqli);
	return $result;
}

function writeAllDialogs($result)
{
	if($result)
	{
		while($record = mysqli_fetch_assoc($result))
		{
			if($record['id_out'] == $_SESSION['user'])
			{
				echo '<li><a href="dialog.php?id_out=' . $record['id_out'] . '&id_to=' . $record['id_to'] . '"><p>';
				writeUser_2(findUserById($record['id_to']));
				echo '</p></a></li>';
			}
			else 
			{
				echo '<li><a href="dialog.php?id_out=' . $record['id_to'] . '&id_to=' . $record['id_out'] . '"><p>';
				writeUser_2(findUserById($record['id_out']));
				echo '</p></a></li>';
			}
		}
	}
}

function findAllMessages($id_out, $id_to)
{
	$mysqli = connectingBD();

	$name_table = "dialog";
	$sql=" SELECT * FROM $name_table WHERE (id_out='$id_out' AND id_to='$id_to') OR (id_out='$id_to' AND id_to='$id_out')";
	$result = mysqli_query($mysqli, $sql);
	closeBD($mysqli);
	return $result;
}

function writeDialog($result)
{
	if($result)
	{
		while($record = mysqli_fetch_assoc($result))
		{
			if($_SESSION['user'] == $record['id_out'])
				echo '<li style="text-align:right"><p>' . $record['message'] . '</p></li>';
			else
				echo '<li style="text-align:left"><p>' . $record['message'] . '</p></li>';
		}
	}
}

function sendMessage($id_out, $id_to)
{
	$new_dialog = 0;
	$id_dialog = 0;
	$mysqli = connectingBD();
	if( isset( $_POST['send']) && $_POST['message'] != "")
    {       		
		$result = findAllMessages($id_out, $id_to);
		if ($result->num_rows == 0)
		{
			$name_table_all_dialogs =  "dialogs";
			$sql = 'INSERT INTO `' . $name_table_all_dialogs . '` (`id_out`, `id_to`) VALUES (' . $id_out . ', ' . $id_to . ')';
			$new_dialog = 1;
			mysqli_query($mysqli, $sql);
		}
		$dialog = findDialog($id_out, $id_to);

		if ($dialog->num_rows != 1)
		{
			$error = 10;
			return $error;
		}

		$record = mysqli_fetch_assoc($dialog);
		if ($record)
		{
			$id_dialog = $record['id'];
		}                
        if ($id_dialog == 0)
		{
			$error = 20;
			return $error;
		}

        $name_table_dialog =  "dialog";
		$sql = 'INSERT INTO `' . $name_table_dialog . '` (`id_out`, `id_to`, `id_dialog`, `message`) VALUES (' . $id_out . ', ' . $id_to . ', ' . $id_dialog . ', "' . $_POST['message'] .'" )';

		$add_message = mysqli_query($mysqli, $sql);
		header("Location: dialog.php?id_out=" . $record['id_out'] . "&id_to=" . $record['id_to'] . "");
	}
	closeBD($mysqli);
	return 0;
}
?>