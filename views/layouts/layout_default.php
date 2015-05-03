
<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Title</title>
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
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle-btn collapsed pull-right" type="button">
                        <i class="fa fa-outdent"></i>
                        Top Menu
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <?php
                    $allLinks = Navigation::MainHeaderMenu();
                    $this->menuCreator($allLinks, $menuType = 'frontPageMenu','');
                    ?>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row row-offcanvas-left row-offcanvas">
                <div class="col-sm-3 col-md-3 sidebar-offcanvas" id="sidebar" role="navigation">
                    <div class="logo">
                        <img class="img-responsive" src="<?= URL ?>public/images/new_logo.png">
                    </div>
                    <ul class="left_menu" role="menu" aria-labelledby="dropdownMenu" >  
                        <li class="active">
                            <a href="#">
                                INTRODUCTION OF PHP 
                            </a> 
                        </li>
                        <li >
                            <a href="javascript:void(0)">
                                INSTALLING OF PHP
                            </a>
                            <ul class="sub-menu"> 
                                <li >
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/installing_of_php">
                                        Installation on windows
                                    </a>
                                </li>
                                <li >
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/installing_of_php/installation_of_lamp">
                                        Installation on Linux 
                                    </a>
                                </li>
                                <li >
                                    <a title="Installation of PHP on Mac OS X (Mamp)"  href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/installing_of_php/installation_of_mamp">
                                        Installation on Mac OS X 
                                    </a>
                                </li>
                                <li >
                                    <a title="Installation on Cloud Computing platforms"  href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/installing_of_php/installation_on_cloud">
                                        Installation on Cloud 
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li >
                            <a title="PHP SYNTAX" href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_syntax">
                                PHP SYNTAX 
                            </a>
                        </li>
                        <li >
                            <a title="PHP VARIABLE" href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_variable">
                                PHP VARIABLE
                            </a>
                        </li>
                        <li >
                            <a title="PHP Data TYPES" href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_data_types">
                                PHP Data TYPES
                            </a>
                        </li>
                        <li >
                            <a title="PHP VARIABLES HANDLING" href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_variable_handling">
                                PHP VARIABLES HANDLING 
                            </a>
                        </li>
                        <li >
                            <a title="PHP CONSTANT" href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_constant">
                                PHP CONSTANT
                            </a>
                        </li>
                        <li >
                            <a title="PHP OPERATORS" href="javascript:void(0)">
                                PHP OPERATORS
                            </a>
                            <ul id="operator_menu" class="sub-menu">  
                                <li id="a_o_link">
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_operators#arithmetic_operator">
                                        PHP Arithmetic Operators 
                                    </a>
                                </li>
                                <li id="c_o_link">
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_operators#php_comparison_operators">
                                        PHP Comparison Operator 
                                    </a>
                                </li>
                                <li id="as_o_link">
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_operators#php_assignment_operators">
                                        PHP Assignment Operators 
                                    </a>
                                </li>
                                <li id="s_o_link">
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_operators#string_operator">
                                        PHP String Operators 
                                    </a>
                                </li>
                                <li id="b_o_link">
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_operators#php_bitwise_operators">
                                        PHP Bitwise Operators 
                                    </a>
                                </li>
                                <li id="l_o_link">
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_operators#php_logical_operators">
                                        PHP Logical Operators 
                                    </a>
                                </li>
                                <li id="i_o_link">
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_operators#php_increment_decrement_operators">
                                        Increment &amp; Decrement Operators 
                                    </a>
                                </li>
                                <li id="ar_o_link">
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_operators#php_array_operators">
                                        PHP Array Operators 
                                    </a>
                                </li>
                                <li id="e_o_link">
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_operators#error_control_operator">
                                        Error Control Operator 
                                    </a>
                                </li>
                                <li id="r_o_link">
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_operators#reference_operator">
                                        The reference ( &amp; ) operator 
                                    </a>
                                </li>
                                <li id="o_p_link">
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_operators#operator_precedence">
                                        PHP Operator Precedence 
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li >
                            <a href="javascript:void(0)">
                                PHP CONTROL STRUCTURE
                            </a>
                            <ul class="sub-menu"> 
                                <li >
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_control_structure">
                                        Conditional Control Structure
                                    </a>
                                </li>
                                <li >
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_control_structure/loop_control_structure">
                                        Loop Control Structure
                                    </a>
                                </li> 
                            </ul>
                        </li>
                        <li >
                            <a title="PHP STRING" href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_string">
                                PHP STRING
                            </a>
                        </li>
                        <li >
                            <a title="PHP STRING" href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_string_functions"> 
                                PHP String Functions 
                            </a>
                        </li>
                        <li >
                            <a href="javascript:void(0)" title="PHP Arrays">
                                PHP Arrays 
                            </a>
                            <ul class="sub-menu"> 
                                <li >
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_array" title="PHP Arrays Type">
                                        PHP Arrays Type
                                    </a>
                                </li>
                                <li >
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_array/php_array_handling" title="PHP Arrays Handling">
                                        PHP Arrays Handling
                                    </a>
                                </li>
                                <li >
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_array/php_array_sorting" title="PHP Arrays Sorting">
                                        PHP Arrays Sorting
                                    </a>
                                </li>
                                <li >
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_array/php_array_looping" title="PHP Arrays Looping">
                                        PHP Arrays Looping
                                    </a>
                                </li>
                                <li >
                                    <a href="/web/20140424075703/http://www.onlinephpstudy.com/basic_php/php_array/php_array_functions" title="PHP Arrays Functions">
                                        PHP Arrays Functions
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul> 
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
                                <h1>INTRODUCTION OF PHP</h1>
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
    </body>
</html>