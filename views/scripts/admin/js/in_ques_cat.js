$(function () {
    $.get('/admin_ajax/xhrGetQuestionCatListings', function (o) {
        for (var i = 0; i < o.length; i++) {
            $('#listInserts').append('<tr><td>' + o[i].name + '</td><td><a class="del" rel="' + o[i].id + '" href="#">Delete</a></td><td><a class="edit" rel="' + o[i].id + '" href="#frmHead">Edit</a></td></tr>');
        }
        $('.del').click(function () {
            var delItem = $(this);
            var id = $(this).attr('rel');
            $.post('/admin_ajax/xhrDelQuestionCatListing', {'id': id}, function (o) {
                if (o == 'Del') {
                    delItem.closest('tr').remove();
                } else if (o == 'quesExist') {
                    alert('There are some Questions under this category So! Interview Question category can not be deleted');
                } else {
                    alert('Due to Error! Interview Question category can not be deleted');
                }
            }, 'json');
            return false;
        });
        $('.edit').click(function () {
            var editItem = $(this);
            var id = $(this).attr('rel');
            $.get('/admin_ajax/xhrGetQuestionCatList', {'id': id}, function (o) {
                $('#frmHead').text('Update Interview Question Category : ' + o[0].name);
                $('#name').val(o[0].name);
                $('#link').val(o[0].link);
                $('#id').val(o[0].id);
                $('#add').text('Update this Interview Question Caegory');
            }, 'json');
        });
        $('#addBtn').click(function () {
            $('#name,#link,#id').val('');
            $('#frmHead').text('Add New Interview Question Category');
            $('#add').text('Add New Interview Question Caegory');
        });
        $('#add').click(function () {
            var name = $('#name').val();
            var link = $('#link').val();
            var id = $('#id').val();
            $.post('/admin_ajax/xhrAddQuestionCat', {'name': name, 'link': link, 'id': id}, function (o) {
                if (o == 'added') {
                    var msg = 'Interview Question category added Successfully';
                } else {
                    var msg = 'Interview Question category Updated Successfully';
                }
                window.location = "/admin/interview_ques_cat?succ-msg=" + encodeURI(msg);
                exit();
            }, 'json');
            return false;
        });

    }, 'json');

});