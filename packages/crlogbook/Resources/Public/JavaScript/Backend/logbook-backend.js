/**
 * Backend JavaScript für Logbook-Modul
 */
(function() {
    'use strict';

    function printer() {
        console.log("printer");
        var divToPrint = document.getElementById('printtables');
        if (divToPrint) {
            var newWin = window.open("", "_blank");
            newWin.document.write('<!DOCTYPE html><html><head><title>Fahrtenbuch Druckansicht</title>');
            newWin.document.write('<style>body{font-family:Arial,sans-serif;margin:20px;} a{color:#000;text-decoration:none} table{margin:15px;border-collapse:collapse;width:100%} table td,table th{border:1px solid #000;padding:8px;text-align:left} .table-info{font-weight:bold;background-color:#f0f0f0} .table-info td{padding:8px}</style>');
            newWin.document.write('</head><body>');
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write('</body></html>');
            newWin.document.close();
            newWin.focus();
            newWin.print();
        }
    }
    
    function myFunction() {
        console.log("myFunction");
        var form = document.getElementById("myform");
        if (form) {
            form.submit();
        }
    }
    
    // Event-Listener für bessere Kompatibilität
    document.addEventListener('DOMContentLoaded', function() {
        var selectWeek = document.getElementById('select');
        var selectYear = document.getElementById('selecty');
        var printButton = document.getElementById('print-button');
        
        if (selectWeek) {
            selectWeek.addEventListener('change', myFunction);
        }
        if (selectYear) {
            selectYear.addEventListener('change', myFunction);
        }
        if (printButton) {
            printButton.addEventListener('click', function(e) {
                e.preventDefault();
                printer();
            });
        }
    });

    // Globale Funktionen für Inline-Event-Handler
    window.printer = printer;
    window.myFunction = myFunction;
})();
