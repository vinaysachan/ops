<!DOCTYPE html>
<html lang="en">
    <head> 
	<?php
	//====> Page Meta tags
	if (!empty($this->metaTags)) {
	    echo Util::metatags($this->metaTags);
	}
	//====> Page title
	echo '<title>' . (empty($this->title) ? SITENAME : $this->title) . '</title>';
	?>
        <link rel="shortcut icon" href="<?= URL ?>public/images/onlinephpstudy.png"/>
	<?php
	//====> Page CSS
	if (!empty($this->css)) {
	    echo Util::cssList($this->css);
	}
	//====> Page JS
	if (!empty($this->js)) {
	    echo Util::jsList($this->js);
	}
	?>
        <script> jQuery(document).ready(function () {
                Main.init();
            });
        </script>
    </head>
    <body><?php include_once("views/layouts/analyticstracking.php") ?>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
		    <button class="navbar-toggle-btn pull-left" data-toggle="offcanvas" type="button">Left Menu <i class="fa fa-indent"></i>
                    </button>
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle-btn collapsed pull-right" type="button">
                        <i class="fa fa-outdent"></i>
                        Top Menu
                    </button>
                </div>
                <div class="navbar-collapse collapse">
		    <?php
		    $allLinks = Navigation::MainHeaderMenu();
		    /* Active Link */
		    $active = (empty($this->hactive)) ? '' : $this->hactive;
		    $this->menuCreator($allLinks, $menuType = 'frontPageMenu', $active);
		    ?>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row"> 
                <div class="col-sm-9 col-md-9">
                    <div class="blogtop">
                        <div class="container-fluid">
                            <div class="blogo col-md-4 col-sm-4">
                                <img class="img-responsive" src="<?= URL ?>public/images/onlinephpstudy.png">
                            </div>
                            <div class="col-md-8 col-sm-8">
				<ol class="breadcrumb_ops"><?php Util::createBreadcrum($this->breadcrumb); ?></ol>
                                <div class="bsearch">
				    <form action="http://www.google.com/search" method="get" target="blank" >
					<div class="input-group">
					    <input type="text" class="form-control" placeholder="Search for..." name="q" required="">
					    <input type="hidden" value="onlinephpstudy.com" name="sitesearch"> 
					    <span class="input-group-btn">
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Search Here</button>
					    </span>
					</div>
				    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-page">
			<h1><?= $this->heading1 ?></h1>
			<?php require 'views/' . $__viewpage . '.php'; ?>
                    </div> 
                </div>
                <div class="col-sm-3 col-md-3 pl0  ">
                    <div class="right-box">
			<h4><?= (empty($this->heading41)) ? '*********Enter Here Category Name****' : $this->heading41 ?></h4>
                        <div class="right-box-content">
                            <ul class="blog-categories">
				<li <?= (empty($this->active_cat)) ? 'class="active"' : '' ?> ><a href="<?= URL ?>blog">View All Blogs</a></li>
				<?php
				foreach ($this->catList as $catList) {
				    $status = ($this->active_cat == $catList['link']) ? 'class="active"' : '';
				    echo '<li ' . $status . '><a href="' . URL . 'blog/cat/' . $catList['link'] . '">' . $catList['blog_category'] . ' (' . $catList['blog_count'] . ')</a></li>';
				}
				?>
                            </ul>
                        </div> 
                    </div>
                    <div class="right-box"> 
                        <h4>Sign-Up to Newsletter</h4>
                        <div class="right-box-content">
                            <div class="bsignup">
                                <p class="text-success">Subscribe our newsletter to get updates via Email</p>
				<form name="signupFrm" id="signupFrm" method="post">
				    <div class="input-group">
					<input type="text" id="signUpemail" name="signUpemail" placeholder="Your email address" class="form-control" required="" >
					<span class="input-group-btn">
					    <button type="submit" id="signUp" class="btn btn-success">Sign up!</button>
					</span>
				    </div>
				</form>
				<span id="msg"></span>
                            </div>
                        </div> 
                    </div>
                    <div class="right-box"> 
                        <h4>Most Popular Posts</h4>
                        <div class="right-box-content">
                            <ul class="blog-popular-post">
				<?php
				if (!empty($this->popularBlogs)) {
				    foreach ($this->popularBlogs as $pb) {
					echo '<li>';
					echo '<a href ="' . URL . 'blog/view/' . $pb['id'] . '/' . $pb['url'] . '">' . $pb['name'] . '</a>';
					echo '</li>';
				    }
				}
				?>
                            </ul>
                        </div> 
                    </div>
                    <div class="right-box"> 
                        <h4><a class="twitter-timeline" data-dnt="true" href="https://twitter.com/onlinephpstudy" data-widget-id="606553796878045185">Tweets by @onlinephpstudy</a></h4>
                        <div class="right-box-content">
                            <script>!function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                    if (!d.getElementById(id)) {
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = p + "://platform.twitter.com/widgets.js";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }
                                }(document, "script", "twitter-wjs");</script>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
 <?php require 'views/layouts/main_footer.php'; ?>
    </body>
</html>