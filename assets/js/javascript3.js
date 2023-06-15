$(document).ready(function(){

  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }




$('.dropbtn').mouseover(function (){
if(getCookie('mode')=='light'){
  
 $(this).find('svg').attr('fill','white')

}

});



$('.dropbtn').mouseout(function (){
if(getCookie('mode')=='light'){
  
 $(this).find('svg').attr('fill','black')

}

});






    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    




    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })




    var modal1 = document.getElementById("myModal_add");
    var modal2 = document.getElementById("myModal_edit");
    var modal3 = document.getElementById("myModal_grade");
    var modal4 = document.getElementById("myModal_dep");
    var modal5 = document.getElementById("myModal_spec");
   

    var span1 = document.getElementsByClassName("close")[0];
    var span2 = document.getElementsByClassName("close")[1];
    var span3 = document.getElementsByClassName("close")[2];
    var span4 = document.getElementsByClassName("close")[3];
    var span5 = document.getElementsByClassName("close")[4];




if (typeof span1 !== 'undefined') {
span1.onclick = function() {
modal2.style.display = "none";
//window.location.reload();
}}

if (typeof span2 !== 'undefined') {
span2.onclick = function() {
modal1.style.display = "none";
//window.location.reload();
}}

if (typeof span3 !== 'undefined') {
span3.onclick = function() {
modal3.style.display = "none";
//window.location.reload();
}}


if (typeof span4 !== 'undefined') {
span4.onclick = function() {
modal4.style.display = "none";
//window.location.reload();
}}


if (typeof span5 !== 'undefined') {
span5.onclick = function() {
modal5.style.display = "none";
//window.location.reload();
}}





            window.onclick = function(event) {
if (event.target == modal1) {
  modal1.style.display = "none";
  //window.location.reload();
}
if (event.target == modal2) {
  modal2.style.display = "none";
  //window.location.reload();
}
if (event.target == modal3) {
    modal3.style.display = "none";
    //window.location.reload();
  }
  if (event.target == modal4) {
    modal4.style.display = "none";
    //window.location.reload();
  }
  if (event.target == modal5) {
    modal5.style.display = "none";
    //window.location.reload();
  }
  if (event.target == modal6) {
    modal6.style.display = "none";
    //window.location.reload();
  }
}





var modal6 = document.getElementsByClassName("card");














    $('#but').on('click', function(){
      
        document.getElementById("ffff").style.display='flex';

    });
    $('#but2').on('click', function(){
      
        document.getElementById("ffff2").style.display='flex';

    });
    $('#teach').on('change', function(){
      
        document.getElementById("to_be_hidden").style.display='flex';

    });
    
    
  




$('#type_time').on('change', function(){
   
        var dof = document.getElementById("sub").style.display='flex';

        var dof = document.getElementById("type_time").value;

        var l1 = document.getElementById("l1");
        var l2 = document.getElementById("l2");
        var l3 = document.getElementById("l3");
        var l4 = document.getElementById("l4");
        var l5 = document.getElementById("l5");
        var l6 = document.getElementById("l6");
        var l7 = document.getElementById("l7");
        var l8 = document.getElementById("l8");



        var t1 = document.getElementById("div_time1");
        var t2 = document.getElementById("div_time2");
        var t3 = document.getElementById("div_time3");
        var t4 = document.getElementById("div_time4");
        var t5 = document.getElementById("div_time5");
        var t6 = document.getElementById("div_time6");
        var t7 = document.getElementById("div_time7");
        var t8 = document.getElementById("div_time8");

        t1.style.display='none';
        t2.style.display='none';
        t3.style.display='none';
        t4.style.display='none';
        t5.style.display='none';
        t6.style.display='none';
        t7.style.display='none';
        t8.style.display='none';


        l1.style.display='none';
        l2.style.display='none';
        l3.style.display='none';
        l4.style.display='none';
        l5.style.display='none';
        l6.style.display='none';
        l7.style.display='none';
        l8.style.display='none';


        var k=Number(dof);
        for(i = 1; i <=k*2; i++){
            document.getElementById("appt"+i).setAttribute("required", "");
            document.getElementById("appt"+i).setAttribute("required", "");
        }

    if(dof=='1'){t1.style.display='flex';}
    if(dof=='2'){t1.style.display='flex';t2.style.display='flex';}
    if(dof=='3'){t1.style.display='flex';t2.style.display='flex';t3.style.display='flex';}
    if(dof=='4'){t1.style.display='flex';t2.style.display='flex';t3.style.display='flex';t4.style.display='flex';}
    if(dof=='5'){t1.style.display='flex';t2.style.display='flex';t3.style.display='flex';t4.style.display='flex';t5.style.display='flex';}
    if(dof=='6'){t1.style.display='flex';t2.style.display='flex';t3.style.display='flex';t4.style.display='flex';t5.style.display='flex';t6.style.display='flex';}
    if(dof=='7'){t1.style.display='flex';t2.style.display='flex';t3.style.display='flex';t4.style.display='flex';t5.style.display='flex';t6.style.display='flex';t7.style.display='flex';}
    if(dof=='8'){t1.style.display='flex';t2.style.display='flex';t3.style.display='flex';t4.style.display='flex';t5.style.display='flex';t6.style.display='flex';t7.style.display='flex';t8.style.display='flex';}




    if(dof=='1'){l1.style.display='flex';}
    if(dof=='2'){l1.style.display='flex';l2.style.display='flex';}
    if(dof=='3'){l1.style.display='flex';l2.style.display='flex';l3.style.display='flex';}
    if(dof=='4'){l1.style.display='flex';l2.style.display='flex';l3.style.display='flex';l4.style.display='flex';}
    if(dof=='5'){l1.style.display='flex';l2.style.display='flex';l3.style.display='flex';l4.style.display='flex';l5.style.display='flex';}
    if(dof=='6'){l1.style.display='flex';l2.style.display='flex';l3.style.display='flex';l4.style.display='flex';l5.style.display='flex';l6.style.display='flex';}
    if(dof=='7'){l1.style.display='flex';l2.style.display='flex';l3.style.display='flex';l4.style.display='flex';l5.style.display='flex';l6.style.display='flex';l7.style.display='flex';}
    if(dof=='8'){l1.style.display='flex';l2.style.display='flex';l3.style.display='flex';l4.style.display='flex';l5.style.display='flex';l6.style.display='flex';l7.style.display='flex';l8.style.display='flex';}

});
    



$('#lifespan2').on('change', function(){
  
if($(this).val()=='limited'){
 
$('#lifespan_date2').prop('disabled', false);
}else{
  
$('#lifespan_date2').prop('disabled', true); 
}
});








$(".del_grade").click(function(){
    
var mm=$(this).attr('id');

$('#delete1').attr('value',mm);
$('#del_grade_form').submit();

});

$(".del_dep").click(function(){
    
var mm=$(this).attr('id');


$('#delete2').attr('value',mm);
$('#del_dep_form').submit();    

});





$(".del_spec").click(function(){
    
var mm=$(this).attr('id').split('/')[0];
var mm2=$(this).attr('id').split('/')[1];



$('#delete3').attr('value',mm);

$('#delete4').attr('value',mm2);
$('#del_spec_form').submit();    
    
});





$("#gg").click(function(){
    
});

$("#dd").click(function(){
    
});

$("#ss").click(function(){
('ss');
});







$(".last_row_grade").click(function(){
    $(".modal_grade").css("display","block");  
    });

    $(".last_row_dep").click(function(){
        $(".modal_dep").css("display","block");  
});

$(".last_row_spec").click(function(){
 $(".modal_spec").css("display","block");  
 });



$(".last-row_add").click(function(){
  $("#form_add").slideToggle('medium');  

});


$(".p1").click(function(){



$("#"+$(this).attr('id')+'ff').slideToggle('medium');  




});



$(".p2").click(function(){
document.getElementById('disable').value=$(this).attr('id');
$('#dis_form').submit();
});
    

$(".p3").click(function(){
document.getElementById('delete').value=$(this).attr('id');
$('#del_form').submit();
});

$("#change_the_mode").click(function(){
  
  $("#some_some").value='ff';
  $("#mode_hidden_form").submit()
});



function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}



function openPage(pageName) {
        
    
    var i, tabcontent;
  tabcontent = document.getElementsByClassName("divdiv");
  tabcontent2 = document.getElementsByClassName("pointer");
  for (i = 0; i < tabcontent.length; i++) {
   
    tabcontent[i].style.display = "none";
    tabcontent2[i].style.backgroundColor   = "transparent";

    if(getCookie('mode')=='light'){
      tabcontent2[i].style.setProperty('color','black','important');

    }
  }
 
  document.getElementById(pageName).style.display = "block";
  document.getElementById(pageName[0]).style.backgroundColor  = "rgb(0,176,116)"; 

if(getCookie('mode')=='light'){
  document.getElementById(pageName[0]).style.setProperty('color','white','important');

    }
}



if(localStorage.getItem("tab")==null){
localStorage.setItem("tab", "users");
openPage(localStorage.getItem("tab"));
}else{
openPage(localStorage.getItem("tab"));
}



$("#u").click(function(){
localStorage.setItem("tab", "users");
openPage(localStorage.getItem("tab"));
});
    

$("#t").click(function(){
localStorage.setItem("tab", "time");
openPage(localStorage.getItem("tab"));
});




$("#e").click(function(){
localStorage.setItem("tab", "extras");
openPage(localStorage.getItem("tab"));
});



});