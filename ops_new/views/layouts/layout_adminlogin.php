 
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
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet" type="text/css">
        <link href="<?php echo URL; ?>public/bootstrap-3.2.0/css/bootstrap.css" rel="stylesheet" media="screen"/>
        <link href="<?= URL ?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen"/> 
        <link href="<?= URL ?>public/css/login.css" rel="stylesheet" media="screen"/>
       <script type="text/javascript" src="<?= URL ?>public/js/jquery-2.1.1.min.js"></script> 
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="<?= URL ?>public/bootstrap-3.2.0/js/bootstrap.min.js"></script> 
    </head>
    <body>
        <?php
        require 'views/' . $__viewpage . '.php';
        ?>
    </body>
</html>