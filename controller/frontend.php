<?php

require_once('model/postManager.php');
require_once('model/commentManager.php');

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

function login()
{
    require('view/frontend/loginView.php');
}

function administration()
{
    require('view/frontend/administrationView.php');
}

function getPosts()
{
    $postManager = new postManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/postsView.php'); //demande d'affichage de la vue
}
