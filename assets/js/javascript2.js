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










    

    $(document).click(function(){
        $(".modal_res").hide(); 
       });
       












       
       $(document).on('click', '.modal_res',function(event) {
        event.stopImmediatePropagation();
        
    });
    
    

    var modal = document.getElementById("mymodal_res");


    





        window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            

           
              
              

            }
            

        }















    $(".table_cell").click(function(){

alert('gg');


    });

    $("#box1").click(function(){

        alert('gg');
        
        
            });
        






    $("#change_the_mode").click(function(){
        
        $("#some_some").value='ff';
        $("#mode_hidden_form").submit()
    });
    
    

/*

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }
      
      
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
    


      $("#ggmm").click(function(){
          alert('egeg');
        myFunction();
      });


*/



$(".refuse_btn").click(function(){
    var id = $(this).parent().parent().parent().attr('id');
    $(this).parent().parent().parent().remove();

     $.ajax({
        url: 'msg.php', 
        method: "POST",
        data:{'idid_refuse':id},
     success: function(data){
     }
    });  
});
    




    $(".accept_btn").click(function(){

        var id = $(this).parent().parent().parent().attr('id');
     
        $(this).parent().parent().parent().remove();

       // document.getElementById('accept_hidden').value=id;
        $.ajax({
            url: 'msg.php', 
            method: "POST",
            data:{'idid_accept':id},
            success: function(data){
            //console.log(data);
            }
        });  
       //document.getElementById('form_accept').submit()
   
   
       });
       
   
   




       $(".refuse_btn2").click(function(){

        var id = $(this).parent().parent().parent().attr('id');
        $(this).parent().parent().parent().remove();
    // document.getElementById('refuse_hidden').value=id;

     $.ajax({
        url: 'demande.php', 
        method: "POST",
        data:{'idid_refuse':id},
        success: function(data){
        //console.log(data);
        }
    });  

    //document.getElementById('form_refuse').submit()


    });
    




    $(".accept_btn2").click(function(){

        var id = $(this).parent().parent().parent().attr('id');
     
        $(this).parent().parent().parent().remove();

       // document.getElementById('accept_hidden').value=id;
        $.ajax({
            url: 'demande.php', 
            method: "POST",
            data:{'idid_accept':id},
            success: function(data){
            //console.log(data);
            }
        });  
       //document.getElementById('form_accept').submit()
   
   
       });
       
   
   








    $('.p-lg-3').on('click', function(){
        var gg = $(this).text();
     if(gg=="Save"){
        $('#this_form2').submit();}
    });
    



















/*
    document.getElementById("logout").onclick = function() {
        document.getElementById("yourFormId").submit();
    }
*/




   

    $(".trash").click(function(){

      $(this).parent().parent().parent().remove();
        

      
      $.ajax({
        url: 'php/delete_res.php', 
        method: "POST",
        data:{
            'date': $(this).parent().attr('id').split(' ')[1],
            'id':$(this).parent().attr('id').split(' ')[0],
        },
        success: function(data){
           // $(".my_res2").html(data);
        }
    });  


    });


/*

    $('.table-box').load('.to_update', function() {
        $('.table-cell').each(function(){
  
            if($(this).find('a').text()[0]=='A'){
           // alert($(this).text());
            $(this).css({"background-color":"coral"});
            }
            
            if($(this).find('a').text()[1]=='D'){
             // alert($(this).text());
             $(this).css({"background-color":"gold"});
            }
            
            if($(this).find('a').text()[1]=='P'){
             // alert($(this).text());
              $(this).css({"background-color":"raspberry"});
            }
            
            
             });
            
    });
 
*/











    $(".edit-btn").click(function(){


        
        $(".fieldset").prop( "disabled", false );
        var oo = $(this).text();
        if( oo == "Edit My Informations"){
            $(".fieldset").prop( "disabled", false );
            $(this).text( "Save");
            $(".namingo").focus();
        }else{
            $(".fieldset").prop( "disabled", true );
            $(this).text( "Edit My Informations");
        }

 

 

    
});


  


});