<html>

<?php
    include('headers.html');
    if(!isset($_SESSION['user']))
        $_SESSION['user']=0;
    $result=findAllUsersWithoutId($_SESSION['user']);
?>

<body>
    <div class="col-md-3 col-sm-4 col-xs-6 column-left">
        <aside id="column-left">
            <nav class="navbar-default">
                <div class="menu-heading js-nav-menu">пользователи</div>
                <div class="vertical-wrapper js-dropdown-menu js-dropdown-open active">
                    <ul class="level0">
                        <?php writeAllUsers($result); ?>
                    </ul>
                </div>
            </nav>
        </aside>
    </div>
</body>