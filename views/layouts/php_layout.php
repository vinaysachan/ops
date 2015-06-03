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
                    // ====> Left Menu with Active Link
                    $active = (empty($this->active)) ? '' : $this->active;
                    $this->menuCreator($this->allLeftLinks, $menuType = 'adminLeftMenu', $active);
                    ?>
                </div>         
                <div class="col-sm-9 col-md-9">
                    <div class="">
                        <ol class="breadcrumb_ops">
                            <li class="bc">
                                <i class="fa fa-home"></i><a href="#">Home</a>
                            </li>
                            <li class="bc">
                                <a href="#">Basic PHP</a>
                            </li>
                            <li class="bc">Introduction of PHP</li>
                        </ol>
                        <div class="col-sm-8 p0">
                            <div class="box"> 
                                <h1><?= (empty($this->heading) ? 'Page Header' : $this->heading) ?></h1>
                                <div class="content">
                                    <?php
                                    require 'views/' . $__viewpage . '.php';
                                    ?>
                                </div>
                            </div>
                            <nav>
                                <ul class="pager">
                                    <li class="previous"><a href="">Previous Page</a></li>
                                    <li class="next"><a href="">Next page</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-sm-4 pr0">
                            <div class="box">
                                <div class="content">
                                    <h2>Latest Posts</h2>
                                    <p>sdkhg sdshgfsdf dfgfdsf</p> 
                                    Vinay Sachan <br/>
                                    Vinay Sachan <br/>
                                    Vinay Sachan <br/>
                                    Vinay Sachan <br/>
                                    Vinay Sachan <br/>
                                </div>
                            </div>
                            <div class="box">
                                <div class="content">
                                    <h2>Latest Jobs</h2>
                                    <p>sdkhg sdshgfsdf dfgfdsf</p> 
                                    Vinay Sachan <br/>
                                    Vinay Sachan <br/>
                                    Vinay Sachan <br/>
                                    Vinay Sachan <br/>
                                    Vinay Sachan <br/>
                                </div>
                            </div>
                            <div class="box">
                                <div class="content">
                                    <h2>Connect with US</h2>
                                    <p>sdkhg sdshgfsdf dfgfdsf</p> 
                                    Vinay Sachan <br/>
                                    Vinay Sachan <br/>
                                    Vinay Sachan <br/>
                                    Vinay Sachan <br/>
                                    Vinay Sachan <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.row--> 
        </div><!--/.container-->
        <!--
        <div class="container-fluid">
            <div class="row row-offcanvas-left row-offcanvas">
                <div class="col-sm-3 col-md-3 sidebar-offcanvas" id="sidebar" role="navigation">
                    <div class="logo">
                        <img class="img-responsive" src="<?= URL ?>public/images/onlinephpstudy.png">
                    </div>
                    <?php
                    // ====> Left Menu with Active Link
                    $active = (empty($this->active)) ? '' : $this->active;
                    $this->menuCreator($this->allLeftLinks, $menuType = 'adminLeftMenu', $active);
                    ?>
                </div>
                <div class="col-sm-9 col-md-9">
                    <div class="box"> 
                        <h1><?= (empty($this->heading) ? 'Page Header' : $this->heading) ?></h1>
                        <div class="content">
                            <?php
                            require 'views/' . $__viewpage . '.php';
                            ?>
                        </div>
                    </div> 
                </div>
            </div><!--/.row--> 
        <!--</div><!--/.container-->  
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