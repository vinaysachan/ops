<?php
//print_r($this->blogData);
?>

<div class="blog-list-wrapper">
    <div class="blog-list-line"></div>
    <span class="blog-bullet"></span>
    <?php
    if (!empty($this->blogData)) {
	$blogData = $this->blogData[0];
	?>
        <article>
    	<div class="blog-date"><?= date('F d, Y', strtotime($blogData['date_created'])) ?></div>
    	<div class="blog-auth">by : <?= $blogData['writer_name'] ?> </div>
    	<div class="blog-cat">in : <?= $blogData['cat_name'] ?></div>
    	<div class="blog-comments"><?= (int) $blogData['commnets_count'] ?> Comments</div>
    	<div class="blog-container">
    	    <h2><a href="#"><?= $blogData['name'] ?></a></h2>
    	    <div class="bbline"></div>
    	    <div class="blog-content">
		    <?php
		    echo '<div class="blog-img"><img class="img-responsive" src="' . URL . BLOG_IMG_PATH . $blogData['images'] . '" /></div><div class="mt10">' . $blogData['content'] . '</div>';
		    ?>
    	    </div>
    	</div>
    	<div class="clearfix"></div>
        </article>
    <?php } ?>
</div>