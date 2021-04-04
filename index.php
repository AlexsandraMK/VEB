<html>
<?php 
   session_start();
   include('headers.html');
   $error = include ('login_php.php');
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
                            <form method="POST" style="margin-top: 70px; font-size: 14px; color: black">
                                <div class="label label-1">Авторизация</div>
                                <br><br>
                               
                                <?php 
                                if($error != "")
                                {
                                ?>
                                    <p style="color: red">
                                    <?php
                                    echo $error;
                                    ?>
                                    </p>
                                    <?php
                                }    
                                ?>
                                Логин <br>
                                <input type="text" name="login"> <br>
                                Пароль <br>
                                <input type="text" name="password"> <br> <br>
                                <input type="submit" value="Войти" name="log_in" />
                                <input style="margin-left: 10px" type="submit" value="Зарегистрироваться" name="register" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include('footer.html');  ?>
</body>
</html>