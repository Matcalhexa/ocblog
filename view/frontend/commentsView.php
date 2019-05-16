<?php $title = 'Alaskian stories'; ?>

    <body>
    
    <?php ob_start(); ?>

    	 <article class="card">
            <h3><?= htmlspecialchars($post['title']) ?></h3>
            <h6><em>le <?= $post['creation_date_fr'] ?></em></h6>
			<div class="image"><img src="public/images/draw.png"/></div><br />
			<div class="chapter">
                <?= nl2br($post['content']) ?>
            </div>    
        </article>

		<h2>New comment</h2><br/>

            <form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
                <div>
                    <label for="author">Author</label><br />
                    <input type="text" id="author" name="author" />
                </div>
                <div>
                    <label for="comment">Comment</label><br />
                    <textarea type="text" id="comment" name="comment"></textarea>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>

        <h2>Posted comments</h2>

            <?php
            while ($comment = $comments->fetch())
            {
                ?>
                <p class="comAuthor"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                <p><?= $comment['nb_report'] > 0 ? ($comment['comment']) .'<p><small><em>*This comment has been reported '. ($comment['nb_report']) .' times*</em></small></p>' : ($comment['comment']) ?></p>

                    <form method="POST" action="index.php?action=reportComment">
                    <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>"/>
                    <input type="submit" name="report" value="Report comment"/>
                    </form>

                    <?php
                }
                ?>

    <?php $content = ob_get_clean(); ?>
	<?php require('view/frontend/template.php'); ?>

    </body>

