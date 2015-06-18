<h2>
    List of All Interview Question Categories 
    <a class="btn btn-danger pull-right ml15" id="addBtn" href="#frmHead" role="button"><i class="fa fa-plus-square-o"></i>Add New Interview Question Category</a>
    <small><em>Here we can add and update the category</em></small> 
</h2>
<div id="listInserts"></div>
<hr/> 
<h2 id="frmHead">Add New Interview Question Category</h2>
<form id="iqCatFrm" class="form-horizontal">
    <div class="form-group">
	<label class="col-sm-4 control-label" for="name">Interview Question Category Name : </label>
	<div class="col-sm-5">
	    <input type="text" value="" placeholder="Enter Interview Question category Name" id="name" class="form-control" name="name">
	</div>
    </div>
    <div class="form-group">
	<label class="col-sm-4 control-label" for="link">Interview Question category Url : </label>
	<div class="col-sm-5">
	    <input type="text" value="" placeholder="Enter Interview Question category Url" id="link" class="form-control" name="link">
	    <input type="hidden" value="" id="id" name="id">
	</div>
    </div>
    <div class="form-group">
	<div class="col-sm-offset-4 col-sm-5">
	    <button class="btn btn-success btn-block" name="add" id="add" type="button">Add New Interview Question Category</button>
	</div>
    </div>
</form>