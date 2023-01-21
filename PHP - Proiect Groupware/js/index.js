var login=0;
var register=0;

//functions
function loginShow(){
    login=1;
        $(".login").fadeIn()
    .css({
    top: '100%',
    position: 'fixed'
    })
    .animate({
    top: '20%'
        }, 550, function() {
        /* ...callback... */
        });
}

function loginHide(){
    login=0;
     $(".login").fadeIn()
    .css({
    top: '20%',
    position: 'fixed'
    })
    .animate({
    top: '100%'
        }, 550, function() {
        /* ...callback... */
        });
}

function registerShow(){
    register=1;
        $(".register").fadeIn()
    .css({
    top: '100%',
    position: 'fixed'
    })
    .animate({
    top: '20%'
        }, 550, function() {
        /* ...callback... */
        });
}

function registerHide(){
    register=0;
     $(".register").fadeIn()
    .css({
    top: '20%',
    position: 'fixed'
    })
    .animate({
    top: '100%'
        }, 550, function() {
        /* ...callback... */
        });
    }

//callers
$(document).ready(function () {
    $(".login").hide();
    $(".register").hide();
    
    //Login animation
    $("#Login").click(function loginClick(){
    if(login==0){
        loginShow();
    }
    else{
        loginHide();
    }
    });
    
    //Register animation
    $("#Register").click(function registerClick(){
    if(register==0){
        registerShow();
    }
    else{
        registerHide();
    }
    });
});