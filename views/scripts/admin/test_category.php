<h2>
    List of All Online Test Categories 
    <a class="btn btn-danger pull-right ml15" id="addBtn" href="#frmHead" role="button"><i class="fa fa-plus-square-o"></i>Add New Test Category</a>
    <small><em>Here we can add and update the category</em></small> 
</h2>
<table id="listInserts" class="table table-bordered"></table>
<hr/> 
<h2 id="frmHead">Add New Online Test Category</h2>
<form id="iqCatFrm" class="form-horizontal">
    <div class="form-group">
	<label class="col-sm-3 control-label" for="cat_name">Online Test Category Name : </label>
	<div class="col-sm-5">
	    <input type="text" value="" placeholder="Enter Online Test category Name" id="cat_name" class="form-control" name="cat_name">
	    <input type="hidden" value="" id="id" name="id">
	</div>
	<label class="col-sm-offset-1  col-sm-1 control-label" for="list_order">Order : </label>
	<div class="col-sm-2">
	    <input type="number" value="" placeholder="Order" id="list_order" class="form-control" name="list_order">
	</div>
    </div>
    <div class="form-group">
	<label class="col-sm-3 control-label" for="logo">Category Logo : </label>
	<div class="col-sm-5">
	    <input type="text" value="" placeholder="Enter Online Test category logo" id="logo" class="form-control" name="logo"> 
	</div>
	<div class="col-sm-4">
	    <button class="btn btn-success btn-block" name="add" id="add" type="button">Add Online Test Category</button>
	</div>
    </div>
</form>