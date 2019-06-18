<?php
session_start();
error_reporting(E_ALL);

require_once('model/postManager.php');
require_once('model/commentManager.php');
require_once('model/userManager.php');

function isUser() {
    return isset($_SESSION['username']) AND isset($_SESSION['role']);
}

function isAdmin() {
    return isUser() AND $_SESSION['role'] == "Admin";
}

//Navigation fonction
function home()
{
    $postManager = new postManager();// Création d'un objet
    $posts = $postManager->getRecentsPosts();// Appel d'une fonction de cet objet

    require('view/frontend/indexView.php');//demande d'affichage de la vue
}

function about()
{
    require('view/frontend/aboutView.php');
}

function register()
{
    require('view/frontend/registerView.php');
}

function connect()
{
    require('view/frontend/connectionView.php');
}

function disconnect()
{
    require('view/frontend/disconnectView.php');
}

function administration()
{
    if(isAdmin()){
        require('view/frontend/administrationView.php');
    }
    else{
        $error= "Access denied";
        require('view/frontend/connectionView.php');
    }
}

function getPosts()
{
    $postManager = new postManager();
    $posts = $postManager->getPosts();

    require('view/frontend/postsView.php');
}

function getPost($postId)
{
    $postManager = new postManager();
    $commentManager = new commentManager();

    $post = $postManager->getPost($postId);
    $comments = $commentManager->getComments($postId);

    require('view/frontend/commentsView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new commentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);
    if($affectedLines === false){
    throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else{
        header('Location:index.php?action=post&id=' . $postId); exit;
    }
}

function reportComment($commentId)
{
    $commentManager = new commentManager();
    $comment = $commentManager->getComment($commentId);
    $nbReport = $comment['nb_report'];
    $nbReport++;
    $postId = $comment['post_id'];
    $affectedComment = $commentManager->reportComment($commentId, $nbReport);
    if($affectedComment === false){
    throw new Exception('Impossible de reporter le commentaire !');
    }
    else{
        header('Location:index.php?action=post&id=' . $postId); exit;
    }
}

function login($username, $password)
{
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
    $error = "";
    $userManager = new userManager();
    $user = $userManager->getUser($username);

    if(isset($user['id'])){
        if(password_verify($password, $user['password'])){
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            if($user['role'] == 'User'){
                header("Location:index.php");
                exit;
            }
            elseif($user['role'] == 'Admin'){
                header("Location:index.php?action=administration");
                exit;
            }
        }
        else
        {
            $error = "Wrong password.";
        }
    }
    else
    {
        $error = "This user doesn't exists";
    }
    require('view/frontend/connectionView.php');
}

function signup($username, $password, $passwordConfirm, $email, $emailConfirm)
{
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
    $passwordConfirm = htmlspecialchars($passwordConfirm);
    $email = htmlspecialchars($email);
    $emailConfirm = htmlspecialchars($emailConfirm);

    $error = "";

    if(
        empty($_POST["username"]) or
        empty($_POST["password"]) or
        empty($_POST["passwordconfirm"]) or
        empty($_POST["email"]) or
        empty($_POST["emailconfirm"])
    ){
        $error = "*All fields must be completed.*";
    }
    else{
        if($_POST["email"] != $_POST["emailconfirm"]){
            $error = "*Your email addresses do not match*";
        }
        elseif($_POST["password"] != $_POST["passwordconfirm"]){
            $error =  "*Your passwords do not match*";
        }
        elseif(strlen($_POST["username"]) > 255){
            $error = "*Your username must not exceed 255 characters*";
        }
        elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $error = "*Your email adress is invalid*";
        }
    }

    $userManager = new userManager();

    if(empty($error))
    {
        $userByEmail = $userManager->getUserByEmail($email);
        $userByUsername = $userManager->getUserByUsername($username);
        if(isset($userByEmail['id'])){
            $error = "*Email address already used*";
        }
        elseif(isset($userByUsername['id'])){
            $error = "Username already used";
        }
        else
        {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $createdUser = $userManager->createUser($username, $hashedPassword, $email);
            if(!isset($createUser['id'])){
                session_destroy();
                header("Location:index.php?action=connect"); exit;
            }
            else{
                $error = "Error while creating your account. Please retry";
            }
        }
    }
    require('view/frontend/registerView.php');
}

