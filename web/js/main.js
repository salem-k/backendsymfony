/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    $(document).ready(function(){
        if( $( "#appbundle_response_question" ).length )
            $('#appbundle_response_question option[value='+questionId+']').attr("selected", "selected");
        
        
        $("[data-toggle='collapse']").click(function(e) {
            var $this = $(this);
            var $icon = $this.find("i[class^='glyphicon']:first");

            if ($icon.hasClass('glyphicon glyphicon-arrow-down')) {
                $icon.removeClass('glyphicon glyphicon-arrow-down').addClass('glyphicon glyphicon-arrow-up');
            } else {
                $icon.removeClass('glyphicon glyphicon-arrow-up').addClass('glyphicon glyphicon-arrow-down');
            }
        });
        
        // Open/close the collapse panels based on history

        $('.collapse').on('hidden.bs.collapse', function () {
            localStorage.removeItem(this.id);
        });

        $('.collapse').on('shown.bs.collapse', function () {
            localStorage.setItem( this.id, true);
        });

        $('.collapse').each(function () {
            // Default close unless saved as open
            if ( localStorage.getItem(this.id) === true ) {
                $(this).collapse('show');
                $(this).addClass("in");
                
            }
        });

  
    });
});