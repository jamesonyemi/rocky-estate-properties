'use strict';

$(document).ready(function() {
    $('#dtable').DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         true,
        "pagingType":     "full_numbers"
    });
});