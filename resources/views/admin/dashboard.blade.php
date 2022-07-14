@extends('sb-admin.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/pieChart.css') }}">
@endsection
@section('title', 'Dashboard')
@section('dashboard', 'active')


@section('content')
    <h1 class="gray">Dashboard</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Stores</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stores }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-solid fa-store fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CATEGORIES -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-solid fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- USER-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Users </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-solid fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PRODUCTS -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Products </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $products }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-solid fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 3D CHART --}}
    <div class="row">
        <div class="col-md-6">
            <figure class="highcharts-figure ">
                <div id="revenueMonth"></div>
                <p class="highcharts-description">

                </p>
            </figure>
        </div>

        {{-- PIE CHART --}}
        <div class="col-md-6 mt-3">
            <div id="piechart" style="height: 400px"></div>
        </div>

        {{-- <div class="col-md-3">
            <figure class="highcharts-figure2">
                <div id="container"></div>
                <p class="highcharts-description">
                    This pie chart shows how the chart legend can be used to provide
                    information about the individual slices.
                </p>
            </figure>
        </div> --}}
    </div>

    {{-- TOP PRODUCT --}}
    <div class="row mb-4">
        <div class="col-md-4 mr-3">
            <div class="card">
                <h5 class="card-header fw-bold">Top Product</h5>
                <div class="card-body overflow-auto" style=" height: 500px;">
                    @foreach ($topProduct as $tProduct)
                        <div class="row mb-5" style=" height: 70px;">
                            <div class="col-md-4 mb-3">
                                <img width="100px" height="100px"
                                    src="https://images.unsplash.com/photo-1644982649363-fae51da44eac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                    alt="">
                            </div>
                            <div class="col-md-5 mb-3 ">
                                <h5 class="text-dark fw-bold">{{ $tProduct->name }}</h5>
                                <p>Product ID #{{ $tProduct->id }}</p>
                            </div>
                            <div class="col-md-2 mb-3">
                                <span class="badge bg-success">{{ $tProduct->total }} Order</span>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- TOP Customer --}}
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header fw-bold">Top Customer</h5>
                <div class="card-body overflow-auto" style=" height: 500px;">
                    @foreach ($topUser as $tUser)
                        <div class="row mb-5" style=" height: 70px;">
                            <div class="col-md-4 mb-3">
                                <img width="80px" height="80px"
                                    src="https://images.unsplash.com/photo-1644982649363-fae51da44eac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                    alt="">
                            </div>
                            <div class="col-md-5 mb-3">
                                <h5 class="text-dark fw-bold">{{  $tUser->name }}</h5>
                                <p>Customer ID #{{ $tUser->id }}</p>
                            </div>
                            <div class="col-md-2 mb-3">
                                <span class="badge bg-success">{{ $tUser->total }} Order</span>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



@section('javascript')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Role', 'Total'],
                <?php echo $data ?>
            ]);

            var options = {
                title: 'Total User Based on Role'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
        // Highcharts.chart('container', {
        //     chart: {
        //         plotBackgroundColor: null,
        //         plotBorderWidth: null,
        //         plotShadow: false,
        //         type: 'pie'
        //     },
        //     title: {
        //         text: 'Browser market shares in January, 2018'
        //     },
        //     tooltip: {
        //         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        //     },
        //     accessibility: {
        //         point: {
        //             valueSuffix: '%'
        //         }
        //     },
        //     plotOptions: {
        //         pie: {
        //             allowPointSelect: true,
        //             cursor: 'pointer',
        //             dataLabels: {
        //                 enabled: false
        //             },
        //             showInLegend: true
        //         }
        //     },
        //     series: [{
        //         name: 'Brands',
        //         colorByPoint: true,
        //         data: [{
        //             name: 'Chrome',
        //             y: 61.41,

        //         }, {
        //             name: 'Internet Explorer',
        //             y: 11.84
        //         }, {
        //             name: 'Firefox',
        //             y: 10.85
        //         }, {
        //             name: 'Edge',
        //             y: 4.67
        //         }, {
        //             name: 'Safari',
        //             y: 4.18
        //         }, {
        //             name: 'Other',
        //             y: 7.05
        //         }]
        //     }]
        // });

        // 3D CHART
        const total = <?php echo json_encode($total); ?>;
        const bulan = <?php echo json_encode($bulan); ?>;

        const chart = new Highcharts.Chart({
            chart: {
                renderTo: 'revenueMonth',
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 0,
                    beta: 0,
                    depth: 50,
                    viewDistance: 25
                }
            },
            title: {
                text: 'Monthly Revenue of Foreshell'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: bulan,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Revenue (jt)'
                }
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            series: [{
                name: "Penjualan",
                data: total
            }]
        });

        // function showValues() {
        //     document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
        //     document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
        //     document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
        // }

        // Activate the sliders
        document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
            chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
            showValues();
            chart.redraw(false);
        }));

        showValues();
    </script>
@endsection

@endsection
