<?php $title = 'Alaskian stories';?>

<body>
		<?php ob_start();?>

		<div class="titlesection">
	        <h1>New post</h1>    
	    </div>

        <div class='card'>
            <h2>Create post</h2>
                <form method="POST" action="index.php?action=createPost">
                    <input type="text" name="title"/>
                    <textarea name="content">Next, use our Get Started docs to setup Tiny!</textarea>
                    <input type="submit" value="Create"/>
                </form>
        </div>

	<?php $content = ob_get_clean();?>
	<?php require('view/frontend/template.php');?>

</body>
