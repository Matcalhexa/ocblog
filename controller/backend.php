<?php
require_once('model/postManager.php');
require_once('model/commentManager.php');

function deleteComment($commentId)
{
    if(isAdmin()){
    $commentManager = new commentManager();
    $affectedLines = $commentManager->deleteComment($commentId);
    if($affectedLines === false){
        throw new Exception('Could not delete comment');
    }
    else{
        header('Location:index.php?action=administration'); exit;
    }
}
else{
$error = "Access denied";
require('view/frontend/connectionView.php');
}
}

function validateComment($commentId)
{
    if(isAdmin()){
    $commentManager = new commentManager();
    $affectedLines = $commentManager->validateComment($commentId);

    if($affectedLines === false){
    throw new Exception('Could not validate comment');
    }
    else{
        header('Location:index.php?action=administration'); exit;
    }
    }
else{
$error = "Access denied";
require('view/frontend/connectionView.php');
}
}

function deletePost($postId)
{
    if(isAdmin()){
    $postManager = new postManager();
    $affectedPost = $postManager->deletePost($postId);

    if($affectedPost === false){
    throw new Exception('Could not delete post');
    }
    else{
    header('Location:index.php?action=administration'); exit;
    }
    }
else{
$error = "Access denied";
require('view/frontend/connectionView.php');
}
}

function createPost($title, $content)
{
    if(isAdmin()){
    $postManager = new postManager();
    $affectedLines = $postManager->createPost($title, $content);

    if($affectedLines === false){
    throw new Exception('Could not create post');
    }
    else{
        header('Location:index.php?action=administration'); exit;
    }
    }
else{
$error = "Access denied";
require('view/frontend/connectionView.php');
}
}


function createPostView()
{
    require('view/frontend/createPostView.php');
}

//Edit post
function updatePost($postId, $title, $content)
{
    if(isAdmin()){
    $postManager = new postManager();
    $affectedPost = $postManager->updatePost($postId, $title, $content);

    if($affectedPost === false){
        throw new Exception('Could not edit post');
    }
    else{
        header('Location:index.php?action=administration'); exit;
    }
    }
else{
$error = "Access denied";
require('view/frontend/connectionView.php');
}
}

function updatePostView($postId)
{
    $postManager = new postManager();
    $post = $postManager->getPost($postId);
    require('view/frontend/updatePostView.php');
}