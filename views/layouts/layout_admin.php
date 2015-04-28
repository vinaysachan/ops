<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title><?=(empty($this->title)?'Admin Panel':$this->title)?></title>
        <meta name="description" content="descriptiondescriptiondescriptiondescription">
        <meta name="author" content="Vinay Sachan"/> 
        <meta name="Keywords" content="KeywordsKeywordsKeywords" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="logo.png"/>

        <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet" type="text/css">

        <link href="<?php echo URL; ?>public/bootstrap-3.2.0/css/bootstrap.css" rel="stylesheet" media="screen"/>
        <link href="<?= URL ?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen"/> 
        <link href="<?= URL ?>public/css/main.css" rel="stylesheet" media="screen"/>
        <script type="text/javascript" src="<?= URL ?>public/js/jquery-2.1.1.min.js"></script> 
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="<?= URL ?>public/bootstrap-3.2.0/js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="<?= URL ?>public/js/custom.js"></script> 
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
                    <?= Util::baseUrl('admin', 'Admin - Panel', 'Admin Dashboard - Online PHP Study', 'navbar-brand') ?>
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle-btn collapsed pull-right" type="button">
                        <i class="fa fa-outdent"></i>
                        Top Menu
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active dropdown">
                            <a class="dropdown-toggle" title="PHP / Database (Mysql)" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> <?= Session::get('name') ?></a>
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
                        <img class="img-responsive" src="<?= URL ?>public/images/new_logo.png">
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
                    <div class="box"> 
                        <h1><?=(empty($this->heading)?'Page Header':$this->heading)?></h1>
                        <div class="content">
                            <?php
                            require 'views/' . $__viewpage . '.php';
                            ?>
                        </div>
                    </div> 
                </div>
            </div><!--/.row--> 
        </div><!--/.container-->
        <footer>
            <span class="text-left">
                Copyright &copy; 2012 - <?= date("Y") ?>  All rights reserved. 
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