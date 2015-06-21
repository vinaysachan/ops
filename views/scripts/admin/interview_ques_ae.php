<h2><?= (!empty($this->subheading) ? $this->subheading : '') ?></h2>
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
    $(function () {
        $('.select2').select2({
            theme: "classic"
        });
    });
</script>
<?php
if (!empty($this->quesData)) {
    $quesData = $this->quesData[0];
    ?>
    <div class="text-right">
	<?php
	echo Util::baseUrl('admin/interview_ques_ans/' . $quesData['id'], '<i class="fa fa-edit"></i> Manage Answer', ' Manage Answer', 'btn btn-danger ml10', 'role="button"')
	?>
    </div>
<?php } ?>
<form class="form-horizontal" id="registration-form" method="post" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="question_category_id" class="col-sm-2 control-label">Question Category</label>
        <div class="col-sm-5">
	    <?php
	    echo '<select id="question_category_id" name="question_category_id" class="form-control select2">';
	    echo '<option value="">Select Any Question Category</option>';
	    foreach ($this->quesCatLists as $catList) {
		$selected = (!empty($quesData['question_category_id']) && $quesData['question_category_id'] == $catList['id']) ? 'selected' : '';
		echo '<option ' . $selected . ' value="' . $catList['id'] . '">' . $catList['name'] . '</option>';
	    } echo '</select>';
	    ?>
        </div>
    </div>
    <div class="form-group">
        <label for="question" class="col-sm-2 control-label">Write Question</label>
        <div class="col-sm-10">
	    <textarea name="question" rows="4" id="question" class="form-control" placeholder="Enter Interview question" ><?= (!empty($quesData['question'])) ? $quesData['question'] : '' ?></textarea>
        </div>
    </div>
    <div class="form-group">
	<label for="level" class="col-sm-2 control-label">Question Level</label>
        <div class="col-sm-10">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-info <?= (!empty($quesData['level']) && ($quesData['level']) == EASY_QUES) ? 'active' : '' ?>">
                    <input name="level" <?= (!empty($quesData['level']) && ($quesData['level']) == EASY_QUES) ? 'checked' : '' ?> value="<?= EASY_QUES ?>" type="radio"> Easy
                </label>
		<label class="btn btn-info <?= (!empty($quesData['level']) && ($quesData['level']) == MEDIUM_QUES) ? 'active' : '' ?>">
                    <input name="level" <?= (!empty($quesData['level']) && ($quesData['level']) == MEDIUM_QUES) ? 'checked' : '' ?> value="<?= MEDIUM_QUES ?>" type="radio"> Medium
                </label>
                <label class="btn btn-info <?= (!empty($quesData['level']) && ($quesData['level']) == HARD_QUES) ? 'active' : '' ?>">
                    <input name="level" <?= (!empty($quesData['level']) && ($quesData['level']) == HARD_QUES) ? 'checked' : '' ?> value="<?= HARD_QUES ?>" type="radio"> Hard 
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
	<label for="active" class="col-sm-2 control-label">Question Status</label>
        <div class="col-sm-10">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-info <?= (!empty($quesData['active']) && ($quesData['active']) == FLAG_Y) ? 'active' : '' ?>">
                    <input name="active" <?= (!empty($quesData['active']) && ($quesData['active']) == FLAG_Y) ? 'checked' : '' ?> value="<?= FLAG_Y ?>" type="radio"> Active
                </label>
                <label class="btn btn-info <?= (!empty($quesData['active']) && ($quesData['active']) == FLAG_N) ? 'active' : '' ?>">
                    <input name="active" <?= (!empty($quesData['active']) && ($quesData['active']) == FLAG_N) ? 'checked' : '' ?> value="<?= FLAG_N ?>" type="radio"> Disable 
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-5">
            <button type="submit" name="<?= (!empty($this->quesData)) ? 'update' : 'add' ?>" class="btn btn-success btn-block"><?= (!empty($this->quesData)) ? 'Update' : 'Submit' ?></button>
        </div>
    </div>

</form>
