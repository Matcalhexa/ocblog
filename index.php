<?php

require('controller/frontend.php');
require('controller/backend.php');

//Navigation
 if (isset($_GET['action'])) {
        if ($_GET['action'] == 'home') {
            home();
        }
        elseif($_GET['action'] == 'about') {
            about();
        }

        elseif ($_GET['action'] == 'listPosts') {
            getPosts();
        }

        elseif($_GET['action'] == 'register') {
            register();
        }

        elseif($_GET['action'] == 'connect') {
            connect();
        }

        elseif($_GET['action'] == 'administration') {
            administration();
        }

        elseif($_GET['action'] == 'login') {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                login($_POST['username'], $_POST['password']);
            }
            else {
                echo 'Error : All fields must be completed.';
            } 
        }

        elseif($_GET['action'] == 'signup') {
            if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['passwordconfirm']) && !empty($_POST['email']) && !empty($_POST['emailconfirm'])) {
                signup($_POST['username'], $_POST['password'], $_POST['passwordconfirm'], $_POST['email'], $_POST['emailconfirm']);
            }
            else {
                echo 'Error : All fields must be completed.';
            } 
        }

        elseif($_GET['action'] == 'disconnect') {
            disconnect();
        }

        elseif ($_GET['action'] == 'createPostView') {
            createPostView();
        }

        elseif ($_GET['action'] == 'updatePostView') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatePostView($_GET['id']);
            }
            else {
                echo 'Error : no ticket ID sent.';
            }
        }

        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                getPost($_GET['id']);
            }
            else {
                echo 'Error : no ticket ID sent.';
            }
        }

        //Add comment
        elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Error : All fields must be completed.';
            }
        }
        else {
            echo 'Error : no ticket ID sent.';
        }
    }

        //Delete comment
        elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
            deleteComment($_GET['id']);
        }
    }

        //Report comment
        elseif ($_GET['action'] == 'reportComment') {
            if (isset($_POST['comment_id']) && $_POST['comment_id'] > 0) {
            reportComment($_POST['comment_id']);
        }
    }

        //Validate comment
        elseif ($_GET['action'] == 'validateComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
            validateComment($_GET['id']);
        }
    }

        //Create post
        elseif ($_GET['action'] == 'createPost') {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                createPost($_POST['title'], $_POST['content']);
            }
            else {
                echo 'Error : All fields must be completed.';
            } 
        }

        //Edit post
         elseif ($_GET['action'] == 'updatePost') { 
            if (!empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['content'])) {
                updatePost($_POST['id'],$_POST['title'], $_POST['content']);
            }
            else {
                echo 'Error : All fields must be completed.';
            } 
        }

        //Delete post
        elseif ($_GET['action'] == 'deletePost') {
           if (isset($_GET['id']) && $_GET['id'] > 0) {
            deletePost($_GET['id']);
        }
    }
}
	else {
	    home();
	}