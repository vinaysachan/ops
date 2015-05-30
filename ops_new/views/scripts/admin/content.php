<h2><span class="pull-left">List of All Contents <small>View pages details</small></span><?php echo Util::baseUrl('admin/contentae', '<i class="fa fa-plus-square-o"></i> Add New page', 'Add New Page', 'pull-right btn btn-danger', 'role="button"') ?><div class="clearfix"></div></h2>
<script type="text/javascript">
    /** DataTable Function */$(document).ready(function () {
        $('.dataTable').dataTable({"order": [[0, "asc"]], responsive: true});
    });</script>
<table class="table table-bordered display nowrap dataTable" width="100%" >
    <thead>
        <tr>
            <th>#</th>
            <th>Page Heading</th>
            <th>Parent</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead> 
    <tfoot>
        <tr>
            <th>#</th>
            <th>Page Heading</th>
            <th>Parent</th>
            <th>Status</th> 
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $i = 1;
        foreach ($this->contentLists as $content) {
            $status = ($content['active'] == FLAG_Y) ? 'Enable' : 'Disable';
            $id = $content['id'];
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $content['page_heading'] . '</td>';
            echo '<td>' . $content['parent_name'] . '</td>';
            echo '<td>' . $status . '</td>';
            echo '<td>' . Util::baseUrl('admin/contentae/' . $id, '<i class="fa fa-refresh"></i> Edit', 'Update this Page\'s Content', 'btn btn-primary btn-sm', 'role="button"') . '</td>';
            echo '</tr>';
            ++$i;
        }
        ?>
    </tbody>
</table>
</div>