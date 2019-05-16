<?php

require_once("model/connectManager.php");

class CommentManager extends Manager

{

	//Recover all comments
    public function getComments($postId)
    {
        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, nb_report FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    //Recover one comment
    public function getComment($commentId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, nb_report FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }

	//Add comment
 	public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }

    //Delete comment
    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $affectedLines = $req->execute(array($commentId));
        
        return $affectedLines;
    }

    //Report comment
    public function reportComment($commentId, $nbReport)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET nb_report = ? WHERE id=?');
        $affectedComment = $req->execute(array($nbReport, $commentId));

        return $affectedComment;
    }

    //Validate comment
    public function validateComment($commentId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE comments SET nb_report = 0 WHERE id=?');
        $affectedLines = $req->execute(array($commentId));
        
        return $affectedLines;
    }
   
}