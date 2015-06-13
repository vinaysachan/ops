<h2><?= $this->subheading ?></h2>

<div id="listInserts"></div>



<hr/>
<h2>Add New Blog Category</h2>
<form id="blogCatFrm" class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-4 control-label" for="name">Blog Category Name : </label>
        <div class="col-sm-5">
            <input type="text" value="" placeholder="Enter Blog category Name" id="name" class="form-control" name="name">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="link">Blog category Url : </label>
        <div class="col-sm-5">
            <input type="text" value="" placeholder="Enter Blog category Url" id="link" class="form-control" name="link">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-5">
            <button class="btn btn-success btn-block" name="add" type="button">Submit</button>
        </div>
    </div>
</form>