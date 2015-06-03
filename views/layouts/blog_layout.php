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
                                <ol class="breadcrumb_ops">
                                    <li class="bc">
                                        <i class="fa fa-home"></i><a href="#">Home</a>
                                    </li>
                                    <li class="bc">
                                        <a href="#">Blogs</a>
                                    </li>
                                    <li class="bc">My First Blog</li>
                                </ol>
                                <div class="bsearch">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button"><i class="fa fa-search"></i> Serach in Blogs</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 


                    <br/><br/><br/><br/><br/><br/><br/><br/><br/>
                    Main Page Content

                    <?php
                    require 'views/' . $__viewpage . '.php';
                    ?>
                </div>
                <div class="col-sm-3 col-md-3 brred">
                    Right Menu
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