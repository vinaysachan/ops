<h2>
    List of All Blog categories 
    <a class="btn btn-danger pull-right ml15" id="addBtn" href="#" role="button"><i class="fa fa-plus-square-o"></i>Add New Blog Category</a>
    <small><em>Here we can add and update the category</em></small> 
</h2>
<table id="listInserts" class="table table-bordered"></table>
<hr/> 
<h2 id="frmHead">Add New Blog Category</h2>
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
	    <input type="hidden" value="" id="id" name="id">
	</div>
    </div>
    <div class="form-group">
	<div class="col-sm-offset-4 col-sm-5">
	    <button class="btn btn-success btn-block" name="add" id="add" type="button">Add New Blog Category</button>
	</div>
    </div>
</form>