<h2>
    List of All Interview Questions
    <?php echo Util::baseUrl('admin/interview_ques_ae', '<i class="fa fa-plus-square-o"></i> Add Interview Questions', 'Add Interview Questions', 'btn btn-danger pull-right ml15', 'role="button"') ?>
    <small><em>Here we can add and update the Interview Questions and their's Answers</em></small> 
</h2>
<script type="text/javascript">
    $(document).ready(function () {
        $('.dataTable').dataTable({"order": [[0, "asc"]], responsive: true});
    });
</script>
<table class="responsive table table-bordered display nowrap dataTable" width="100%" >
    <thead>
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Category</th>
	    <th>Status</th>
            <th>Action</th>
        </tr>
    </thead> 
    <tfoot>
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Category</th>
	    <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
	<?php
	$i = 1;
	foreach ($this->questionsList as $question) {
	    $status = ($question['active'] == FLAG_Y) ? '<span class="label label-success">Active</span>' : '<span class="label label-default">In-Active</span>';
	    $id = $question['id'];
	    echo '<tr>';
	    echo '<td>' . $i . '</td>';
	    echo '<td width ="65%">' . $question['question'] . '</td>';

	    echo '<td width ="25%">' . $question['ques_cat'] . '</td>';
	    echo '<td>';
	    echo 'Difficulty: ';
	    if ($question['level'] == HARD_QUES) {
		echo '<span title="Hard" class="start3"></span>';
	    } else if ($question['level'] == MEDIUM_QUES) {
		echo '<span title="Medium" class="start2"></span>';
	    } else if ($question['level'] == EASY_QUES) {
		echo '<span title="Easy" class="start1"></span>';
	    }
	    echo '<br/>' . $status;
	    echo '</td>';
	    echo '<td>' .
	    Util::baseUrl('admin/interview_ques_ans/' . $id, '<i class="fa fa-book"></i> Manage Answer', 'Manage this Question\'s Answer', 'btn btn-success btn-sm', 'role="button"')
	    . ' <br/> ' .
	    Util::baseUrl('admin/interview_ques_ae/' . $id, '<i class="fa fa-refresh"></i> Edit', 'Update this Question', 'btn btn-primary btn-sm mt5', 'role="button"') . '</td>';
	    echo '</tr>';
	    ++$i;
	}
	?>
    </tbody>
</table>