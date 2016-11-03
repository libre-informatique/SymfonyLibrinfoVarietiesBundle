$(document).ready(function(){

    $('*[inherit="source"]').change(function(){
        
        $.get('hierarchy/' + $(this).val(), function(data){
            
            $('*[inherit="target"]').each(function(key, input){
                var id = $(input).prop('id');
                var fieldName = id.substring(id.indexOf('_') + 1);
                
                $(input).val(data[fieldName]);
                
                if( $(input).prop('tagName') == 'SELECT' )
                    $(input).trigger('change');
            });
        });
    });
    
});