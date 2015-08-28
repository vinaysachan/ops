<!DOCTYPE html>
<html lang="en">
    <head> 
	<?php
	//==> Page Meta tags
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
                </div><!--/.nav-collapse -->
            </div>
        </nav> 

	<?php
	require 'views/' . $__viewpage . '.php';
	?>
        <?php require 'views/layouts/main_footer.php'; ?>
    </body>
</html>