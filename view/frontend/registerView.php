<?php

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$error = isFormValid($db);

if (empty($error)) {
    $hashedPassword= password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $insertmembre = $db->prepare('INSERT INTO membres(username, password, email, role) VALUES (?, ?, ?, "User")');
    $insertmembre->execute(array(htmlspecialchars($_POST['username']), $hashedPassword, htmlspecialchars($_POST['email'])));
    $error = "Your account has been created!<a href=\"index.php?action=connect\">Connect</a>";
}

function isFormValid($db)
{
    $error = "";

    if (
        empty($_POST["username"]) or
        empty($_POST["password"]) or
        empty($_POST["passwordconfirm"]) or
        empty($_POST["email"]) or
        empty($_POST["emailconfirm"])
    ) {
        $error = "All fields must be completed.";
    } else {
        if ($_POST["email"] != $_POST["emailconfirm"]) {
            $error = "Your email addresses do not match";
        } elseif ($_POST["password"] != $_POST["passwordconfirm"]) {
            $error =  "Your passwords do not match";
        } elseif (strlen($_POST["username"]) > 255) {
            $error = "Your username must not exceed 255 characters";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error = "Your email adress is invalid";
        } else {
            $reqemail = $db->prepare('SELECT * FROM membres WHERE email = ?');
            $reqemail->execute(array($_POST["email"]));
            $emailexist = $reqemail->rowCount();
            if ($emailexist > 0) {
                $error = "Email address already used";
            }
        }
    }

    return $error;
}
?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Register</title>
</head>
<body>
    <div align="center">
        <h2>Register</h2>
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
                        <input type="submit" name="formregister" value="Register" />
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($error)) {
            echo '<font color="red">' . $error . "</font>";
        }
        ?>
    </div>
</body>
</html>