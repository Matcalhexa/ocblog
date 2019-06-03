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

    <nav class="topmenu" id="topmenu">
        <div class="welcomemsg"><?= isset($_SESSION['username']) ? 'WELCOME <strong>' . $_SESSION['username'] . '</strong>' : '' ?></div>
        
        <ul class="navmenu">
            <li><a class="btn" href="index.php?action=connect">Connect</a></li>
            <li><a class="btn" href="index.php?action=disconnect">Disconnect</a></li>
            <li class="register"><a href="index.php?action=register">Register</a></li>
            <li class="navlink"><a href="index.php?action=about">About</a></li>
            <li class="navlink"><a href="index.php?action=listPosts">Posts</a></li>
            <li class="navlink"><a href="index.php">Home</a></li>
        </ul> 
    </nav>


    <?= $content ?>

    <nav class="botmenu" id="botmenu"> 

       <ul class="footer">  
        <li><a class="btn" href="index.php?action=connect">Connect</a></li>
        <li><a class="btn" href="index.php?action=disconnect">Disconnect</a></li>               
        <li class="register"><a href="index.php?action=register">Register</a></li>
        <?php
        if(isset($_SESSION['username']) AND isset($_SESSION['role']) AND $_SESSION['role']=="Admin"){ 
            ?>
        <li class="navlink"><a href="index.php?action=administration">Administration</a></li>
        <?php
        }
        else{
            ?>
            <li class="navlink"><a href="index.php?action=connect">Administration</a></li>
            <?php
        }
        ?>
    </ul>
</nav>
</div>
</body>
</html>