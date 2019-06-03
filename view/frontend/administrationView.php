<?php $title = 'Alaskian stories'; ?>

<body>
    <?php ob_start(); ?>
	
	<div class='card'>
                <h2>Edit posts</h2>
                
                <?php

                $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

                $req = $db->query('SELECT id, title, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date');
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Creation date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = $req->fetch())
                        {
                            ?>
                            <tr>
                                <td><?php echo $data['title']; ?></td>
                                <td><em><?php echo $data['creation_date_fr']; ?></em></td>
                                <td>
                                    <a class="btn" href="index.php?action=updatePostView&id=<?= $data['id'] ?>">Modify post</a>
                                </td>
                                <td>
                                    <a class="btn" href="index.php?action=deletePost&id=<?= $data['id'] ?>">Delete post</a>
                                </td>
                            </tr>
                            <?php
                        }

                        $req->closeCursor();

                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <a class="btn" href="index.php?action=createPostView">Create post</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
        </div>

                <div class='card'>
                    <h2>Moderate comments</h2>
                    <?php
                    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
                    $req2 = $db->query('SELECT id, post_id, author, comment, comment_date, nb_report FROM comments WHERE nb_report > 0');
                    ?>
                    <table>
                        <tr>
                            <th>Author</th>
                            <th>Post id</th>
                            <th>Date</th>
                            <th>Report count</th>
                        </tr>
                        <?php
                        while ($data = $req2->fetch())
                        {
                            ?>
                            <tr>
                                <td><?php echo $data['author']; ?></td>
                                <td><?php echo $data['post_id']; ?></td>
                                <td><?php echo $data['comment_date']; ?></td>
                                <td><?php echo $data['nb_report']; ?></td>
                                <td>
                                    <a class="btn" href="index.php?action=validateComment&id=<?= $data['id'] ?>">Validate comment</a>
                                </td>
                                <td>
                                    <a class="btn" href="index.php?action=deleteComment&id=<?= $data['id'] ?>">Delete comment</a>
                                </td>
                            </tr>
                            <?php
                        }
                        $req2->closeCursor();
                        ?>
                    </table>
                </div>

                <?php $content = ob_get_clean(); ?>
				<?php require('view/frontend/template.php'); ?>

            </body>