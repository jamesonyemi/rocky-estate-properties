'use strict';

// $(document).ready(function() {
//     $('#dtable').DataTable({
//         "scrollY": "200px",
//         "scrollCollapse": true,
//         "paging": true,
//         "pagingType": "full_numbers"
//     });
// });

// $(document).ready(function() {
//     $('#datatable').DataTable({
//         "scrollY": "200px",
//         "scrollCollapse": true,
//         "paging": true,
//         "pagingType": "full_numbers",
//         initComplete: function() {
//             this.api().columns().every(function() {
//                 var column = this;
//                 var select = $('<select><option value=""></option></select>')
//                     .appendTo($(column.footer()).empty())
//                     .on('change', function() {
//                         var val = $.fn.dataTable.util.escapeRegex(
//                             $(this).val()
//                         );

//                         column
//                             .search(val ? '^' + val + '$' : '', true, false)
//                             .draw();
//                     });

//                 column.data().unique().sort().each(function(d, j) {
//                     select.append('<option value="' + d + '">' + d + '</option>')
//                 });
//             });
//         }
//     });
// });

$(document).ready(function() {
    var t = $('#datatable').DataTable( {
        "scrollY": "200px",
        "scrollCollapse": true,
        "paging": true,
        "pagingType": "full_numbers",
        
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );