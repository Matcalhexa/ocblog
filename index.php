<?php

require('controller/frontend.php');
require('controller/backend.php');

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

        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                getPost($_GET['id']);
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
    }  
	else {
	    home();
	}