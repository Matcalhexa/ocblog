<?php

require_once('model/postManager.php');
require_once('model/commentManager.php');

//Delete comment
function deleteComment($commentId)
{
    $commentManager = new commentManager();
    $affectedLines = $commentManager->deleteComment($commentId);

    if ($affectedlines === false) {
        throw new Exception('Impossible de supprimer le commentaire !');
    }
    else {
        header('Location: index.php?action=administration');
    }
}

//Validate comment
function validateComment($commentId)
{
    $commentManager = new commentManager();
    $affectedLines = $commentManager->validateComment($commentId);

    if ($affectedlines === false) {
        throw new Exception('Impossible de supprimer le commentaire !');
    }
    else {
        header('Location: index.php?action=administration');
    }
}

//Delete post
function deletePost($postId)
{
    $postManager = new postManager();
    $affectedPost = $postManager->deletePost($postId);

    if ($affectedPost === false) {
        throw new Exception('Impossible de supprimer le post !');
    }
    else {
        header('Location: index.php?action=administration');
    }
}

//Create post
function createPost($title, $content)
{
    $postManager = new postManager();
    $affectedLines = $postManager->createPost($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le post !');
    }
    else {
        header('Location: index.php?action=administration');
    }
}

function createPostView() {

    require('view/frontend/createPostView.php');
}

//Edit post
function updatePost($postId, $title, $content)
{
    $postManager = new postManager();
    $affectedPost = $postManager->updatePost($postId, $title, $content);

    if ($affectedPost === false) {
        throw new Exception('Impossible d\'editer le post !');
    }
    else {
        header('Location: index.php?action=administration');
    }
}

function updatePostView($postId) {

    $postManager = new postManager();
    $post = $postManager->getPost($postId);

    require('view/frontend/updatePostView.php');
}