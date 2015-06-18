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
if (!empty($this->blogData)) {
    $blogData = $this->blogData[0];
}
?>
<form class="form-horizontal" id="registration-form" method="post" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="blog_cat" class="col-sm-2 control-label">Blog Category</label>
        <div class="col-sm-5">
	    <?php
	    echo '<select id="blog_cat" name="blog_cat" class="form-control select2">';
	    echo '<option value="">Select Any Blog Category</option>';
	    foreach ($this->blogCatLists as $catList) {
		$selected = (!empty($blogData['blog_cat']) && $blogData['blog_cat'] == $catList['id']) ? 'selected' : '';
		echo '<option ' . $selected . ' value="' . $catList['id'] . '">' . $catList['name'] . '</option>';
	    } echo '</select>';
	    ?> 
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Blog Name</label>
        <div class="col-sm-10">
	    <textarea name="name" rows="1" id="name" class="form-control" placeholder="Enter Blog name" ><?= (!empty($blogData['name'])) ? $blogData['name'] : '' ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="url" class="col-sm-2 control-label">Blog Url</label>
        <div class="col-sm-10">
	    <textarea name="url" rows="1" id="url" class="form-control" placeholder="Enter Blog url" ><?= (!empty($blogData['url'])) ? $blogData['url'] : '' ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="writer" class="col-sm-2 control-label">Blog Writer</label>
        <div class="col-sm-5">
	    <?php
	    echo '<select id="writer" name="writer" class="form-control select2">';
	    echo '<option value="">Select Any Blog Writer</option>';
	    foreach ($this->getwriterLists as $wList) {
		$selected = (!empty($blogData['writer']) && $blogData['writer'] == $wList['id']) ? 'selected' : '';
		echo '<option ' . $selected . ' value="' . $wList['id'] . '">' . $wList['name'] . '</option>';
	    } echo '</select>';
	    ?> 
        </div>
    </div>
    <div class="form-group">
        <label for="content" class="col-sm-2 control-label">Blog Content</label>
        <div class="col-sm-offset-2 col-sm-10 mt5">
            <textarea name="content" type="text" class="tinymce form-control" id="content" placeholder="blog Content"><?= (!empty($blogData['content'])) ? $blogData['content'] : '' ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="blog_img" class="col-sm-2 control-label">Blog Main Image</label>
        <div class="col-sm-5">
            <input type="file" name="blog_img" id="blog_img"/>
	    <?php
	    if (!empty($blogData['images'])) {
		$img = URL . BLOG_IMG_PATH . $blogData['images'];
		echo '<img height="200px;" style="border: 5px #000000 solid" src="' . $img . '">';
	    }
	    ?>
        </div>
    </div>


    <div class="form-group">
	<label for="status" class="col-sm-2 control-label">Blog Status</label>
        <div class="col-sm-10">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-info <?= (!empty($blogData['active']) && ($blogData['active']) == FLAG_Y) ? 'active' : '' ?>">
                    <input name="status" <?= (!empty($blogData['active']) && ($blogData['active']) == FLAG_Y) ? 'checked' : '' ?> value="<?= FLAG_Y ?>" type="radio"> Active
                </label>
                <label class="btn btn-info <?= (!empty($blogData['active']) && ($blogData['active']) == FLAG_N) ? 'active' : '' ?>">
                    <input name="status" <?= (!empty($blogData['active']) && ($blogData['active']) == FLAG_N) ? 'checked' : '' ?> value="<?= FLAG_N ?>" type="radio"> Disable 
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-5">
            <button type="submit" name="<?= (!empty($this->blogData)) ? 'update' : 'add' ?>" class="btn btn-success btn-block"><?= (!empty($this->blogData)) ? 'Update' : 'Submit' ?></button>
        </div>
    </div>
</form>
