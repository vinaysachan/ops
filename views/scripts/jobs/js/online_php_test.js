

function createcatList(data) {
    return '<div class="checkTestcat col-sm-6"><label><input type="checkbox" value="' + data.id + '" name="cat[]"><img src="' + data.logo + '">' + data.cat_name + '<div class="btn-group" data-toggle="buttons"><label class="btn btn-info"><input name="category[' + data.id + ']" value="e" type="radio"> Easy</label><label class="btn btn-info active"><input name="category[' + data.id + ']" checked="" value="m" type="radio"> Medium</label><label class="btn btn-info"><input name="category[' + data.id + ']" value="h" type="radio"> Hard </label></div></label></div>';
}

$(function () {
    $(document).bind("contextmenu", function (e) {
        return false;
    });

    $.get('/ajax/xhrtestCategories', function (catdata) {
        $('#hesd2').text('Select One or more Skills to test.');
        $('.page-data').html('<p class="text-center"><i class="fa fa-spinner fa-pulse fa-spin fa-5x"></i></p>');
        var catList = '';
        for (var i = 0; i < catdata.length; i++) {
            catList = catList + createcatList(catdata[i]);
        }
        $('.page-data').html('');
        var pageData = '<form id="start_testForm" action="" method="post" class="form-horizontal">';
        pageData = pageData + '<div class="form-group"> ' + catList + '</div>';
        pageData = pageData + '<h2 class="text-left">Some test details</h2><div class="table-responsive"><table class="table table-bordered table-striped"><colgroup><col class="col-xs-2"><col class="col-xs-7"></colgroup><tbody><tr><th scope="row">Please enter your name</th><td class="p0"><input required="" type="text" class="form-control" name="sname" id="sname" placeholder="Please enter your name"></td></tr><tr><th scope="row">Please enter your email</th><td class="p0"><input type="email" class="form-control" name="semail" id="semail" placeholder="Please enter your email"></td></tr><tr><th scope="row">Selected Skills</th><td>PHP + MySQL</td></tr><tr><th scope="row">Instructions</th><td><ul><li>Total number of questions : 20</li><li>Time Alloted : 30 Minutes</li><li>Each question carry 1 mark, no negative mark</li></ul></td></tr><tr><th scope="row">Notes</th><td><ul><li>Test will be submitted automatically if the time expired</li><li>Do not refresh the page</li><li>Click the <code>Submit Answer</code> button given in the bottom of the page to submit your answer</li><li>You will be able to see answer at the end of the test</li></ul></td></tr></tbody></table></div><div class="form-group"><div class="ml15 mr15"><button class="btn btn-success btn-block" type="submit"><i class="fa fa-pencil-square-o mr10"></i>START THE TEST</button></div></div></form>';
        $('.page-data').html(pageData);
    }, 'json');

    $(".page-data").on('submit', '#start_testForm', function () {
        if ($('input[name=cat\\[\\]]:checked').length <= 0) {
            alert("Please choose atleast on Skill");
            return false;
        }
        var data = $('#start_testForm').serialize();
        $('#hesd2').hide();
        $('.page-data').html('<p class="text-center text-success"><i class="fa fa-spinner fa-pulse fa-spin fa-5x"></i></p><p class="text-center text-primary">Please Wait some time we are creating your question paper.</p><p class="text-center text-danger">Please Do not refresh the page.</p><p class="text-center text-info">Good luck!</p>');
        $.post('/ajax/xhrStarttest', data, function (o) {
            
        }, 'json');


        return false;
    });



});