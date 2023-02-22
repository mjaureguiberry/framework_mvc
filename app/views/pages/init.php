<?php require_once(APP_PATH. "/views/inc/header.php"); ?>
<p><?php echo $viewData["sometext"];?></p>
<ul>
	<?php foreach($viewData["articles"] as $article): ?>
		<li> <?php echo $article["titulo"];?> </li>
	<?php endforeach; ?>
</ul>
<?php require_once(APP_PATH. "/views/inc/footer.php"); ?>


