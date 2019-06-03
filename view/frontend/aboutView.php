<?php $title = 'Alaskian stories'; ?>

<body>

	<?php ob_start(); ?>

	 	<div class="biography-extend">
            <div class="card">
                <h1>Jean Forteroche</h1>
                <div class="image"><img src="public/images/jeanf2.jpg" width=200px /></div>

                 <div class="chapter">
                 <p> Victus universis caro ferina est lactisque abundans copia qua sustentantur, et herbae multiplices et siquae alites capi per aucupium possint, et plerosque mos vidimus frumenti usum et vini penitus ignorantes.</p>

<p>Post haec indumentum regale quaerebatur et ministris fucandae purpurae tortis confessisque pectoralem tuniculam sine manicis textam, Maras nomine quidam inductus est ut appellant Christiani diaconus, cuius prolatae litterae scriptae Graeco sermone ad Tyrii textrini praepositum celerari speciem perurgebant quam autem non indicabant denique etiam idem ad usque discrimen vitae vexatus nihil fateri conpulsus est.</p>

<p>Iam virtutem ex consuetudine vitae sermonisque nostri interpretemur nec eam, ut quidam docti, verborum magnificentia metiamur virosque bonos eos, qui habentur, numeremus, Paulos, Catones, Galos, Scipiones, Philos; his communis vita contenta est; eos autem omittamus, qui omnino nusquam reperiuntur.</p>
                </div>
            </div>
        </div>

    <?php $content = ob_get_clean(); ?>
	<?php require('view/frontend/template.php'); ?>

</body>