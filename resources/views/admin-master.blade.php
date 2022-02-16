<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ url('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/sweetalert2.min.css') }}">
    {{-- sweet aleert css --}}
    <link rel="stylesheet" href="{{ url('assets/css/style-admin.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{ url('assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <title> Ecommerce Admin Dashboard </title>
   
</head>

<body>

    {{View::make('admin-header')}}
    {{View::make('admin-sidebar')}}
        @yield('dashboard')
        @yield('manage_products')
        @yield('manage-categories')
    {{View::make('admin-footer')}}

        <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ url('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{ url('assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    {{-- sweet alert js --}}
    <script src="{{ url('assets/js/sweetalert2.min.js')}}"></script>
    {{-- chart js --}}
    <script src="{{ url('assets/js/chart.js')}}"></script>
     <!-- main js -->
     <script src="{{ url('assets/js/main-js.js')}}"></script>
    <!-- chart chartist js -->
    <script src="{{ url('assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
    <!-- sparkline js -->
    <script src="{{ url('assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <!-- morris js -->
    <script src="{{ url('assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{ url('assets/vendor/charts/morris-bundle/morris.js')}}"></script>
    <!-- chart c3 js -->
    <script src="{{ url('assets/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{ url('assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{ url('assets/vendor/charts/c3charts/C3chartjs.js')}}"></script>
    <script src="{{ url('assets/libs/js/dashboard-ecommerce.js')}}"></script>
    <script>
        // chart js implementation
        var record = JSON.parse(`<?php echo $chart_data; ?>`);
        console.log(record)
        const labels = record.label;
        
          const data = {
            labels: labels,
            datasets: [{
              label: 'Customers Orders Chart',
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: record.data,
            }]
          };
        
          const config = {
            type: 'line',
            data: data,
            options: {
                maintainAspectRatio: false,
                responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Last Tow Months Orders -  Day Wise Count",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
            }
          };
    
        //   instantiation
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
          );
        //   myChart.height(400);
    </script>
</body>
 
</html>