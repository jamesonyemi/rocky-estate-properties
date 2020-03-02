<!-- Start Footer -->
<div class="flex-grow-1"></div>
<!-- Start Footer -->
<footer class="footer-area">
    <div class="row align-items-center">
        <div class="col-lg-6 col-sm-6 col-md-6">
            <p>Copyright <i class='bx bx-copyright'></i> {{ date("Y")}} <a href="#">Olaf</a>. All rights reserved</p>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 text-right">
            <p>Designed by ❤️ <a href="#" >EnvyTheme</a></p>
        </div>
    </div>
</footer>
<!-- End Footer -->
        </div>
        <!-- End Main Content Wrapper -->

        <!-- Vendors Min JS -->
<script src="{{ asset('assets/js/vendors.min.js') }}"></script>

<!-- ApexCharts JS -->
<script src="{{ asset('assets/js/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts/apexcharts-stock-prices.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts/apexcharts-irregular-data-series.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts/apex-custom-line-chart.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts/apex-custom-pie-donut-chart.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts/apex-custom-area-charts.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts/apex-custom-column-chart.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts/apex-custom-bar-charts.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts/apex-custom-mixed-charts.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts/apex-custom-radialbar-charts.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts/apex-custom-radar-chart.js') }}"></script>

<!-- ChartJS -->
<script src="{{ asset('assets/js/chartjs/chartjs.min.js')}}"></script>
<!-- When the url is charts/chartjs then load the library -->

<!-- To use template colors with Javascript -->
<div class="chartjs-colors">
    <div class="bg-primary"></div>
    <div class="bg-primary-light"></div>
    <div class="bg-secondary"></div>
    <div class="bg-info"></div>
    <div class="bg-success"></div>
    <div class="bg-success-light"></div>
    <div class="bg-danger"></div>
    <div class="bg-warning"></div>
    <div class="bg-purple"></div>
    <div class="bg-pink"></div>
</div>

<!-- jvectormap Min JS -->
<script src="{{ asset('assets/js/jvectormap-1.2.2.min.js') }}"></script>
<!-- jvectormap World Mill JS -->
<script src="{{ asset('assets/js/jvectormap-world-mill-en.js') }}"></script>

<!-- When the url is pages/maps then load the library -->

<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{asset('assets/js/jquery-3.3.1.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/scrollable_datatable.js')}}" type="text/javascript"></script>

<!-- Required datatable js -->
<script src=" {{ asset('custom_assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src=" {{ asset('custom_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src=" {{ asset('custom_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src=" {{ asset('custom_assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src=" {{ asset('custom_assets/libs/jszip/jszip.min.js') }}"></script>
<script src=" {{ asset('custom_assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src=" {{ asset('custom_assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src=" {{ asset('custom_assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src=" {{ asset('custom_assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src=" {{ asset('custom_assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src=" {{ asset('custom_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src=" {{ asset('custom_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src=" {{ asset('custom_assets/js/pages/datatables.init.js') }}"></script>

<script>
    $(document).ready(function() {
      let cTable = $('table.my-projects').DataTable({
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
    
    </script>
</body>
</html>