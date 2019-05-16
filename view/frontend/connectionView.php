<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

if(!empty($_POST['username']) AND !empty($_POST['password']))
{
    $username = htmlspecialchars($_POST['username']);

    $request = $db->prepare('SELECT * FROM membres WHERE username = ?');
    $request->execute(array($username));

    $user = $request->fetch();

    if(isset($user['id'])) {
        if(password_verify(htmlspecialchars($_POST['password']), $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            if($user['role'] == 'User') {
                header("Location: index.php");
            }
            elseif ($user['role'] == 'Admin') {
                header("Location: index.php?action=administration");
            }
        }
        else
        {
            $erreur = "Wrong password.";
        }
    }
    else
    {
        $erreur = "This user doesn't exists";
    }
}
else
{
    $erreur = "Tous les champs doivent être complétés";
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
        <form action="index.php?action=connect" method="POST">
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
                    <td>
                        <br />
                        <input type="submit" value="Connect" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
