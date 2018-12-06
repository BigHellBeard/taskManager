<div class=<?= $class ?>>
<?php 
//инициализация цикла вывода пунктов меню
foreach (mainMenuSort($array, $key = 'sort', $sort) as list('path' => $linkPath, 'title' => $linkName)) :
	$active = isActive($linkPath, $_SERVER['REQUEST_URI']);
?>
	<a class="<?= activeLinkClass($active)?>" href="<?= $linkPath?>"><?= mainMenuTitleCut($linkName) ?></a>
<?php endforeach; ?> 
</div>