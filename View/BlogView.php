<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/TestCNPM/Controller/BlogController.php';
	$controller = new BlogController();
	$result = $controller->BlogController();


?>

<div class="row wow fadeInUp">
    <?php 
        foreach ($result as $BlogItem):		
    ?>
    <div class="col-md-4 shadow">
        <img src="<?php echo $BlogItem['Image']; ?>" alt="">
        <h4><?php echo $BlogItem['Title']; ?></h4>
        <p class="date"><?php echo $BlogItem['DateOfWriting']; ?></p>
        <p><?php echo $BlogItem['Content']; ?></p>
    </div>
    <?php 
        endforeach;
    ?>
</div>