$('document').ready(function(){
    console.log(1);
    setTimeout(function(){
        $('.preloader').fadeOut();
    }, 1000);
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
});

$(document).ready(function(){
    $('select').formSelect();
});
  

$(document).click(function(e){
    if($(e.target).is('.custom_select')){
        $('.hidden_filter').addClass('active'); 
        var height = $('.hidden_filter').outerHeight();
        $('.hidden_filter').css("bottom",-height);
        changeInputValue();
        return;
    }
    else{
        $('.hidden_filter').removeClass('active');
        return;
        
    }
});

/**
 * Changes input
 */
function changeInputValue(){
    $(".hidden_form .button").click(function(e){
        e.preventDefault();
        var text = $(this).attr("value");
        $('.custom_select').text(text);
    });
}

$("#reg_form").submit(function(e){
    e.preventDefault();
    
    //serialize
    var name = $('#name').val();
    var last_name = $('#last_name').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var pass = $('#pass').val();
    var pass_confirm = $('#pass_confirm').val();

    // Ajax call
    $.ajax({
        url: '?controller=user&action=addUser',
        data: {
            'name': name,
            'last_name': last_name,
            'phone': phone,
            'email': email,
            'pass': pass,
            'pass_confirm': pass_confirm
        },
        method: 'post',
        success: function(data) {
            console.log(data);
        }
    });


});