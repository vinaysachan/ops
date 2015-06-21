<div class="blog-list-wrapper">
    <h1>Interview Questions and Answers</h1>
    <h2><?= (isset($this->quesLists[0]['cat_name'])) ? $this->quesLists[0]['cat_name'] : 'View All' ?> Questions and Answers</h2>
    <div class="qa-list">
	<?php
	if (!empty($this->quesLists)) {
	    $i = 1;
	    foreach ($this->quesLists as $question) {
		?>
		<div class="q"><h3><a href="#a<?= $i ?>" title="<?= $question['question'] ?>" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pull-left"><?= $question['question'] ?></a></h3>
		    <?php
		    if ($question['level'] == HARD_QUES) {
			echo '<span title="Hard" class="start3 pull-right"></span>';
		    } else if ($question['level'] == MEDIUM_QUES) {
			echo '<span title="Medium" class="start2 pull-right"></span>';
		    } else if ($question['level'] == EASY_QUES) {
			echo '<span title="Easy" class="start1 pull-right"></span>';
		    }
		    ?>
		    <div class="clearfix"></div>
		    <a href="#a<?= $i ?>" class="view-answer" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">View the answer</a>
		    <div class="clearfix"></div>
		    <div class="collapse" id="a<?= $i ?>"><blockquote class="ans"><?= $question['answer'] ?></blockquote></div></div>
		<?php
		$i++;
	    }
	}
	?>

	<?= $this->pagination ?>
    </div>
</div>