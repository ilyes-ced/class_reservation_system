$(document).ready(function(){


    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    



    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
    
    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });
    
    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });



    
if(er=='unactive'){
    $('#err2').css('display','block');
}else if(er=='pass' | er=='no_pass'){
$('#err1').css('display','block');
}




});