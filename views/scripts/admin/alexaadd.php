<?php
echo '<table border ="5">';
foreach ($this->ifscLists as $data) {
    echo '<tr>';
    echo '<td>' . $data['ifsc_code'] . '</td>';
    echo '<td>' . $data['bank_name'] . '</td>';
    echo '</tr>';
}
echo '</table>';


echo $this->pagination;
?>

<style>
    ul.pagging {
	text-align:center;
	color:#829994;
    }
    ul.pagging li {
	display:inline;
	padding:0 3px;
    }
    ul.pagging a {
	color:#0d7963;
	display:inline-block;
	padding:5px 10px;
	border:1px solid #cde0dc;
	text-decoration:none;
    }
    ul.pagging a:hover, 
    ul.pagging a.current {
	background:#0d7963;
	color:#fff; 
    }
</style>