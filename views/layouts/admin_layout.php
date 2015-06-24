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
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle-btn pull-left" data-toggle="offcanvas" type="button">Left Menu <i class="fa fa-indent"></i>
                    </button>
		    <?= Util::baseUrl('admin', 'Admin - Panel', 'Admin Dashboard - Online PHP Study', 'navbar-brand') ?>
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle-btn collapsed pull-right" type="button">
                        <i class="fa fa-outdent"></i>
                        Top Menu
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active dropdown">
                            <a class="dropdown-toggle" title="<?= Session::get('name') ?>" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="<?= Session::get('img') ?>" style="padding: 0px; display: table-row-group; margin: -15px 0px;" height="48px;">
				<?= Session::get('name') ?>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
				    <?= Util::baseUrl('login/adminlogout', 'Sign-out <i class="fa fa-sign-out"></i>', 'sign-out') ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row row-offcanvas-left row-offcanvas">
                <div class="col-sm-3 col-md-3 sidebar-offcanvas" id="sidebar" role="navigation">
                    <div class="logo">
                        <img class="img-responsive" src="<?= URL ?>public/images/onlinephpstudy.png">
                    </div>
		    <?php
		    /*
		     * Take All Left menu from Navigator Class in for of Array
		     */
		    $allLinks = Navigation::AdminLeftMenu();
		    /*
		     * Active Link
		     */
		    $active = (empty($this->active)) ? '' : $this->active;
		    $this->menuCreator($allLinks, $menuType = 'adminLeftMenu', $active);
		    ?>

                </div>         
                <div class="col-sm-9 col-md-9">
                    <div class="box box_admin"> 
                        <h1><?= (empty($this->heading) ? 'Page Header' : $this->heading) ?></h1>
                        <div class="content">
			    <?php if (isset($_REQUEST['succ-msg'])) { ?> 
    			    <div class="alert alert-success alert-dismissible" role="alert">
    				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    				<strong>Congrats!</strong> <?= urldecode($_REQUEST['succ-msg']) ?>
    			    </div>
			    <?php } if (isset($_REQUEST['succ-err'])) { ?> 
    			    <div class="alert alert-danger alert-dismissible" role="alert">
    				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    				<strong>Error !</strong> <?= urldecode($_REQUEST['succ-err']) ?>
    			    </div>
			    <?php } ?>
			    <?php
			    require 'views/' . $__viewpage . '.php';
			    ?>
                        </div>
                    </div> 
                </div>
            </div><!--/.row--> 
        </div><!--/.container-->
	<?php require 'views/layouts/main_footer.php'; ?>
    </body>
</html>