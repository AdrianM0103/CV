var obiectivadd=0;
var obiectivdel=0;
var chglist=0;
var chgname=0;
var chgdescription=0;
function adaugaObiectivShow(){
    obiectivadd=1;
     $(".adaugaObiectiv").fadeIn()
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

function adaugaObiectivHide(){
    obiectivadd=0;
     $(".adaugaObiectiv").fadeIn()
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

function stergeObiectivShow(){
    obiectivdel=1;
     $(".stergeObiectiv").fadeIn()
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

function stergeObiectivHide(){
    obiectivdel=0;
     $(".stergeObiectiv").fadeIn()
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

function schimbaListaShow(){
    chglist=1;
     $(".schimbaLista").fadeIn()
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

function schimbaListaHide(){
    chglist=0;
     $(".schimbaLista").fadeIn()
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

function schimbaDescriereShow(){
    chgdescription=1;
     $(".schimbaDescriere").fadeIn()
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

function schimbaDescriereHide(){
    chgdescription=0;
     $(".schimbaDescriere").fadeIn()
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

function schimbaDenumireShow(){
    chgname=1;
     $(".schimbaDenumire").fadeIn()
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

function schimbaDenumireHide(){
    chgname=0;
     $(".schimbaDenumire").fadeIn()
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

var viewComentarii=0;
function viewComentariiShow(){
    viewComentarii=1;
     $(".listComentarii").fadeIn()
    .css({
    top: '100%',
    position: 'fixed'
    })
    .animate({
    top: '10%'
        }, 550, function() {
        /* ...callback... */
        });
}

function viewComentariiHide(){
    viewComentarii=0;
     $(".listComentarii").fadeIn()
    .css({
    top: '10%',
    position: 'fixed'
    })
    .animate({
    top: '100%'
        }, 550, function() {
        /* ...callback... */
        });
}

$(document).ready(function (){
    
    $(".adaugaObiectiv").hide();
    $(".stergeObiectiv").hide();
    $(".schimbaLista").hide();
    $(".schimbaDenumire").hide();
    $(".schimbaDescriere").hide();
    $(".listComentarii").hide();
    $(".obiectivul").click(function (){
        this.form.submit();
    })
    
    $("#addObiectiv").click(function() {
        adaugaObiectivShow();
    })
    
    $(".cancelAddObiectiv").click(function() {
        adaugaObiectivHide();
    })
    
    $("#delObiectiv").click(function() {
        stergeObiectivShow();
    })
    
    $(".cancelDelObiectiv").click(function() {
        stergeObiectivHide();
    })
    $("#chgName").click(function() {
        schimbaDenumireShow();
    })
    
    $(".cancelChgDenumire").click(function() {
        schimbaDenumireHide();
    })
    
    $("#chgList").click(function() {
        schimbaListaShow();
    })
    
    $(".cancelChgList").click(function() {
        schimbaListaHide();
    })
    
    $("#chgDescription").click(function() {
        schimbaDescriereShow();
    })
    
    $(".cancelChgDescriere").click(function() {
        schimbaDescriereHide();
    })
    
    $(".view-comentarii").click(function(){
        viewComentariiShow();
    })
    
    $(".close-comments").click(function(){
        viewComentariiHide();
    })
})