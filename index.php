<?php
    error_reporting(-1);
    ini_set('display_errors',1);
    header('Content-Type: text/html; charset=utf-8');

    $page = 'home';
    include('./includes/list_of_users.php');
?>
<!DOCTYPE html> 
<html>
        <head>
            <title>DB test task</title>
            <link rel="stylesheet" type='text/css' href="./style.css" />
        </head>
        <body>
            <header>
                    Show users:
                    <ul>
                        <li class="<?php if($page=='users'){echo 'active';} ?>"><a href="/php-test-task/list_of_users.php">Users</a></li> 
                        <li class="<?php if($page=='home'){echo 'active';} ?>"><a href="/php-test-task/">Home</a></li>
                    </ul>
            </header> 
            
        </body>
</html>