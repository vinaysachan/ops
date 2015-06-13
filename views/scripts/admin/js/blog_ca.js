$(function () {

    $.get('/admin_ajax/xhrGetblogCatListings', function (o) {
        for (var i = 0; i < o.length; i++) {
            $('#listInserts').append('<div>' + o[i].name + '<a class="del" rel="' + o[i].id + '" href="#">X</a></div>');
        }
        $('.del').click(function () {
            var delItem = $(this);
            var id = $(this).attr('rel');

            $.post('/admin_ajax/xhrDelblogCatListing', {'id': id}, function (o) {
                if (o == 'Del') {
                    delItem.parent().remove();
                } else {
                    alert('blog Cat Not deleted');
                }
            }, 'json');

            return false;
        });

    }, 'json');

});