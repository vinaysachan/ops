<h2>
    List of All Test Questions
    <?php echo Util::baseUrl('admin/test_ques_ae', '<i class="fa fa-plus-square-o"></i> Add Test Questions', 'Add Test Questions', 'btn btn-danger pull-right ml15', 'role="button"') ?>
    <small><em>Here we can add and update the Test Questions and their's Answers</em></small> 
</h2>
<script type="text/javascript">
    $(document).ready(function () {
        $('.dataTable').dataTable({"order": [[0, "asc"]], responsive: true, "iDisplayLength": 50});
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
	    echo '<td width ="50%">' . $question['question'] . '</td>';

	    echo '<td>' . $question['cat_name'] . '</td>';
	    echo '<td>' . $status . '</td>';
	    echo '<td>' .
	    Util::baseUrl('admin/test_ques_ae/' . $id, '<i class="fa fa-refresh"></i> Edit', 'Update this Question', 'btn btn-primary btn-sm mt5', 'role="button"') . '</td>';
	    echo '</tr>';
	    ++$i;
	}
	?>
    </tbody>
</table>