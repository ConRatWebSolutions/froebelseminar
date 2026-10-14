$(document).ready(function($) { 

    $( "#showForm" ).click(function() {
        $( ".powermail_form_2" ).toggle();
        $( "#showForm" ).hide();
        
     });
     
     $( "#showsuche" ).click(function() {
            $( "#formular" ).toggle();
            
            if ($("#formular").is(":hidden") == true) {
                 $( "#searchbnt" ).removeClass("fa-search-minus");
                 $( "#searchbnt" ).addClass("fa-search-plus");
             
            }else{
                    $( "#searchbnt" ).removeClass("fa-search-plus");
                    $( "#searchbnt" ).addClass("fa-search-minus");
            }
           
     });    

});
          
