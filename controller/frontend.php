<?php

require_once('model/postManager.php');
require_once('model/commentManager.php');

//Navigation fonction
function home()
{
    $postManager = new postManager(); // Création d'un objet
    $posts = $postManager->getRecentsPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/indexView.php'); //demande d'affichage de la vue
}

function about()
{
    require('view/frontend/aboutView.php');
}

function administration()
{
    require('view/frontend/administrationView.php');
}

function adminconnect()
{
    require('view/frontend/adminConnectView.php');
}

function register()
{
    require('view/frontend/registerView.php');
}

function connect()
{
    require('view/frontend/connectionView.php');
}

//Get all posts
function getPosts()
{
    $postManager = new postManager();
    $posts = $postManager->getPosts();

    require('view/frontend/postsView.php');
}

//Get one post
function getPost($postId)
{
    $postManager = new postManager();
    $commentManager = new commentManager();

    $post = $postManager->getPost($postId);
    $comments = $commentManager->getComments($postId);

    require('view/frontend/commentsView.php');
}

//Add comments
function addComment($postId, $author, $comment)
{
    $commentManager = new commentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}