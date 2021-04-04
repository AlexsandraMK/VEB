<html>
<?php 
    include('headers.html');
    $error = include('registration_php.php');
?>

<body>
    <header>
        <?php include ('top.php'); ?>
        <div class="menu">
            <div class="container">
                <div class="row">
                    <?php include ('all_users.php'); ?>
                </div>
            </div>
        </div>
    </header>
    <!-- /header -->

        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="row top-row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form method="POST"  style="margin-top: 40px; font-size: 14px; color: black">
                                <div class="label label-1">Регистрация</div>
                                <br><br>
                                 
                                <?php if($error != "") { ?>
                                    <p style="color: red">
                                    <?php  echo $error;  ?>
                                    </p>
                                <?php   } ?>
                                Имя <br>
                                <input type="text" name="name" value="<?php echo (isset($_POST['name']))?$_POST['name']:'';?>"> <br>
                                Фамилия <br>
                                <input type="text" name="surname" value="<?php echo (isset($_POST['surname']))?$_POST['surname']:'';?>"> <br>
                                Логин <br>
                                <input type="text" name="login" value="<?php echo (isset($_POST['login']))?$_POST['login']:'';?>"> <br>
                                Пароль <br>
                                <input type="text" name="password" value="<?php echo (isset($_POST['password']))?$_POST['password']:'';?>"> <br> <br>
                                <input style="margin-left: 10px" type="submit" value="Зарегистрироваться" name="register">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include('footer.html');  ?>
</body>
</html>



            