<html>
<header>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
</header>
<?php 
   session_start();
   include('headers.html');
   include('functions_with_users.php');
   include('top_polosa.php');

   $id=0;
   $id_to=0;
   if(!empty($_GET['id_out']) && !empty($_GET['id_to']))
   {
      $id = $_GET['id_out'];
      $id_to = $_GET['id_to'];
      if ($_SESSION['user'] == $id)
      sendMessage($id, $id_to);

   }

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
                                        if($id == $_SESSION['user'])
                                        {
                                            user($_SESSION['user']);
                                            if($id_to != 0) user($id_to);
                                        }
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
                    <div class="row top-row" style=" overflow: hidden;  margin-bottom:0px;">
                        <div style="background-image: url(img/Sasha.jpg); width:inherit; height:inherit; background-size:cover;">
                        <div class="dialog">
                            <ul>
                            <?php
                                if(isset($_SESSION['user']))
                                    if($id == $_SESSION['user'] && $id_to != 0)
                                        writeDialog(findAllMessages($id, $id_to));
                            ?>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12" style="width:100%">
                    <div class="row top-row" style=" overflow: hidden; margin-top: 0px;">
                        <div style="background-image: url(img/Sasha.jpg); width:inherit; height:inherit; background-size:cover;">
                        <div class="message">
                            <form method="POST" >
                                <div class="label label-1">Написать сообщение</div>
                                <br><br>
                                <textarea style="padding: 5 0 100px 0; min-width:350px; min-height: 100px"  name="message"></textarea><br><br>
                                <input type="submit" value="Отправить" name="send" />
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include('footer.html');  ?>
</body>
</html>