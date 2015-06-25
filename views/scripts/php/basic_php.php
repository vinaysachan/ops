<?php

if (!empty($this->pageContent)) {
    foreach ($this->pageContent as $pageData) {
	echo $pageData['content'];
    }
}
?>