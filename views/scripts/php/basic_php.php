<?php

if (!empty($this->pageContent)) {
    foreach ($this->pageContent as $pageData) {
	echo htmlspecialchars_decode($pageData['content']);
    }
}
?>