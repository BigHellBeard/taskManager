<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/templates/header.php');
?>
<div class="body-section">
	<h1><?= mainMenuActiveTitle($mainMenu, 'path', 'title', $_SERVER['REQUEST_URI']) ?></h1> 
</div>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/templates/footer.php');
?>