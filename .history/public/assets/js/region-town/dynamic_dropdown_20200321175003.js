'use strict';
    jQuery(document).ready(function ()
    {
        jQuery('select[name="region"]').on('change', function(){
            var regionID = jQuery(this).val();
            if(regionID)
            {
                jQuery.ajax({
                    url : '/admin-portal/projects/create/'+regionID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                    console.log(data);
                    jQuery('select[name="town"]').empty();
                    $('select[name="town"]').append('<option value="">--select--</option>');
                    jQuery.each(data, function(key,value){
                        $('select[name="town"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    }
                });
            }
            else
            {
                $('select[name="town"]').empty();
            }
        });

       
    });
