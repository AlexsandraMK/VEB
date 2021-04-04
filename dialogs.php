<html>

<?php 
   session_start();
   include('headers.html');
   include ('functions_with_users.php');
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
                    <div class="col-md-9 col-sm-8 col-xs-6 column-right" style="width:inherit">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="menu-title">Меню</span>
                        </button>
                        <div class="navbar-collapse collapse" id="myNavbar" style="width:inherit">
                            <ul class="menubar js-menubar" style="text-align:right" style="width:inherit">
                                
                                    <?php 

                                    if (isset($_SESSION['user']) && $_SESSION['user'] != 0)
                                    {
                                        if($id == $_SESSION['user']) user($_SESSION['user']);
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
                <div class="col-md-9 col-sm-12 col-xs-12" style="width:100%">
                    <div class="row top-row" style=" overflow: hidden;">
                        <div style="background-image: url(img/Sasha.jpg); width:inherit; height:inherit; background-size:cover;">
                        <div class="dialogs">
                            <ul>
                            <?php
                                if(isset($_SESSION['user']))
                                    if($id == $_SESSION['user'])
                                        writeAllDialogs(findAllDialogs($id));
                            ?>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include('footer.html');  ?>
</body>
</html>