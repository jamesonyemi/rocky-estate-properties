'use strict';

// =======================Client Pages======================================


$(document).ready( function () {
    let table = $('table.project').DataTable({
        "scrollY": "200px",
        "scrollCollapse": true,
        "paging": true,
        "info": false,
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": $('td#project_id')
        } ],
        "order": [[ 1, 'asc' ]],

      initComplete: function () {
                    let column = this.api().column($('td#status'));
                    let select = $('<select class="form-control custom-select col-sm-2" style="margin-bottom:15px;"><option value="" >--select--</option></select>')
                      .appendTo( $('#filter_status').empty().text('Status: ') )
                      .on( 'change', function () {
                          let val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );
                    column
                      .search( val ? '^'+val+'$' : '', true, false )
                      .draw();
                        
                    } );
                    column.data().unique().sort().each( function ( d, j ) {
                      select.append('<option value="'+d+'">'+d+'</option>' );
                    } );                 
                  }
    });

    table.on( 'order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
  
    //   $('input.age_filter').on( 'keyup', function () {
    //       table.column(3).search( this.value ).order( [ 0, 'asc' ] ).draw();
    //   } );
    
  });

// =======================Project Pages======================================



// =======================Client Pages======================================

  
$(document).ready(function() {
  let cTable = $('table.client').DataTable({
        "scrollY": "100px",
        "scrollCollapse": true,
        "paging": true,
        "info": false,
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": $('td#client_ids')
        } ],
        "order": [[ 1, 'asc' ]],
  });

  cTable.on( 'order.dt search.dt', function () {
    cTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();
  
} );

// =======================Client Pages======================================



// ======================= Stage-Of-Completion Pages======================================
  
$(document).ready(function() {
  $('table.display').DataTable({
        "scrollY": "100px",
        "scrollCollapse": true,
        "paging": true,
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            // "targets": $('td#project_id')
        } ],
        "order": [[ 1, 'asc' ]],
  });
  
} );

// ========================Stage-Of-Completion Pages===========================================
