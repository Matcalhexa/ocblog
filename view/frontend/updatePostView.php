<?php $title = 'Alaskian stories';?>

	<body>
		<?php ob_start();?>

        <div class="btn">
            <a href="index.php?action=administration">Return to administration page >></a>
        </div>

		<div class="titlesection">
	        <h1>Edit post</h1>
	    </div>

       <div class='card'>
            <h2>Edit post</h2>
                <form method="POST" action="index.php?action=updatePost">
                    <input type="hidden" name="id" value="<?= $post['id'] ?>">
                    <input type="text" name="title" value="<?= $post['title'] ?>" />
                    <textarea name="content"><?= $post['content'] ?></textarea>
                    <input type="submit" value="Update"/>
                </form>
        </div>

	<?php $content = ob_get_clean();?>
	<?php require('view/frontend/template.php');?>

    </body>