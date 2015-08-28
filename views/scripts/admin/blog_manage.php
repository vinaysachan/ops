<h2>
    List of All Blogs
    <?php echo Util::baseUrl('admin/blogae', '<i class="fa fa-plus-square-o"></i> Add New Blog', 'Add New Blog', 'btn btn-danger pull-right ml15', 'role="button"') ?>
    <small><em>Here we can add and update the Blog</em></small> 
</h2>
<script type="text/javascript">
    $(document).ready(function () {
        $('.dataTable').dataTable({"order": [[0, "asc"]], responsive: true});
    });
</script>
<table class="responsive table table-bordered display nowrap dataTable" width="100%" >
    <thead>
        <tr>
            <th>#</th>
            <th>Blog Name</th>
            <th>Blog Category</th>
	    <th>Blog Writer</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead> 
    <tfoot>
        <tr>
            <th>#</th>
            <th>Blog Name</th>
            <th>Blog Category</th>
	    <th>Blog Writer</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
<?php
$i = 1;
foreach ($this->blogLists as $blog) {
    $status = ($blog['active'] == FLAG_Y) ? 'Enable' : 'Disable';
    $id = $blog['id'];
    echo '<tr>';
    echo '<td>' . $i . '</td>';
    echo '<td>' . $blog['name'] . '</td>';
    echo '<td>' . $blog['blog_cat'] . '</td>';
    echo '<td>' . $blog['writer'] . '</td>';
    echo '<td>' . $status . '</td>';
    echo '<td>' . Util::baseUrl('admin/blogae/' . $id, '<i class="fa fa-refresh"></i> Edit', 'Update this Blog\'s Content', 'btn btn-primary btn-sm', 'role="button"') . '</td>';
    echo '</tr>';
    ++$i;
}
?>
    </tbody>
</table>