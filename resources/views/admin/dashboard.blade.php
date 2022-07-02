@extends('sb-admin.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
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
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Revenue Month Chart 3d --}}
    <figure class="highcharts-figure">
        <div id="revenueMonth"></div>
        <p class="highcharts-description">
            Description
        </p>
        <div id="sliders">
            <table>
                <tbody>
                    <tr>
                        <td><label for="alpha">Alpha Angle</label></td>
                        <td><input id="alpha" type="range" min="0" max="45" value="0"> <span
                                id="alpha-value" class="value"></span></td>
                    </tr>
                    <tr>
                        <td><label for="beta">Beta Angle</label></td>
                        <td><input id="beta" type="range" min="-45" max="45" value="0"> <span
                                id="beta-value" class="value"></span></td>
                    </tr>
                    <tr>
                        <td><label for="depth">Depth</label></td>
                        <td><input id="depth" type="range" min="20" max="100" value="50"> <span
                                id="depth-value" class="value"></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </figure>

    {{-- category chart --}}
    <figure class="highcharts-figure">
        <div id="categoryChart"></div>
        <p class="highcharts-description">
            Description
        </p>
    </figure>

    {{-- TOP PRODUCT --}}
    <div class="row mb-4">
        <div class="col-md-4 mr-3">
            <div class="card">
                <h5 class="card-header fw-bold">Top Product</h5>
                <div class="card-body overflow-auto" style=" height: 500px;">
                    @php
                        $i = 1;
                    @endphp
                    @for ($i; $i < 11; $i++)
                        <div class="row mb-5" style=" height: 70px;">
                            <div class="col-md-5 mb-3">
                                <img width="100px" height="100px"
                                    src="https://images.unsplash.com/photo-1644982649363-fae51da44eac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                    alt="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5 class="text-dark">Oppo A50</h5>
                                <p>500 Order</p>
                            </div>
                        </div>
                        <hr>
                    @endfor
                </div>
            </div>
        </div>

        {{-- TOP Customer --}}
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header fw-bold">Top Customer</h5>
                <div class="card-body overflow-auto" style=" height: 500px;">
                    @php
                        $i = 1;
                    @endphp
                    @for ($i; $i < 11; $i++)
                        <div class="row mb-5" style=" height: 70px;">
                            <div class="col-md-4 mb-3">
                                <img width="80px" height="80px"
                                    src="https://images.unsplash.com/photo-1644982649363-fae51da44eac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                    alt="">
                            </div>
                            <div class="col-md-5 mb-3">
                                <h5 class="text-dark fw-bold">John Deo</h5>
                                <p>Customer ID #72632</p>
                            </div>
                            <div class="col-md-2 mb-3">
                                <span class="badge bg-success">400 Order</span>
                            </div>
                        </div>
                        <hr>
                    @endfor
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
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        Highcharts.chart('categoryChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Revenue of Categories'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Revenue (jt)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} jt</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Pakaian',
                data: [49.000, 71.000, 106.000, 129.000, 144.000, 176.000, 135.6000, 148.5000, 216.004,
                    194.1000, 95.600, 54.400
                ]

            }, {
                name: 'Rumah Tangga',
                data: [83.600, 78.800, 98.500, 93.004, 106.000, 84.500, 105.000, 104.300, 91.200, 83.500,
                    106.600, 92.300
                ]

            }, {
                name: 'Sweater',
                data: [48.900, 38.008, 39.300, 41.400, 47.000, 48.300, 59.000, 59.600, 52.400, 65.200,
                    59.300, 51.200
                ]

            }, {
                name: 'Gadget',
                data: [42.400, 33.200, 34.500, 39.700, 52.006, 75.500, 57.400, 60.400, 47.006, 39.100,
                    46.800, 51.100
                ]

            }]
        });

        // 3D CHART
        const chart = new Highcharts.Chart({
            chart: {
                renderTo: 'revenueMonth',
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 15,
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
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
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
                name : "Penjualan",
                data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
            }]
        });

        function showValues() {
            document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
            document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
            document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
        }

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
