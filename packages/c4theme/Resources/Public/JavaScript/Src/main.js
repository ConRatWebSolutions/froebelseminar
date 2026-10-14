// Moderne jQuery 3.7.1 Kompatibilität
(function($) {
    'use strict';
    
    // Warten bis DOM bereit ist
    $(document).ready(function() {
        console.log('jQuery 3.7.1 geladen und bereit');
        
        // Debug: Prüfen ob Elemente existieren
        console.log('Button #new gefunden:', $( "#new" ).length);
        console.log('Form #form gefunden:', $( "#form" ).length);
        console.log('Alle Elemente mit ID "new":', $('[id="new"]').length);
        console.log('Alle Elemente mit ID "form":', $('[id="form"]').length);
        
        // Problem: Mehrere Elemente mit gleicher ID - das ist ein HTML-Fehler!
        if ($('[id="form"]').length > 1) {
            console.warn('WARNUNG: Es gibt mehrere Elemente mit der ID "form"! Das ist ein HTML-Validierungsfehler!');
            $('[id="form"]').each(function(index) {
                console.log('Form-Element ' + index + ':', this);
                console.log('Form-Element ' + index + ' HTML:', this.outerHTML);
            });
        }
    
    $( "#other" ).click(function() {

                    var b = $("#email").val();
                                   if(b == ""){  $("#usermail").addClass( "has-error" );}else{$("#usermail").removeClass( "has-error" );}
                                  var c = $("#name").val();
                                    if(c == ""){  $("#username").addClass( "has-error" );} else{$("#username").removeClass( "has-error" );}
                    var d = $("#vorname").val();
                                    if(d == ""){  $("#uservorname").addClass( "has-error" );} else{$("#uservorname").removeClass( "has-error" );}
                   
                    var f = $( "#anrede" ).val();
              var g = $('input:checkbox[name=checkme]').is(':checked');
              var x = '';  
              if( g ==  false ){ $("#checks").addClass( "has-error" ); x = ''; } else{$("#checks").removeClass( "has-error" );   x = '1'; }
                
                    if( b && c && d && x  ){
     
     
                    var xmlHttp = null;
                         // Mozilla, Opera, Safari sowie Internet Explorer 7
                         if (typeof XMLHttpRequest != 'undefined') {
                           xmlHttp = new XMLHttpRequest();
                         }
                         if (!xmlHttp) {
                           // Internet Explorer 6 und älter
                           try {
                             xmlHttp  = new ActiveXObject("Msxml2.XMLHTTP");
                           } catch(e) {
                             try {
                               xmlHttp  = new ActiveXObject("Microsoft.XMLHTTP");
                             } catch(e) {
                               xmlHttp  = null;
                             }
                           }
                         }
                         // Wenn das Objekt erfolgreich erzeugt wurde      
                         if (xmlHttp) {
     
                            
                               
                           var url = "/newsletterAPI.php";
                           var params =     "email="+b+"&name="+c+"&vorname="+d+"&anrede="+f;
                           
                                                 
     
                           xmlHttp.open("POST", url, true);
                           
                           //Headerinformationen für den POST Request
                           xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                           //xmlHttp.setRequestHeader("Content-length", params.length);
                           //xmlHttp.setRequestHeader("Connection", "close");          
                         
                           xmlHttp.onreadystatechange = function () {
                             if (xmlHttp.readyState == 4) {
                                
                               document.getElementById("infoContainer").innerHTML = xmlHttp.responseText;
                               
                               $( "#infoContainer" ).show();
                               $( "#myform" ).hide();
                               
                             }
                           };        
                           xmlHttp.send(params);
                         }      
                        
                    }else{
                      
                      
                     $("#other").html("bitte alle Felder ausfüllen");
                    }
         
                   });



$( "#showForm" ).click(function() {
  $( ".powermail_form_2" ).show();
  $( "#showForm" ).hide();
  
});

$( "#showsuche" ).click(function() {
       
      
      if ($("#formulara").is(":hidden") == true) {
           $( "#searchbnt" ).removeClass("fa-search-minus");
           $( "#searchbnt" ).addClass("fa-search-plus");
           $( "#formulara" ).show();
       
      }else{
            $( "#searchbnt" ).removeClass("fa-search-plus");
            $( "#searchbnt" ).addClass("fa-search-minus");
            $( "#formulara" ).hide();
      }
     

    });
    
    // Event-Handler für #new Button (direkt)
    $( "#new" ).on('click', function() {
        console.log('Button #new wurde geklickt!');
        
        // Intelligente Lösung für mehrere Form-Elemente
        var $forms = $('[id="form"]');
        console.log('Form-Elemente gefunden:', $forms.length);
        
        if ($forms.length > 0) {
            // Alle Form-Elemente anzeigen (da es mehrere gibt)
            $forms.each(function(index) {
                var $form = $(this);
                console.log('Form-Element ' + index + ' aktueller Status:', $form.css('display'));
                
                // Mehrere Methoden zum Anzeigen
                $form.show();
                $form.css('display', 'block');
                $form.attr('style', 'display: block !important');
                
                console.log('Form-Element ' + index + ' nach show():', $form.css('display'));
                console.log('Form-Element ' + index + ' sichtbar:', $form.is(':visible'));
            });
            
            // Button verstecken
            $( "#new" ).hide();
        } else {
            console.error('Keine Form-Elemente gefunden!');
        }
    });
    
    // Alternative: Event-Delegation (falls Element dynamisch geladen wird)
    $(document).on('click', '#new', function() {
        console.log('Button #new wurde geklickt (Event-Delegation)!');
        
        // Problem: Es gibt 2 Elemente mit ID "form" - das ist ein HTML-Fehler!
        var $forms = $( "#form" );
        console.log('Anzahl Form-Elemente gefunden:', $forms.length);
        
        if ($forms.length > 0) {
            // Alle Form-Elemente anzeigen
            $forms.each(function(index) {
                var $form = $(this);
                console.log('Form-Element ' + index + ':', this);
                
                // Detaillierte CSS-Analyse
                console.log('Form-Element ' + index + ' CSS-Analyse:');
                console.log('  - display:', $form.css('display'));
                console.log('  - visibility:', $form.css('visibility'));
                console.log('  - opacity:', $form.css('opacity'));
                console.log('  - position:', $form.css('position'));
                console.log('  - left:', $form.css('left'));
                console.log('  - top:', $form.css('top'));
                console.log('  - width:', $form.css('width'));
                console.log('  - height:', $form.css('height'));
                console.log('  - z-index:', $form.css('z-index'));
                console.log('  - overflow:', $form.css('overflow'));
                
                // Alle möglichen Versteck-Methoden entfernen
                $form.attr('style', 'display: block !important; visibility: visible !important; opacity: 1 !important; position: relative !important; left: auto !important; top: auto !important; width: auto !important; height: auto !important; z-index: 9999 !important; overflow: visible !important;');
                
                // Alternative: Element an den Anfang des Body verschieben
                $form.appendTo('body');
                
                // Alternative: Element nach dem Button einfügen
                $form.insertAfter('#new');
                
                // Visuell hervorheben mit auffälligen Farben
                $form.css({
                    'background-color': 'yellow !important',
                    'border': '5px solid red !important',
                    'padding': '20px !important',
                    'margin': '20px !important',
                    'font-size': '20px !important',
                    'color': 'black !important'
                });
                
                console.log('Form-Element ' + index + ' vollständig sichtbar gemacht, repositioniert und hervorgehoben');
            });
            
            $( "#new" ).hide();
            console.log('Alle Form-Elemente über Event-Delegation angezeigt');
        }
    });
    



    $("body").on("click", "#but_upload", function(){  

   
       var fd = new FormData();
       var files = $('#file')[0].files[0];
       fd.append('file',files);
   fd.append('uid',$('#uploaduid').val());
   fd.append('table',$('#uploadtable').val());
   fd.append('tablefield',$('#uploadtablefield').val());
       $.ajax({
           url: 'typo3conf/ext/cr_traegertreffen/Classes/Controller/upload.php',
           type: 'post',
           data: fd,
           contentType: false,
           processData: false,
           success: function(response){
               if(response != 0){
                   $("#img").attr("src",response); 
                   
                   $("#logourl").val(response);
                   $(".preview").show();
                   $(".preview img").show(); // Display image element
                   
                   
               }else{
                   alert('file not uploaded');
               }
           },
       });
   });


$( ".filter" ).click(function() {
  var x = $(this).data("filter");
   
    $(".mix").hide();
   if(x == 'all'){
           $(".mix").show();
   }else{
       $(".mixitup"+x).show();
   }
    
   
    });
    
    // Mobile Menu Toggle Funktionalität
    // Hamburger-Menü Toggle
    $('.navbar-toggle').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var target = $(this).data('target');
        var $target = $(target);
        
        console.log('Hamburger-Menü geklickt, Target:', target);
        console.log('Target-Element gefunden:', $target.length);
        console.log('Aktuelle Klassen vor Toggle:', $target.attr('class'));
        
        if ($target.length) {
            // Prüfe aktuellen Status
            var isOpen = $target.hasClass('in');
            
            if (isOpen) {
                // Menü schließen
                $target.removeClass('in').addClass('collapse');
                $target.hide();
                console.log('Menü geschlossen');
            } else {
                // Menü öffnen
                $target.removeClass('collapse').addClass('in');
                $target.show();
                console.log('Menü geöffnet');
            }
            
            console.log('Klassen nach Toggle:', $target.attr('class'));
            console.log('Display-Style nach Toggle:', $target.css('display'));
            console.log('Menü-Status nach Toggle:', $target.hasClass('in') ? 'geöffnet' : 'geschlossen');
        }
    });
    
    // Mobile Dropdown Toggle für Submenüs (nur im Hauptmenü)
    $(document).on('click', '.navbar-collapse .dropdown-toggle', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var $this = $(this);
        var $parent = $this.parent();
        var $dropdown = $parent.find('.dropdown-menu');
        
        console.log('Hauptmenü Dropdown-Toggle geklickt:', $this.text());
        console.log('Parent-Element:', $parent);
        console.log('Dropdown-Menü gefunden:', $dropdown.length);
        
        // Schließe alle anderen offenen Dropdowns im Hauptmenü
        $('.navbar-collapse .dropdown').not($parent).removeClass('open');
        $('.navbar-collapse .dropdown-menu').not($dropdown).hide();
        
        // Toggle aktuelles Dropdown
        $parent.toggleClass('open');
        
        if ($parent.hasClass('open')) {
            $dropdown.show();
            console.log('Hauptmenü Dropdown geöffnet');
        } else {
            $dropdown.hide();
            console.log('Hauptmenü Dropdown geschlossen');
        }
    });
    
    // Schließe Hauptmenü bei Klick außerhalb
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.navbar').length) {
            $('.navbar-collapse').removeClass('in').addClass('collapse').hide();
            $('.navbar-collapse .dropdown').removeClass('open');
            $('.navbar-collapse .dropdown-menu').hide();
        }
    });
    
    // Schließe Hauptmenü bei Klick auf Menü-Link (außer Dropdown-Toggle)
    $('.navbar-collapse a:not(.dropdown-toggle)').on('click', function() {
        $('.navbar-collapse').removeClass('in').addClass('collapse').hide();
        $('.navbar-collapse .dropdown').removeClass('open');
        $('.navbar-collapse .dropdown-menu').hide();
    });
    
    // Responsive Verhalten - Desktop vs Mobile
    function handleResponsiveMenu() {
        var windowWidth = $(window).width();
        
        if (windowWidth >= 768) {
            // Desktop: Hauptmenü immer sichtbar, Dropdowns auf Hover
            $('.navbar-collapse').removeClass('collapse').addClass('in').show();
            $('.navbar-collapse .dropdown').removeClass('open');
            $('.navbar-collapse .dropdown-menu').hide();
        } else {
            // Mobile: Hauptmenü standardmäßig versteckt
            if (!$('.navbar-collapse').hasClass('in')) {
                $('.navbar-collapse').addClass('collapse').removeClass('in').hide();
            }
        }
    }
    
    // Initiale Prüfung
    handleResponsiveMenu();
    
    // Bei Fenster-Resize
    $(window).on('resize', function() {
        handleResponsiveMenu();
    });
    
    // Header-Top Dropdown Funktionalität (Bootstrap-Ersatz)
    $('.header-top-dropdown .dropdown-toggle').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var $this = $(this);
        var $parent = $this.closest('.dropdown');
        var $dropdown = $parent.find('.dropdown-menu');
        
        console.log('Header-Top Dropdown geklickt:', $this.text());
        console.log('Parent-Element:', $parent);
        console.log('Dropdown-Menü gefunden:', $dropdown.length);
        
        // Schließe alle anderen offenen Header-Top Dropdowns
        $('.header-top-dropdown .dropdown').not($parent).removeClass('open');
        $('.header-top-dropdown .dropdown-menu').not($dropdown).hide();
        
        // Toggle aktuelles Dropdown
        $parent.toggleClass('open');
        
        if ($parent.hasClass('open')) {
            $dropdown.show();
            console.log('Header-Top Dropdown geöffnet');
        } else {
            $dropdown.hide();
            console.log('Header-Top Dropdown geschlossen');
        }
    });
    
    // Schließe Header-Top Dropdowns bei Klick außerhalb
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.header-top-dropdown').length) {
            $('.header-top-dropdown .dropdown').removeClass('open');
            $('.header-top-dropdown .dropdown-menu').hide();
        }
    });
    
    // Schließe Header-Top Dropdowns bei Klick auf Link
    $('.header-top-dropdown .dropdown-menu a').on('click', function() {
        $('.header-top-dropdown .dropdown').removeClass('open');
        $('.header-top-dropdown .dropdown-menu').hide();
    });
    
    }); // End of $(document).ready()
    
})(jQuery); // End of IIFE

