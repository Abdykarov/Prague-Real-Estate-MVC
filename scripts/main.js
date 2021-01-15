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
    if($(e.target).is('.category_select')){
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
        $('.category_select').text(text);
    });
}
$('#change_form').submit(function(){
    var name_error = 0;
    var phone_error = 0;
    var new_pass_error = 0;
    var old_pass_error = 0;
    
    if($('#name').val() == ''){
        $('.name_error').text('Please inform your name');
        name_error = 1;
    }
    else if(!validateName($('#name').val())){
        $('.name_error').text('Špatný format. Přiklad "Abdykarov1"');
        name_error = 1;
    } else{
        $('.name_error').text('');
        name_error = 0;
    }

   

    if($('#phone').val() == ''){
        $('.phone_error').text('Please inform your phone');
        phone_error = 1;
    }else if($('#phone').val().length != 9){
        $('.phone_error').text('Telefon musí obsahovat 9 čísel');
        phone_error = 1;
    }
    else if(!validateNumber($('#phone').val())){
        $('.phone_error').text('Špatný format. Přiklad "720265312"');
        phone_error = 1;
    } else{
        $('.phone_error').text('');
        phone_error = 0;
    }


 

    if ($('#old_pass').val() == '') {
        $('.oldpass_error').text('Please inform your password');
        old_pass_error = 1;
    } else if ($('#old_pass').val().length < 6) {
        $('.oldpass_error').text('Heslo musí být nejméně 6 znaků');
        old_pass_error = 1;
    }else if(!validateNumber($('#old_pass').val())){
        $('.oldpass_error').text('Špatný format. Přiklad "123456"');
        old_pass_error = 1;
    }else{
        $('.oldpass_error').text('');
        old_pass_error = 0;
    }

    if ($('#new_pass').val() == '') {
        $('.newpass_error').text('Please inform your password');
        new_pass_error = 1;
    } else if ($('#new_pass').val().length < 6) {
        $('.newpass_error').text('Heslo musí být nejméně 6 znaků');
        new_pass_error = 1;
    }else if(!validateNumber($('#new_pass').val())){
        $('.newpass_error').text('Špatný format. Přiklad "123456"');
        new_pass_error = 1;

    }else{
        $('.newpass_error').text('');
        new_pass_error = 0;
    }

    if(name_error == 0 && phone_error == 0 && old_pass_error == 0 && new_pass_error == 0){

    }else{
        return false;
    }
});

$('#login_form').submit(function () {
    var email_error = '';
    var pass_error = '';
    
    if ($('#email').val() == '') {
        $('.email_error').text('Please inform your email');
        email_error = '1';
    } else if(!validateEmail($('#email').val())){
        $('.email_error').text('Špatný format email. Přiklad "user@gmail.com"');
        email_error = '1';
    }else{
        $('.email_error').text('');
        email_error = '';
    }


    if ($('#password').val() == '') {
        $('.pass_error').text('Please inform your password');
        pass_error = '1';
    } else if ($('#password').val().length < 6) {
        $('.pass_error').text('Heslo musí být nejméně 6 znaků');
        pass_error = '1';
    }else{
        $('.pass_error').text('');
        email_error = '';
    }

    if(email_error == '' && pass_error == ''){
        
    }else{
        return false;
    }
    
});
function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( email );
  }
function validateName (name){
    var format = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
    return format.test( name );
};
function validateNumber (name){
    var format = /^(?=.*\d).+$/;
    return format.test( name );
};
$('#chat_form').submit(function(){
    var msg_error = 0;
    if($('#msg').val() == ''){
        $('.msg_error').text('Please inform your message');
        msg_error = 1;
    } else{
        $('.msg_error').text('');
        msg_error = 0;
    }

    if(msg_error == 0){

    }else{
        return false;
    }
});
$('#msg_form').submit(function(){
    var msg_error = 0;
    if($('#msg_text').val() == ''){
        $('.msg_error').text('Please inform your message');
        msg_error = 1;
    } else{
        $('.msg_error').text('');
        msg_error = 0;
    }

    if(msg_error == 0){

    }else{
        return false;
    }

});
$('#admin_form').submit(function(){
    var msg_error = 0;
    var msg_error2 = 0;
    if($('#name').val() == ''){
        $('.name_error').text('Please inform category name');
        msg_error = 1;
    } else{
        $('.name_error').text('');
        msg_error = 0;
    }

    if($('#parentCategory').val() == ''){
        $('.cat_error').text('Please choose category');
        msg_error2 = 1;
    } else{
        $('.cat_error').text('');
        msg_error2 = 0;
    }

    if(msg_error == 0 && msg_error2 == 0){

    }else{
        return false;
    }

});

$('#add_post_form').submit(function(){
    var name_error = 0;
    var category_error = 0;
    var price_error = 0;
    var address_error = 0;
    var square_error = 0;
    var desc_error = 0;
    var owner_error = 0;
    var cond_error = 0;
    var const_error = 0;
    var file_error = 0;

    if($('#cat_hidden').val() == ''){
        $('.category_error').text('Please inform your category');
        category_error = 1
    }
    
    if($('#name').val() == ''){
        $('.name_error').text('Please inform your name');
        name_error = 1
    }else{
        name_error = 0
        $('.name_error').text('');
    }
    
    if($('#price').val() == ''){
        $('.price_error').text('Please inform your price');
        price_error = 1;
    }
    else if(!validateNumber($('#price').val())){
        $('.price_error').text('Špatný format. Jenom čísla');
        price_error = 1;
    } else{
        $('.price_error').text('');
        price_error = 0;
    }


    if($('#address').val() == ''){
        $('.address_error').text('Please inform your address');
        address_error = 1
    }else{
        address_error = 0
        $('.address_error').text('');
    }

    if($('#square').val() == ''){
        $('.square_error').text('Please inform your square');
        square_error = 1;
    }
    else if(!validateNumber($('#square').val())){
        $('.square_error').text('Špatný format. Jenom čísla');
        square_error = 1;
    } else{
        $('.square_error').text('');
        square_error = 0;
    }

    if($('#desc').val() == ''){
        $('.desc_error').text('Please inform your desc');
        desc_error = 1
    }else{
        desc_error = 0
        $('.desc_error').text('');
    }

    if ($('#files').get(0).files.length < 2) {
        $('.file_error').text('Minimalně 2 fotky');
        file_error = 1
    }else{
        $('.file_error').text('');
        file_error = 0
    }





    if(name_error == 0 &&
       category_error == 0 &&
       address_error == 0 &&
       price_error == 0 &&
       square_error == 0 &&
       desc_error == 0 &&
       owner_error == 0 &&
       cond_error == 0 &&
       const_error == 0 &&
       file_error == 0 
    ){

    }else{
        return false;
    }
});

$('#reg_form').submit(function () {
    var name_error = 0;
    var surname_error = 0;
    var email_error = 0;
    var phone_error = 0;
    var pass_error = 0;
    var confirm_error = 0;
    
    if($('#name').val() == ''){
        $('.name_error').text('Please inform your name');
        name_error = 1;
    }
    else if(!validateName($('#name').val())){
        $('.name_error').text('Špatný format. Přiklad "Abdykarov1"');
        name_error = 1;
    } else{
        $('.name_error').text('');
        name_error = 0;
    }

    if($('#last_name').val() == ''){
        $('.surname_error').text('Please inform your email');
        surname_error = 1;
    }
    else if(!validateName($('#last_name').val())){
            $('.surname_error').text('Špatný format. Přiklad "Abdykarov1"');
            surname_error = 1; 
    }else{
        $('.surname_error').text('');
        surname_error = 0;
    }

    if($('#phone').val() == ''){
        $('.phone_error').text('Please inform your phone');
        phone_error = 1;
    }else if($('#phone').val().length != 9){
        $('.phone_error').text('Telefon musí obsahovat 9 čísel');
        phone_error = 1;
    }
    else if(!validateNumber($('#phone').val())){
        $('.phone_error').text('Špatný format. Přiklad "720265312"');
        phone_error = 1;
    } else{
        $('.phone_error').text('');
        phone_error = 0;
    }


    if ($('#email').val() == '') {
        $('.email_error').text('Please inform your email');
        email_error = 1;
    } else if(!validateEmail($('#email').val())){
        $('.email_error').text('Špatný format email. Přiklad "user@gmail.com"');
        email_error = 1;
    }else{
        $('.email_error').text('');
        email_error = 0;
    }

    if ($('#pass').val() == '') {
        $('.pass_error').text('Please inform your password');
        pass_error = 1;
    } else if ($('#pass').val().length < 6) {
        $('.pass_error').text('Heslo musí být nejméně 6 znaků');
        pass_error = 1;
    }else if(!validateNumber($('#pass').val())){
        $('.pass_error').text('Špatný format. Přiklad "123456"');
        pass_error = 1;
    }else{
        $('.pass_error').text('');
        pass_error = 0;
    }

    if ($('#pass_confirm').val() == '') {
        $('.pass_confirm_error').text('Please inform your password');
        confirm_error = 1;
    } else if ($('#pass_confirm').val().length < 6) {
        $('.pass_confirm_error').text('Heslo musí být nejméně 6 znaků');
        confirm_error = 1;
    }else if(!validateNumber($('#pass_confirm').val())){
        $('.pass_confirm_error').text('Špatný format. Přiklad "123456"');
        confirm_error = 1;

    }else if($('#pass_confirm').val() != $('#pass').val()){
        $('.pass_confirm_error').text('Heslo neodpovídá!');
        confirm_error = 1;
    }else{
        $('.pass_confirm_error').text('');
        pass_confirm_error = 0;
    }

    if(name_error == 0 && surname_error == 0 && phone_error == 0 && email_error == 0 && pass_error == 0 && confirm_error == 0){

    }else{
        return false;
    }
    
});

// $("#login_form").submit(function(e){
//     e.preventDefault();
    
//     //serialize
//     var email = $('.login_email').val();
//     var pass = $('.login_pass').val();

//     // Ajax call
//     $.ajax({
//         url: '?controller=user&action=LoginUser',
//         data: {
//             'email': email,
//             'pass': pass
//         },
//         method: 'post',
//         success: function(data) {
//             var res = JSON.parse(data);
//             if (res.errors == 0) { 
//                 $("input").val("");
//                 window.location.href = 'http://wa.toad.cz/~abdykili/?controller=user&action=index';
                
//             }else{
//                 $("#password").val("");
//                 if(res.email_err == ''){
//                     $('#email').css("border-color", "green");
//                 }
//                 if(res.password_err == ''){
//                     $('#password').css("border-color", "green");
//                 }
//                 if(res.email_err != ''){
//                     $('#email').css("border-color", "red");
//                     $.miniNoty(res.email_err, 'error');
//                 }
//                 if(res.password_err != ''){
//                     $('#password').css("border-color", "red");
//                     $.miniNoty(res.password_err, 'error');
//                 }
//                 if(res.confirm_password_err != ''){
//                     $('#password').css("border-color", "red");
//                     $.miniNoty(res.confirm_password_err, 'error');
//                 }
               
               
//             }
//         }
//     });


// });
document.addEventListener( 'DOMContentLoaded', function () {
   var secondarySlider = new Splide( '#secondary-slider', {
       fixedWidth  : 110,
       height      : 70,
       gap         : 10,
       cover       : true,
       isNavigation: true,
       focus       : 'center',
       breakpoints : {
           '600': {
               fixedWidth: 66,
               height    : 40,
           }
       },
   } ).mount();
   
   var primarySlider = new Splide( '#primary-slider', {
       type       : 'fade',
       heightRatio: 0.5,
       pagination : false,
       arrows     : false,
       cover      : true,
   } ); // do not call mount() here.
   
   primarySlider.sync( secondarySlider ).mount();
} );

$('.main_categories ul li').on('click', function(e) {
    e.preventDefault();
    var id = $(this).attr('data-index-number');// `this` here refers to the current p you clicked on
    $('.main_categories ul li').removeClass('active');
    $(this).addClass('active');
    $.ajax({
        url: '?controller=post&action=getChildCategories',
        data: {
            'id': id
        },
        method: 'post',
        success: function(data) {
            let obj = JSON.parse(data);
            $('.child_categories ul').html('');   
            $('.grand_categories ul').html('');   
            for( let prop in obj ){
                $('.child_categories ul').append('<li data-index-number='+obj[prop].CategoryId+'>'+obj[prop].CategoryName+'</li>');
            }
        }
    });

 });

 $(document).on('click', '.child_categories ul li', function(e) {
    e.preventDefault();
    var id = $(this).attr('data-index-number');// `this` here refers to the current p you clicked on
    
    $.ajax({
        url: '?controller=post&action=getChildCategories',
        data: {
            'id': id
        },
        method: 'post',
        success: function(data) {
            let obj = JSON.parse(data);
            $('.grand_categories ul').html('');   
            for( let prop in obj ){
                $('.grand_categories ul').append('<li data-index-number='+obj[prop].CategoryId+'>'+obj[prop].CategoryName+'</li>');
            }
        }
    });

 });

 $(document).on('click', '.grand_categories ul li', function(e) {
    e.preventDefault();
    var id = $(this).attr('data-index-number');// `this` here refers to the current p you clicked on
    $('.preloader').fadeIn(50);
    $('.preloader').fadeOut(1000);
    $('#cat_hidden').val(id);
    $('.cat_block').fadeOut(100);
    
    $.ajax({
        url: '?controller=post&action=getCategoryPath',
        data: {
            'id': id
        },
        method: 'post',
        success: function(data) {
            let obj = JSON.parse(data);
            $('.category_path ul').html('');   
            for( let prop in obj ){
                $('.category_path ul').append('<li>'+obj[prop].CategoryName+'</li>');
            }
            $('.category_path ul').append('<li><a href="#" id="changeCat">Změnit kategorii</a></li>');
        }
    });
    $('.category_path').fadeIn(100);
 });


 $(document).on('click', '#changeCat', function(e) {
    e.preventDefault();
    $('.preloader').fadeIn(50);
    $('.preloader').fadeOut(500);
    $('#cat_hidden').val('');
    $('.category_path').fadeOut(50);
    $('.cat_block').fadeIn(50);
    $('.child_categories ul').html('');   
    $('.grand_categories ul').html('');   

 });

 $('.main_category_filter_hidden li').click(function(){
    var text = $(this).html();
    var category_id = $(this).data('categoryid');
    $('.main_category_filter span').text(text);
    $('.main_category_filter span').attr('data-categoryid', category_id); //setter

    $.ajax({
        url: '?controller=post&action=getChildCategories',
        data: {
            'id': category_id
        },
        method: 'post',
        success: function(data) {
            let obj = JSON.parse(data);
            $('.child_category_filter_hidden').html('');  
            $('.grand_category_filter_hidden').html('');  
            $('.child_category_filter span').html('');  
            $('.grand_category_filter span').html('');  
            $('#hiddenCategory').val('');
            $('.child_category_filter span').text(obj[0].CategoryName);
            $('.child_category_filter span').attr('data-categoryid', obj[0].CategoryId);
            for( let prop in obj ){
                $('.child_category_filter_hidden').append('<li data-categoryid='+obj[prop].CategoryId+'>'+obj[prop].CategoryName+'</li>');
            }
        }
    });

});

 $(document).click(function(e){
    if($(e.target).is('.main_category_filter span')){
        $('.main_category_filter_hidden').addClass('active'); 
    }
    else{
        $('.main_category_filter_hidden').removeClass('active');
    }
});
$(document).on('click', '.child_category_filter_hidden li', function(e) {

    var text = $(this).html();
    var category_id = $(this).data('categoryid');
    $('.child_category_filter span').text(text);
    $('.child_category_filter span').attr('data-categoryid', category_id); //setter
    
    $.ajax({
        url: '?controller=post&action=getChildCategories',
        data: {
            'id': category_id
        },
        method: 'post',
        success: function(data) {
            let obj = JSON.parse(data);
            $('.grand_category_filter_hidden').html(''); 
            $('.grand_category_filter span').html('');   
            $('#hiddenCategory').val(obj[0].CategoryId);
            $('.grand_category_filter span').text(obj[0].CategoryName);
            $('.grand_category_filter span').attr('data-categoryid', obj[0].CategoryId);
            for( let prop in obj ){
                $('.grand_category_filter_hidden').append('<li data-categoryid='+obj[prop].CategoryId+'>'+obj[prop].CategoryName+'</li>');
            }
        }
    });

});

$(document).click(function(e){
    if($(e.target).is('.child_category_filter span')){
        $('.child_category_filter_hidden').addClass('active'); 
    }
    else{
        $('.child_category_filter_hidden').removeClass('active');
    }
});

$(document).on('click', '.grand_category_filter_hidden li', function(e) {

    var text = $(this).html();
    var category_id = $(this).data('categoryid');
    $('#hiddenCategory').val(category_id);
    $('.grand_category_filter span').text(text);
    $('.grand_category_filter span').attr('data-categoryid', category_id); //setter

});

$(document).click(function(e){
    if($(e.target).is('.grand_category_filter span')){
        $('.grand_category_filter_hidden').addClass('active'); 
    }
    else{
        $('.grand_category_filter_hidden').removeClass('active');
    }
});


$('#filterForm').submit(function () {
    // Check if empty of not
    if ($('#hiddenCategory').val() == '') {
        $.miniNoty('Vyberte vhodnou kategorii.', 'error');
        return false;
    }
});

$('.big_form_btn').click(function(){
    if($('.bigform').hasClass('active')){
        $('.bigform').removeClass('active');
        $('.form_center').removeClass('active');
        $(this).text('Upřesnit filtry');
    }
    else{
        $('.bigform').addClass('active');
        $('.form_center').addClass('active');
        $(this).text('Zpátky');
    }
});

$(document).on('click', '.category_friends ul li', function(e) {

    var text = $(this).html();
    var category_id = $(this).data('categoryid');
    $('.category_friends input').val(category_id);
    $('.category_friends span').text(text);

});
$(document).click(function(e){
    if($(e.target).is('.category_friends span')){
        $('.category_friends ul').addClass('active'); 
    }
    else{
        $('.category_friends ul').removeClass('active');
    }
});

$('.category_pick_form ul li').click(function(){
    var parentId = $(this).data('categoryid');
    $('#parentCategory').val(parentId);
    $('.category_pick_form ul li').removeClass('active');
    $(this).addClass('active');

    $.ajax({
        url: '?controller=admin&action=checkParent',
        data: {
            'id': parentId
        },
        method: 'post',
        success: function(data) {
            if(data == 0){
                $('.img_pick').html('');
                $('.img_pick').append(' <label for="img">Vyberte obrazek</label><input type="file" name="img" id="img" multiple>');
            }else{
                $('.img_pick').html('');
            }
        }
    });
});



$("#hasParent").change(function() {
    if(this.checked) {
        $(".category_pick_form").show();
        $(".img_pick").hide();       
    }else{
        $(".category_pick_form").hide();
        $(".img_pick").show();
    }
});

