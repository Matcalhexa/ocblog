<html>
<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <link href="public/css/blogstyle.css" rel="stylesheet" />
</head>
<body>

    <nav class="topmenu" id="topmenu">

        <div class="welcomemsg"><?= isset($_SESSION['username']) ? 'WELCOME <strong>' . $_SESSION['username'] . '</strong>' : '' ?></div>
        
        <ul class="navmenu">
            <li><a class="btn" href="index.php?action=connect">Connect</a></li>
            <li><a class="btn" href="index.php?action=disconnect">Disconnect</a></li>
            <li class="navlink"><a href="index.php?action=about">About</a></li>
            <li class="navlink"><a href="index.php?action=listPosts">Posts</a></li>
            <li class="navlink"><a href="index.php">Home</a></li>
        </ul>
    </nav>

    <p><?= isset($error) ? $error : "" ?></p>
    <div align="center">
        <h2>Register</h2>
        <br /><br />
        <form action="index.php?action=signup" method="POST">
            <table>
                <tr>
                    <td align="right">
                        <label for="username">Username:</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Your username" name="username">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="password">Password:</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Your password" name="password">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="passwordconfirm">Password confirmation:</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Confirm your password" name="passwordconfirm">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="email">Email:</label>
                    </td>
                    <td>
                        <input type="email" placeholder="@" name="email">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="emailconfirm">Email confirmation:</label>
                    </td>
                    <td>
                        <input type="email" placeholder="confirm @" id="emailconfirm" name="emailconfirm">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <br />
                        <input class="btn" type="submit" name="formregister" value="Register" />
                    </td>
                </tr>
            </table>
        </form>

        <div class="error">
            <?php
            if(isset($error)){
                echo '<font color="#cc00ff">' . $error . "</font>";
            }
            ?>
        </div>
    </div>

</body>
</html>