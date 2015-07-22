function addans(i) {
    return '<div id="ansdiv_' + i + '"><div class="col-sm-offset-2 col-sm-8"><textarea required="" name="ans[' + i + ']" rows="2" class="form-control mt10" placeholder="Enter the answer option"></textarea></div><div class="col-sm-1 mt25"><input id="mark_' + i + '" type="radio" name="mark" value="' + i + '"></div><div class="col-sm-1 mt20"><button type="button" class="btn btn-danger" onclick="return rem(' + i + ')"><i class="fa fa-minus-circle"></i></button></div></div>';
}

function rem(i) {
    $('#ansdiv_' + i).remove();
}

function run(qansjson) {
    for (var start = 0; start < qansjson.length; start++) {
        $('.anslist').append(addans(start));
        $('textarea[name="ans[' + start + ']"]').val(qansjson[start].ans);
        if (qansjson[start].mark == 1) {
            $('#mark_' + start).attr('checked', true);
        }
    }
}

$(function () {
    var i = $('#ans_count').val();
    $('#add_btn').click(function () {
        $('.anslist').append(addans(i));
        i++;
    });
    $('#testqa_form').submit(function () {
        if ($('#cat_id').val() == '') {
            alert("Please Choose Category");
            return false;
        }
        if ($('#question').val() == '') {
            alert("Please Write Question");
            return false;
        }
        if ($('input[name=mark]:checked').length <= 0) {
            alert("Please choose Any correct Answer");
            return false;
        }

    });
});


