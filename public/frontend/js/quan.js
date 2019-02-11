function activeTab(btnClick) {
    "use strict";
    $(btnClick).click(function () {
        var content = $(this).data('content');
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $(content).siblings().removeClass('active');
        $(content).addClass('active');
    })
}

$(document).ready(function(){
    "use strict";
   $('button#submitQues').click(function(){
       $('form#getQues').submit();
   });

    $('a.close-popup').click(function(){
        $('div.popup-regis, div.popup-login, div.popup-successful').hide();
    });
    $('a.btn-regis').click(function(){
        $('div.popup-regis').show();
        $('div.popup-login').hide();
    });

    $('a.btn-login').click(function(){
        $('div.popup-regis').hide();
        $('div.popup-login').show();
    });
    $('#click_register').click(function(e){
        e.preventDefault();
        let phone = $('#register_form input[name=phone]').val();
        let email = $('#register_form input[name=email]').val();
        let address = $('#register_form textarea[name=address]').val();
        let name = $('#register_form input[name=name]').val();
        let dob = $('#register_form input[name=dob]').val();
        let ssn = $('#register_form input[name=ssn]').val();
        let province = $('#register_form input[name=province]').val();

        if (!phone || !email || !address || !name || !dob || !ssn || !province) {
            $('#errors').show();
        } else {
            $('#errors').hide();
            $('#register_form').submit();
        }
    });

    $('button#contact_submit').click(function(e){
        e.preventDefault();
        var name = $('#contact_name').val();
        var phone = $('#contact_phone').val();
        var email = $('#contact_email').val();
        var content = $('#contact_content').val();

        if (!name || !phone || !email || !content) {
            $('#contact_errors').show();
        } else {
            $('#contact').submit();
        }

        return false;
    });
    $('button#contact_reset').click(function(){
        $('form#contact').reset();
        return false;
    });

    activeTab('.tabComment a');

    $("a[data-type='tab']").on('click',function(e){
        e.preventDefault();
        let parent = $(this).data('parent');
        let content = $(this).data('content');
        let reset = $(this).data('reset');
        $("." + parent + " li").removeClass('active');
        $(this).parent("li").addClass('active');
        $("."+reset).css({display:"none"});
        $("#"+content).css({display:"block"});
    });

    $('#post_detail_send_comment').click(function(e){
        e.preventDefault();
        $('form#post_detail_comment_form').submit();
        return false;
    });

    $('.grid').masonry({
        // options
        itemSelector: '.grid-item'
    });


});