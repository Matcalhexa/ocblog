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