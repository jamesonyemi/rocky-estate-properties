@include('partials.client-portal.master_header')
<!-- Start -->
<div class="row" style="margin-top:100px;">
    <div class="col-lg-3 col-md-6">
        <div class="stats-card-box">
            <div class="icon-box">
                <i class="bx bx-map"></i>
            </div>
            <span class="sub-title">Location</span>
            <h6>{!! ucfirst($singleProject->location) !!}<span class="badge"></span></h6>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="stats-card-box">
            <div class="icon-box">
                <i class="bx bx-dollar"></i>
            </div>
            <span class="sub-title">Amount Spent</span>
            <h6>{!! ucfirst($pay) !!}<span class="badge"></span></h6>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stats-card-box">
            <div class="icon-box">
                <i class="bx bx-bar-chart-alt"></i>
            </div>
            <span class="sub-title">Project Status</span>
            <h6>{!! ucfirst($singleProject->status) !!}<span class="badge"></span></h6>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stats-card-box">
            <div class="icon-box">
                <i class="bx bx-briefcase-alt-2"></i>
            </div>
            <span class="sub-title">Project Title</span>
            @php
                function truncate($text, $chars = 20) {
                    if(strlen($text) > $chars) {
                        $text = $text.' ';
                        $text = substr($text, 0, $chars);
                        $text = substr($text, 0, strrpos($text ,' '));
                        $text = $text.'...';
                    }
                    return $text;
                }   
            @endphp
            <h6><span class="badge"></span>{!! truncate($singleProject->title) !!}</h6> 
        </div>
    </div>
</div>
@include('client_portal.my_projects.gallery_modal')
@include('client_portal.my_projects.payment_breakdown')
@include('partials.client-portal.footer')

<script>
// =======================My Projects======================================
$(document).ready(function() {
let cTable = $('table.clients').DataTable({
"scrollY": "200px",
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

// =======================My Projects======================================

</script>