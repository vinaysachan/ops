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
                    alert('Due to Error! blog can not be deleted');
                }
            }, 'json');
            return false;
        });
        $('.edit').click(function () {
            var editItem = $(this);
            var id = $(this).attr('rel');
            $('#frmHead').text('Update Blog Category');
            var id = $(this).attr('rel');
            $.get('/admin_ajax/xhrGetblogCatList', {'id': id}, function (o) {
            }, 'json');

        });
        $('#addBtn').click(function () {
//            $('#frmHead').text('Add New Blog Category');
            
            
            

        });

    }, 'json');

});