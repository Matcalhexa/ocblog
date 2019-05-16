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

        elseif($_GET['action'] == 'login') {
            login();
        }

        elseif($_GET['action'] == 'administration') {
            administration();
        }

        elseif($_GET['action'] == 'adminconnect') {
            adminconnect();
        }

        elseif($_GET['action'] == 'register') {
            register();
        }

        elseif($_GET['action'] == 'connect') {
            connect();
        }

        elseif ($_GET['action'] == 'createPostView') {
            createPostView();
        }

        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                getPost($_GET['id']);
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }

        //Add comment
        elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
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

       
        elseif ($_GET['action'] == 'createPost') {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                createPost($_POST['title'], $_POST['content']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            } 
        }

        //Edit post
        elseif ($_GET['action'] == 'updatePostView') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatePostView($_GET['id']);
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
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