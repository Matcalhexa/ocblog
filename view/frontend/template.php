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
    	<div class="leftcolumn">

            <div class="header">
                <nav class="globalmenu">                   
                        <ul id="navigation_menu">
                            <li><a href="index.php?action=about">About</a></li>
                            <li><a href="index.php?action=listPosts">Posts</a></li>
                            <li><a href="index.php">Home</a></li>
                        </ul>
                </nav>
            </div>

        <?= $content ?>

        	<br /><br />
        	<div class="footer">                 
                <a href="index.php?action=adminconnect">Administration</a>
                <a href="index.php?action=register">Register</a>
                <a href="index.php?action=connect">Connect</a>
            </div>

    	</div>
    </body>
</html>