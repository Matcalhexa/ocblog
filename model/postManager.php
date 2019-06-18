<?php

require_once("model/connectManager.php");

class PostManager extends Manager
{
	//Recover the last 3 post the most recent
	public function getRecentsPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 3');
		return $req;
	}

	//Recover all posts
	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date');
		return $req;
	}

	//Recover one post
	public function getPost($postId)
	{
	    $db = $this->dbConnect();
	    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
	    $req->execute(array($postId));
	    $post = $req->fetch();
	    return $post;
	}

	//Delete post
	public function deletePost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM posts WHERE id = ?');
		$affectedPost = $req->execute(array($postId));
        return $affectedPost;
	}

	//Create post
	public function createPost($title, $content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO posts(title, content) VALUES(?, ?)');
        $createdPost = $req->execute(array($title, $content));
        return $createdPost;
    }

    //Edit post
    public function updatePost($postId, $title, $content)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $affectedPost = $req->execute(array($title, $content, $postId));
        
        return $affectedPost;
    }
}

