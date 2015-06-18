$(function () {
    $.get('/admin_ajax/xhrGetblogCatListings', function (o) {
        for (var i = 0; i < o.length; i++) {
            $('#listInserts').append('<div>' + o[i].name + '<a class="del" rel="' + o[i].id + '" href="#">Delete</a><a class="edit" rel="' + o[i].id + '" href="#">Edit</a></div>');
        }
        $('.del').click(function () {
            var delItem = $(this);
            var id = $(this).attr('rel');
            $.post('/admin_ajax/xhrDelblogCatListing', {'id': id}, function (o) {
                if (o == 'Del') {
                    delItem.parent().remove();
                } else {
                    alert('Due to Error! blog Category can not be deleted');
                }
            }, 'json');
            return false;
        });
        $('.edit').click(function () {
            var editItem = $(this);
            var id = $(this).attr('rel');
            $.get('/admin_ajax/xhrGetblogCatList', {'id': id}, function (o) {
                $('#frmHead').text('Update Blog Category : ' + o[0].name);
                $('#name').val(o[0].name);
                $('#link').val(o[0].link);
                $('#id').val(o[0].id);
                $('#add').text('Update this Blog Caegory');
            }, 'json');
        });
        $('#addBtn').click(function () {
            $('#name,#link,#id').val('');
            $('#frmHead').text('Add New Blog Category');
            $('#add').text('Add New Blog Caegory');
        });
        $('#add').click(function () {
            var name = $('#name').val();
            var link = $('#link').val();
            var id = $('#id').val();
            $.post('/admin_ajax/xhrAddblogCat', {'name': name, 'link': link, 'id': id}, function (o) {
                if (o == 'added') {
                    var msg = 'Blog category added Successfully';
                } else {
                    var msg = 'Blog category Updated Successfully';
                }
                window.location = "/admin/blog_cat?succ-msg=" + encodeURI(msg);
                exit();
            }, 'json');
            return false;
        });

    }, 'json');

});