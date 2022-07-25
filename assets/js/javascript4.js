$(document).ready(function(){




    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })



















      
    $('.block12').css('display','none');
    $('.block2').css('display','none');
    $('.block3').css('display','none');









    $('.all').css('background-color','rgb(0,176,116,0.5)');
    $('.line').css('background-color','rgb(0,176,116,0.5)');
    $('.pie').css('background-color','rgb(0,176,116,0.5)');
    $('.all_time').css('background-color','rgb(0,176,116,0.5)');
    
    





$('.select_it1').find('h5').css('border-bottom','solid 4px rgb(0,176,116)');





$(".select_it1").click(function(){
    $(this).find('h5').css('border-bottom','solid 4px rgb(0,176,116)');
    $('.select_it2').find('h5').css('border-bottom','');
    $('.select_it3').find('h5').css('border-bottom','');

    
    $('.block2').fadeOut();
    $('.block3').fadeOut();

    $('.block1').fadeIn();


});





$(".select_it2").click(function(){
    $(this).find('h5').css('border-bottom','solid 4px rgb(0,176,116)');
    $('.select_it1').find('h5').css('border-bottom','');
    $('.select_it3').find('h5').css('border-bottom','');

    $('.block1').fadeOut();
    $('.block3').fadeOut();
    $('.block12').fadeOut();


    $('.block2').fadeIn();
});



$(".select_it3").click(function(){
    $(this).find('h5').css('border-bottom','solid 4px rgb(0,176,116)');
    $('.select_it1').find('h5').css('border-bottom','');
    $('.select_it2').find('h5').css('border-bottom','');

    $('.block2').fadeOut();
    $('.block1').fadeOut();
    $('.block12').fadeOut();

    $('.block3').fadeIn();
});







































$(".week ").click(function(){


   
    $(this).css('background-color','rgb(0,176,116,0.5)');
    $(".month ").css('background-color','transparent');
    $(".ggh ").css('background-color','transparent');
    $(".all_time ").css('background-color','transparent');






$('#id4').fadeIn();
$('#id3').slideUp();
$('#id2').slideUp();
$('#id1').slideUp();


$('#id44').fadeIn();
$('#id33').slideUp();
$('#id22').slideUp();
$('#id11').slideUp();

});

$(".month ").click(function(){

    $(this).css('background-color','rgb(0,176,116,0.5)');
    $(".week ").css('background-color','transparent');
    $(".ggh ").css('background-color','transparent');
    $(".all_time ").css('background-color','transparent');



    $('#id3').fadeIn();
    $('#id4').slideUp();
    $('#id2').slideUp();
    $('#id1').slideUp();
    


    $('#id33').fadeIn();
    $('#id44').slideUp();
    $('#id22').slideUp();
    $('#id11').slideUp();
    
});

$(".ggh ").click(function(){


    $(this).css('background-color','rgb(0,176,116,0.5)');
    $(".month ").css('background-color','transparent');
    $(".week ").css('background-color','transparent');
    $(".all_time ").css('background-color','transparent');

    $('#id2').fadeIn();
    $('#id4').slideUp();
    $('#id3').slideUp();
    $('#id1').slideUp();
    


    $('#id22').fadeIn();
    $('#id44').slideUp();
    $('#id33').slideUp();
    $('#id11').slideUp();
});

$(".all_time ").click(function(){
    $(this).css('background-color','rgb(0,176,116,0.5)');
    $(".month ").css('background-color','transparent');
    $(".ggh ").css('background-color','transparent');
    $(".week ").css('background-color','transparent');

    $('#id1').fadeIn();
    $('#id4').slideUp();
    $('#id3').slideUp();
    $('#id2').slideUp();
    


    $('#id11').fadeIn();
    $('#id44').slideUp();
    $('#id33').slideUp();
    $('#id22').slideUp();
});

















$(".me").click(function(){
    
    $(".all ").css('background-color','transparent');
    $(this).css('background-color','rgb(0,176,116,0.5)');

    $('.block1').hide();
    $('.block12').show();
});
$(".all").click(function(){
    
    $(".me ").css('background-color','transparent');
    $(this).css('background-color','rgb(0,176,116,0.5)');
    $('.block12').hide();
    $('.block1').show();
});








$(".line ").click(function(){
    $(".bars ").css('background-color','transparent');
    $(this).css('background-color','rgb(0,176,116,0.5)');
    

});
$(".bars ").click(function(){
 
    
    $(this).css('background-color','rgb(0,176,116,0.5)');
    $(".line ").css('background-color','transparent');
});






$(".pie ").click(function(){
 
    $(".donut ").css('background-color','transparent');
    $(this).css('background-color','rgb(0,176,116,0.5)');
    

});
$(".donut ").click(function(){
 
    $(this).css('background-color','rgb(0,176,116,0.5)');
    $(".pie ").css('background-color','transparent');

});












});