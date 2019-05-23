<?php session_start(); ?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/blogstyle.css" rel="stylesheet" /> 
        <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        
    </head>
        
    <body>

    <nav class="topmenu"> 

        <div class="welcomemsg"><?= isset($_SESSION['username']) ? 'Welcome <strong>' . $_SESSION['username'] . '</strong>' : '' ?></div>
        
                <div class="connectbtn">
                    <a class="btn" href="index.php?action=connect">Connect</a>
                    <a class="btn" href="index.php?action=disconnect">Disconnect</a>
                </div>     

                <div class="navmenu">
                    <a href="index.php">Home</a></li>
                    <a href="index.php?action=listPosts">Posts</a></li>
                    <a href="index.php?action=about">About</a></li>
                </div>
    </nav>
            

        <?= $content ?>

        	<div class="footer">                 
                <a class="adminNav" href="index.php?action=adminconnect">Administration</a>
                <a class="adminNav" href="index.php?action=register">Register</a>
                <a class="btn" href="index.php?action=connect">Connect</a>
                <a class="btn" href="index.php?action=disconnect">Disconnect</a>
            </div>

    	</div>
    </body>
</html>