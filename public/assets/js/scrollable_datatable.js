'use strict';

$(document).ready(function() {
    $('#client-datatable').DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         true,
        "pagingType":     "full_numbers"
    });
});