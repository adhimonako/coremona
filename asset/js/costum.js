/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {
                $( ".datepicker" ).datepicker({
                        changeMonth: true,
                        changeYear: true,
                        yearRange: "-50:+10",
                        dateFormat: "dd-mm-yy"
                });
                $( "#tgl_lahir" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
        });