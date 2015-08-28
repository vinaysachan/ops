$(function () {
    $.get('/admin_ajax/xhrGettestCatListings', function (o) {
        for (var i = 0; i < o.length; i++) {
            $('#listInserts').append('<tr><td>' + o[i].list_order + '</td><td><img src="'+o[i].logo+'" height=40></td><td>' + o[i].cat_name + '</td><td><a class="del" rel="' + o[i].id + '" href="#">Delete</a></td><td><a class="edit" rel="' + o[i].id + '" href="#frmHead">Edit</a></td></tr>');
        }
        $('.del').click(function () {
            var delItem = $(this);
            var id = $(this).attr('rel');
            $.post('/admin_ajax/xhrDeltestCatListing', {'id': id}, function (o) {
                if (o == 'Del') {
                    delItem.closest('tr').remove();
                } else if (o == 'quesExist') {
                    alert('There are some Questions under this category So! test Category can not be deleted');
                } else {
                    alert('Due to Error! Test Category can not be deleted');
                }
            }, 'json');
            return false;
        });
        $('.edit').click(function () {
            var editItem = $(this);
            var id = $(this).attr('rel');
            $.get('/admin_ajax/xhrGettestCatList', {'id': id}, function (o) {
                $('#frmHead').text('Update Online Test Category : ' + o[0].cat_name);
                $('#cat_name').val(o[0].cat_name);
                $('#id').val(o[0].id);
                $('#logo').val(o[0].logo);
                $('#list_order').val(o[0].list_order);
                $('#add').text('Update this Online Test Caegory');
            }, 'json');
        });
        $('#addBtn').click(function () {
            $('#cat_name,#id').val('');
            $('#frmHead').text('Add New Online Test Category');
            $('#add').text('Add New Online Test Category');
        });
        $('#add').click(function () {
            var cat_name = $('#cat_name').val(); 
            var id = $('#id').val();
            var logo = $('#logo').val();
            var list_order = $('#list_order').val();
            $.post('/admin_ajax/xhrAddtestCat', {'cat_name': cat_name,'logo': logo,'list_order': list_order, 'id': id}, function (o) {
                if (o == 'added') {
                    var msg = 'Online Test category added Successfully';
                } else {
                    var msg = 'Online Test category Updated Successfully';
                }
                window.location = "/admin/test_category?succ-msg=" + encodeURI(msg);
                exit();
            }, 'json');
            return false;
        });
    }, 'json');

});