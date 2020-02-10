(function($){
$('.addPanier').click(function(event){

event.preventDefault();
$.get($(this).attr('href'),{},function(data){
if (data.error) {  
    alert(data.message);
}
else{
   if(confirm(data.message + ' . Voulez vous consulter votre facture ?'))
   {
       location.href = '../shop/contenuPanier.php';
   }else{
       $('#total').empty().append(data.count);
       $('#count').empty().append(data.total);
   }
}
},'json');
return false;

});

})(jQuery);





(function($){
    $('.addbill').click(function(event){
    
    event.preventDefault();
    $.get($(this).attr('href'),{},function(data){
    if (data.error) {  
        alert(data.message);
    }
    else{
       if(confirm(data.message + ' . Voulez vous consulter votre facture ?'))
       {
           location.href = '../shop/contenuPanier.php';
       }else{
           $('#total').empty().append(data.count);
           $('#count').empty().append(data.total);
       }
    }
    },'json');
    return false;
    
    });
    
    })(jQuery);
    


function changeBackground() {

var back = document.getElementsByClassName('primary-btn add-to-cart');
for (let i = 0; i < back.length; i++) {
   
    back[i].addEventListener('click', change);
    
    function change(){
        back[i].style.backgroundColor="#5cb85c";
        back[i].innerHTML="";
        back[i].innerHTML="<i class='fa fa-check'></i> déjà sur la facture";
        
        }
    
}
   
}

document.getElementById("droptoggle").addEventListener("click",function () {
    document.getElementById("basket").style.backgroundColor = "#101010";
});

/*var facture = document.getElementById('nomProduit');
var form = document.getElementById('typeFormulaire');
 if (facture.value == "Facture D'eau"){
     form.append('<div class="form-group"><input type="text" name="contract" placeholder="Numero de facture"></div>');
 }*/
 