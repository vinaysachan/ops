<h2><?= $this->subheading ?></h2>
<form class="form-horizontal well" id="gallery-form" method="post" enctype="multipart/form-data" >
    <h2>Add New Image</h2>
    <div class="form-group">
        <label for="img" class="col-sm-2 control-label">Image</label>
        <div class="col-sm-5">
            <input type="file" name="img" id="img"/>
        </div>
    </div>
    <div class="form-group">
	<label for="active" class="col-sm-2 control-label">Blog Status</label>
        <div class="col-sm-10">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-info">
                    <input name="active" value="<?= FLAG_Y ?>" type="radio"> Active
                </label>
                <label class="btn btn-info">
                    <input name="active" value="<?= FLAG_N ?>" type="radio"> In-Active 
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-5">
            <button type="submit" name="add" class="btn btn-success btn-block">Submit</button>
        </div>
    </div>
</form>

<table class="table bolder">
<?php
if (!empty($this->gallery)) {
    foreach ($this->gallery as $gal) {
	echo '<tr><td>'.$gal['path_full_img'].'</td></tr>';
    }
}
?>
</table>