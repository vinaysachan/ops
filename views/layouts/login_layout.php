 
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
    </head>
    <body>
        <?php
        require 'views/' . $__viewpage . '.php';
        ?>
    </body>
</html>