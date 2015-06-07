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
                                        <a href="#">Jobs</a>
                                    </li>
                                    <li class="bc">
                                        Interview Question Answer
                                    </li>
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
                    <div class="blog-page">
                        <?php require 'views/' . $__viewpage . '.php'; ?>
                    </div> 
                </div>
                <div class="col-sm-3 col-md-3 pl0  ">
                    <div class="right-box"> 
                        <h4>Interview Question Categories</h4>
                        <div class="right-box-content">
                            <ul class="blog-categories">
                                <li class="active"><a href="#">PHP Interview (116)</a></li>
                                <li><a href="#">HTML, CSS Interview(7)</a></li>
                                <li><a href="#">JS, AngularJS, JQuery Interview(7)</a></li>
                                <li><a href="#">HR Interview(7)</a></li>
                                <li><a href="#">DBMS, MySQL Interview(4)</a></li>
                                <li><a href="#">MangoDB, NoSQL Interview(23)</a></li>
                                <li><a href="#">Quantitative & Reasoning (5)</a></li>
                            </ul>
                        </div> 
                    </div>
                    <div class="right-box"> 
                        <h4>Sign-Up to Newsletter</h4>
                        <div class="right-box-content">
                            <div class="bsignup">
                                <p>Subscribe our blogs updates and jobs via Email</p>
                                <div class="input-group">
                                    <input type="text" placeholder="Your email address" class="form-control">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success">Sign up!</button>
                                    </span>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="right-box"> 
                        <h4>Most Popular Posts</h4>
                        <div class="right-box-content">
                            <ul class="blog-popular-post">
                                <li><a href="#">PHP Login Page Example.</a></li>
                                <li><a href="#">Search Engine Optimization (SEO)</a></li>
                                <li><a href="#">Auto Load and Refresh Div every 10 Seconds with jQuery.</a></li>
                                <li><a href="#">How to post into a Facebook Page with PHP using Graph API</a></li>
                                <li><a href="#">Create a RESTful services using Slim PHP Framework</a></li>
                                <li><a href="#">Enabling APC (Alternative PHP Cache) for PHP</a></li>
                                <li><a href="#">Custom Audio Player with Jquery Audio Controls Plugin</a></li>
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