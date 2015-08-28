<script type="text/javascript">
    tinymce.init({
        selector: ".tinymce",
        theme: "modern",
        plugins: [
            "advlist autoresize autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
    });
</script>
<?php
if (!empty($this->quesAnsData)) {
    $quesAnsData = $this->quesAnsData[0];
}
?>
<h2>Manage This Question's Answer</h2>
<h3 class="pull-left"><?= $quesAnsData['question'] ?> </h3>
<div class="pull-right">
    <?php
    if ($quesAnsData['active'] == FLAG_N) {
	echo '<span class="label label-default">In-Active</span>';
    } else if ($quesAnsData['active'] == FLAG_Y) {
	echo '<span class="label label-success">Active</span>';
    }

    if ($quesAnsData['level'] == HARD_QUES) {
	echo '<span title="Hard" class="start3"></span>';
    } else if ($quesAnsData['level'] == MEDIUM_QUES) {
	echo '<span title="Medium" class="start2"></span>';
    } else if ($quesAnsData['level'] == EASY_QUES) {
	echo '<span title="Easy" class="start1"></span>';
    }

    echo Util::baseUrl('admin/interview_ques_ae/' . $quesAnsData['id'], '<i class="fa fa-edit"></i> Edit this question', ' Edit this question', 'btn btn-danger ml10', 'role="button"')
    ?>
</div>
<div class="clearfix"></div>
<hr/>
<form class="form-horizontal" id="registration-form" method="post" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="answer" class="col-sm-1 control-label">Answer</label>
        <div class="col-sm-12 mt5">
            <textarea name="answer" type="text" class="tinymce form-control" id="answer" placeholder="Answer"><?= (!empty($quesAnsData['answer'])) ? $quesAnsData['answer'] : '' ?></textarea>
        </div>
    </div>
    <div class="form-group">
	<label for="active" class="col-sm-2 control-label">Answer Status</label>
        <div class="col-sm-10">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-info <?= (!empty($quesAnsData['answer_active']) && ($quesAnsData['answer_active']) == FLAG_Y) ? 'active' : '' ?>">
                    <input name="active" <?= (!empty($quesAnsData['answer_active']) && ($quesAnsData['answer_active']) == FLAG_Y) ? 'checked' : '' ?> value="<?= FLAG_Y ?>" type="radio"> Active
                </label>
                <label class="btn btn-info <?= (!empty($quesAnsData['answer_active']) && ($quesAnsData['answer_active']) == FLAG_N) ? 'active' : '' ?>">
                    <input name="active" <?= (!empty($quesAnsData['answer_active']) && ($quesAnsData['answer_active']) == FLAG_N) ? 'checked' : '' ?> value="<?= FLAG_N ?>" type="radio"> In-Active 
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="p15">
	    <input type="hidden" name="questions_id" value="<?= $quesAnsData['id']; ?>">
	    <input type="hidden" name="answer_id" value="<?= $quesAnsData['answer_id']; ?>">
            <button type="submit" name="<?= (!empty($quesAnsData['answer_id'])) ? 'update' : 'add' ?>" class="btn btn-success btn-block"><?= (!empty($quesAnsData['answer_id'])) ? 'Update' : 'Submit' ?></button>
        </div>
    </div>
</form>