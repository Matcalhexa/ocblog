<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

if(isset($_POST['formconnect']))
{
    $user = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['password']);
    $hashedPassword = password_hash(htmlspecialchars($pass), PASSWORD_DEFAULT);
    if(!empty($user) AND !empty($hashedPassword))
    {

        $requser = $db->prepare('SELECT * FROM membres WHERE  username = ? AND password = ?');
        $requser->execute(array($user, $hashedPassword));
        $isPasswordCorrect = password_verify($_POST['password'], $hashedPassword);
        if($isPasswordCorrect)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['username'] = $userinfo['username'];
            $_SESSION['email'] = $userinfo['email'];
            header("Location: index.php");
        }
        else
        {
            $erreur = "Wrong email or password";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés";
    }
}
?>



<html>
<head>
    <meta charset="utf-8" />
    <title>Connection</title>
    <link href="public/css/blogstyle.css" rel="stylesheet" /> 
</head>

<body>
    <div align="center">
        <h2>Connection</h2>
        <br /><br />
        <form action="" method="POST">
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
                    <td></td>
                    <td>
                        <br />
                        <input type="submit" name="formconnect" value="Connect" />
                    </td>
                </tr>
            </table>
        </form>