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
    <body>
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
                </div><!--/.nav-collapse -->
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
                                <ol class="breadcrumb_ops">
				    <?php
				    if (!empty($this->breadcrumb)) {
					foreach ($this->breadcrumb as $bread) {
					    if ($bread['link'] == '') {
						echo '<li title="' . $bread['title'] . '" class="bc">' . $bread['name'] . '</li>';
					    } else {
						echo '<li class="bc"><a title="' . $bread['title'] . '" href="' . $bread['link'] . '">' . $bread['name'] . '</a></li>';
					    }
					}
				    }
				    ?>
                                </ol>
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
		    <div class="container-fluid mt25">
			<div class="row row-offcanvas-left row-offcanvas">
			    <div class="col-sm-4 col-md-4 sidebar-offcanvas" id="sidebar" role="navigation"> 
				<?php
				// ====> Left Menu with Active Link
				$active = (empty($this->active)) ? '' : $this->active;
				$this->menuCreator($this->allLeftLinks, $menuType = 'adminLeftMenu', $active);
				?>
			    </div>
			    <div class="col-sm-8 col-md-8 box"> 
				<h1><?= (empty($this->heading) ? 'Page Header' : $this->heading) ?></h1>
				<div class="content">
				    <?php
				    require 'views/' . $__viewpage . '.php';
				    ?>
				</div>
				<nav>
				    <ul class="pager">
					<li class="previous"><a href="">Previous Page</a></li>
					<li class="next"><a href="">Next page</a></li>
				    </ul>
				</nav>
			    </div>
			</div>
		    </div>  
                </div>
                <div class="col-sm-3 col-md-3 pl0  "> 
		    <div class="right-box"> 
                        <h4>Latest Posts</h4>
                        <div class="right-box-content">
                            <ul class="blog-popular-post">
				<?php
				if (!empty($this->latestBlogs)) {
				    foreach ($this->latestBlogs as $lb) {
					echo '<li>';
					echo '<a href ="' . URL . 'blog/view/' . $lb['id'] . '/' . $lb['url'] . '">' . $lb['name'] . '</a>';
					echo '</li>';
				    }
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
        <footer>
            <span class="text-left">
                Copyright &copy; 2012 - 2014  All rights reserved. 
                <a target="_blank" href="#">Dev OPS</a> 
            </span>
            <span class="text-right pull-right">
                <ul class="footer-links">  
                    <li><a href="">Articles - Blogs</a></li> 
                    <li><a href="">Jobs</a></li> 
                    <li><a href="">Interview Questions</a></li> 
                </ul> 
            </span> 
        </footer>
        <script lang="javascript" type="text/javascript">
            $(document).ready(function () {
                var item = $('ul.left_menu li.active');
                item.parent().parent().addClass('active');
                item.addClass('current');
            });
        </script>
    </body>
</html>