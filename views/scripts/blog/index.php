<div class="blog-list-wrapper"> 
    <div class="blog-list-line"></div>
    <span class="blog-bullet"></span>
    <?php
    if (!empty($this->blogList)) {
	foreach ($this->blogList as $blogData) {
	    ?>
	    <article>
		<div class="blog-date"><?= date('F d, Y', strtotime($blogData['date_created'])) ?></div>
		<div class="blog-auth">by : <?= $blogData['writer_name'] ?> </div>
		<div class="blog-cat">in : <?= $blogData['cat_name'] ?></div>
		<div class="blog-comments"><?= (int) $blogData['commnets_count'] ?> Comments</div>
		<div class="blog-container">
		    <?php
		    if (!empty($blogData['images'])) {
			echo '<div class="blog-thumb"><img src="' . URL . BLOG_IMG_PATH . $blogData['images'] . '" /></div>';
			echo '<h2><a title=' . $blogData['name'] . ' href="' . URL . 'blog/view/' . $blogData['id'] . '/' . $blogData['url'] . '">' . $blogData['name'] . '</a></h2><div class="bbline"></div>';
			echo '<div class="blog-content">' . $blogData['blog_intro'] . '</div>';
			echo '<div class="readmore pull-right"><a href="' . URL . 'blog/view/' . $blogData['id'] . '/' . $blogData['url'] . '">Read more »</a></div>';
		    }
		    ?>
		</div>
		<div class="clearfix"></div>
	    </article> 
	    <?php
	}
    }
    echo $this->pagination;
    ?>
</div>