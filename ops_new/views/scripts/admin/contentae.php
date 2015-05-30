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
</script>
<?php
if (!empty($this->contentdata)) {
    $contentData = $this->contentdata[0];
}
?>
<form class="form-horizontal" id="registration-form" method="post">
    <div class="form-group">
        <label for="ppage" class="col-sm-2 control-label">Parent Page</label>
        <div class="col-sm-5">
            <?php
            echo '<select id="ppage" name="ppage" class="form-control select2" data-validation="required" data-validation-error-msg="Choose Any parent Page">';
            echo '<option value="">Select Any Parent Page</option>';
            foreach ($this->pageLists as $pageList) {
                $selected = (!empty($contentData['parent_id']) && $contentData['parent_id'] == $pageList['id']) ? 'selected' : '';
                echo '<option ' . $selected . '  value="' . $pageList['id'] . '">' . $pageList['name'] . '</option>';
            } echo '</select>';
            ?> 
        </div>
    </div>
    <div class="form-group">
        <label for="page_heading" class="col-sm-2 control-label">Page Heading</label>
        <div class="col-sm-5">
            <input name="page_heading" type="text" class="form-control" id="page_heading"
                   placeholder="Page Heading" data-validation="required"
                   data-validation-error-msg="Please enter the page heading." value="<?= (!empty($contentData['page_heading'])) ? $contentData['page_heading'] : '' ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="site_path" class="col-sm-2 control-label">Page Url</label>
        <div class="col-sm-5">
            <input name="site_path" type="text" class="form-control" id="site_path"
                   placeholder="Page Heading" data-validation="required"
                   data-validation-error-msg="Please enter the page URL."  value="<?= (!empty($contentData['site_path'])) ? $contentData['site_path'] : '' ?>">
        </div>
    </div>
    <div class="form-group"> 
        <label for="pcontent" class="col-sm-2 control-label">Page Content</label>
        <div class="col-sm-offset-2 col-sm-10 mt5">
            <textarea name="content" type="text" class="tinymce form-control" id="pcontent"
                      placeholder="Page Content" data-validation="required"
                      data-validation-error-msg="<span class='col-sm-offset-3 col-sm-5'>Please enter the Content of page</span>"><?= (!empty($contentData['content'])) ? $contentData['content'] : '' ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-info <?= (!empty($contentData['active']) && ($contentData['active']) == FLAG_Y) ? 'active' : '' ?>">
                    <input name="status" <?= (!empty($contentData['active']) && ($contentData['active']) == FLAG_Y) ? 'checked' : '' ?> value="<?= FLAG_Y ?>" type="radio"> Active
                </label>
                <label class="btn btn-info <?= (!empty($contentData['active']) && ($contentData['active']) == FLAG_N) ? 'active' : '' ?>">
                    <input name="status" <?= (!empty($contentData['active']) && ($contentData['active']) == FLAG_N) ? 'checked' : '' ?> value="<?= FLAG_N ?>" type="radio"> Disable 
                </label>
            </div>
        </div>
    </div> 
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-5">
            <button type="submit" name="<?= (!empty($this->contentdata)) ? 'update' : 'add' ?>" class="btn btn-success btn-block"><?= (!empty($this->contentdata)) ? 'Update' : 'Submit' ?></button>
        </div>
    </div> 
</form>
<script type="text/javascript">
    $.validate({
        borderColorOnError: '#FFF',
        addValidClassOnAll: true,
        modules: 'location, date, security, file',
        onModulesLoaded: function () {

        }
    });
    $('.select2').select2({
        theme: "classic"
    });
</script>
