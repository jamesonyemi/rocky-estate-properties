'use strict';
    jQuery(document).ready(function ()
    {
        jQuery('select[name="region"]').on('change', function(){
            var regionID = jQuery(this).val();
            if(regionID)
            {
                jQuery.ajax({
                    url : '/projects/create/'+regionID,
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

        // ====================DYNAMIC DROPDOWN FOR ONSITE INTERFACE===========================

        jQuery('select[name="clientid"]').on('change', function(){
            var clientId = jQuery(this).val();
            console.log('object :', clientId);
            if(clientId)
            {
                jQuery.ajax({
                    url : '/onsite-visit/create'+clientId,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                    console.log(data);
                    jQuery('select[name="pid"]').empty();
                    $('select[name="pid"]').append('<option value="">--select--</option>');
                    jQuery.each(data, function(key,value){
                        $('select[name="pid"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    }
                });
            }
            else
            {
                $('select[name="pid"]').empty();
            }
        });

// ====================END OF DYNAMIC DROPDOWN FOR ONSITE INTERFACE===========================

    });
