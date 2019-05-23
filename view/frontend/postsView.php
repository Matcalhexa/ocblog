<?php $title = 'Alaskian stories'; ?>

	<body>
		<?php ob_start(); ?>

        <section class="top">

    		<div class="titlesection">
    	        <h1>Posts from Alaska</h1>   
                    <div class="titleimg"><img src="public/images/alaska2.jpg"/></div>     
    	    </div>

        </section>

            <?php
            while ($data = $posts->fetch())
            {
            ?>
                <article class="card">
                    <h3><?php echo htmlspecialchars($data['title']); ?></h3>
					<h6><em>le <?php echo $data['creation_date_fr']; ?></em></h6>
                    <div class="image"><img src="public/images/draw.png" /></div><br />
                    <div class="chapter">
                        <?php echo nl2br(htmlspecialchars($data['content']));?>
                    </div>
                    <br /><br />
                    <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a></em>
                 </article>

            <?php
            }
            $posts->closeCursor();
            ?>

	<?php $content = ob_get_clean(); ?>
	<?php require('view/frontend/template.php'); ?>

    </body>
