
/*
 FILE ARCHIVED ON 7:57:21 Apr 24, 2014 AND RETRIEVED FROM THE
 INTERNET ARCHIVE ON 8:55:56 Aug 30, 2014.
 JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.
 
 ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
 SECTION 108(a)(3)).
 */
//Main Function
var Main = function () {
    function topmenu_dropdown_hover() {
        if ($(window).width() >= 768) {
            $('body').on('mouseover', '.dropdown-toggle', function (e) {
                $(e.currentTarget).trigger('click')
            })
        }
    }
    function sidebar_leftmenu() {
        $(document).ready(function () {
            $('[data-toggle=offcanvas]').click(function () {
                $('.row-offcanvas').toggleClass('active', 100);
            });
            $('#sidebar li').hover(
                    function () {
                        $(this).addClass('hover')
                    },
                    function () {
                        $(this).removeClass('hover')
                    }
            )
        });
    }
    var hide_divContent = function () {
        $(document).ready(function () {
            $('.btn-minimize').bind('click', function (e) {
                var n = $(this).parent().parent().next(".box-content");
                if (n.is(":visible")) {
                    n.hide('500');
                    $("i", $(this)).removeClass("fa fa-chevron-up").addClass("fa fa-chevron-down");
                } else {
                    n.show('500');
                    $("i", $(this)).removeClass("fa fa-chevron-down").addClass("fa fa-chevron-up");
                }
            });
        });
    };
    var runContainerHeight = function () {

    };

    //function to activate the 3rd and 4th level menus
    var runNavigationMenu = function () {
        $('.left_menu li.active').addClass('open');
        $('.left_menu > li a').bind('click', function () {
            if ($(this).parent().children('ul').hasClass('sub-menu') && (!$('body').hasClass('navigation-small') || !$(this).parent().parent().hasClass('left_menu'))) {
                if (!$(this).parent().hasClass('open')) {
                    $(this).parent().addClass('open');
                    $(this).parent().parent().children('li.open').not($(this).parent()).not($('.left_menu > li.active')).removeClass('open').children('ul').slideUp(500);
                    $(this).parent().children('ul').slideDown(500, function () {
                        runContainerHeight();
                    });
                } else {
                    if (!$(this).parent().hasClass('active')) {
                        $(this).parent().parent().children('li.open').not($('.left_menu > li.active')).removeClass('open').children('ul').slideUp(500, function () {
                            runContainerHeight();
                        });
                    } else {
                        $(this).parent().parent().children('li.open').removeClass('open').children('ul').slideUp(500, function () {
                            runContainerHeight();
                        });
                    }
                }
            }
        });
    };


    //function to activate the 3rd and 4th level menus
    var signUpToNewLetter = function () {
        function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            return emailReg.test($email);
        }
        $(document).ready(function () {
            $('form#signupFrm').bind('submit', function (e) {
                $('#msg').html('');
                var email = $('#signUpemail').val();
                if (!validateEmail(email)) {
                    $('#msg').html('<p class="text-danger">Please enter a valid Email Id</p>');
                    return false;
                }
                $.post('/ajax/xhrSignUpNewsletter', {'email': email}, function (o) {
                    if (o == 'already') {
                        $('#msg').html('<p class="text-danger">This Email Id Already Exist.</p>');
                    } else if (o == 'added') {
                        $('#msg').html('<div class="text-success"><p>Almost finished... </p>\n\
<p>We need to confirm your email address.</p>\n\
<p> To complete the subscription process, please click the link in the email we just sent you. </p></div>');
                        $('#signUpemail').val('');
                    }
                }, 'json');


                return false;
            });
        });
    };
    //function to activate the Go-Top button

    return {
        //main function to initiate template pages
        init: function () {
            //  topmenu_dropdown_hover();
            hide_divContent();
            sidebar_leftmenu();
            runNavigationMenu();
            signUpToNewLetter();
        }
    };
}();


