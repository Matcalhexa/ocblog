<?php $title = 'Alaskian stories';?>

    <body>
    
    <?php ob_start(); ?>

    <!-- start left column here-->

        <section class="top">

            <div class="titleblog">
                <h1>Alaskian stories</h1>
            </div>
               
            <div class="titlesection">
                <h2>The latest posts from Alaska</h2>       
            </div>

        </section>

            <?php
            while ($data = $posts->fetch())
            {
            ?>

                <article class="card">
                                    
                    <h3><?php echo htmlspecialchars($data['title']); ?></h3>
                    <h5><em>le <?php echo $data['creation_date_fr']; ?></em></h5>
                        <div><img width=200px src="public/images/logo.png"/></div><br />         
                        <div class="chapter">
                            <?php
                                echo nl2br($data['content']);
                            ?>
                        </div>
                    <a class="link" href="index.php?action=post&id=<?= $data['id'] ?>">Comments</a>
                        
                </article>
                           
            <?php
            }
            $posts->closeCursor();
            ?>
            <?php $content = ob_get_clean(); ?>

            <?php require('view/frontend/template.php'); ?>

    </body>
 