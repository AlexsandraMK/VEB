<html>

<?php 
   session_start();
   include('headers.html');
   include('functions_with_users.php');
   include('top_polosa.php');

   $id=0;
   if(!empty($_GET['id']))
        $id = $_GET['id'];
   ?>
<body>

    <header>
        <?php include ('top.php'); ?>


        <div class="menu">
            <div class="container">
                <div class="row">
                     <?php include ('all_users.php'); ?>
                    <div class="col-md-9 col-sm-8 col-xs-6 column-right">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="menu-title">Меню</span>
                        </button>
                        <div class="navbar-collapse collapse" id="myNavbar">
                            <ul class="menubar js-menubar">
                                    <?php 
                                    if (isset($_SESSION['user']) && $_SESSION['user'] != 0)
                                    {
                                            home($_SESSION['user']);
                                            dialogs($_SESSION['user']);
                                    }
                                        
                                    ?>
                            </ul>
                        </div>
                    </div>
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
                        <div class="home_img">
                            <div class="home_text">
                                <?php 
                                writeUser(findUserById($id));
                                if(isset($_SESSION['user']) && $_SESSION['user'] != 0 && $id != 0)
                                {
                                   
                                    echo "<br><br><br><br>";
                                    if ( $id != $_SESSION['user'] ) 
                                    { 
                                        echo '<a href="dialog.php?id_to=' . $id . '&id_out=' . $_SESSION['user'] . '"> Перейти к диалогу </a> ';
                                    }
                                }
                                else
                                {
                                    echo "<br><br><br><br>";
                                    echo '<a href="index.php"> Войти в систему </a>'; 
                                }
?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include('footer.html');  ?>
</body>
</html>