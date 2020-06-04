'use strict';
jQuery(document).ready(function() {
    jQuery('select[name="rid"]').on('change', function() {
        var regionID = jQuery(this).val();
        if (regionID) {
            jQuery.ajax({
                url: '/admin-portal/projects/create/' + regionID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    jQuery('select[name="tid"]').empty();
                    $('select[name="tid"]').append('<option value="">--select--</option>');
                    jQuery.each(data, function(key, value) {
                        $('select[name="tid"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('select[name="tid"]').empty();
        }
    });


});