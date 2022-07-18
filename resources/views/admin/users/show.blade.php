@extends('sb-admin.app')
@section('title', 'User purchase statistics')
@section('users', 'active')
@section('main', 'show')
@section('main-active', 'active')


@section('content')

        {{-- 2022 --}}
        <div class="card mb-4">
            <!-- Card Header - Accordion -->
            <a href="#coll1" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="coll1">
                <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }}'s Monthly Purchase Statistics in 2022</h6>
            </a>
            <div class="collapse {{ !$total2022->isEmpty() ? 'show' : ' ' }}" id="coll1">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="revenue2022"></div>
                    </figure>
                </div>
            </div>
        </div>


        {{-- 2021 --}}
        <div class="card mb-4">
            <!-- Card Header - Accordion -->
            <a href="#coll2" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="coll2">
                <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }}'s Monthly Purchase Statistics in 2021</h6>
            </a>
            <div class="collapse {{ !$total2021->isEmpty() ? 'show' : ' ' }} " id="coll2">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="revenue2021"></div>
                    </figure>
                </div>
            </div>
        </div>


        {{-- 2020 --}}
        <div class="card mb-4">
            <!-- Card Header - Accordion -->
            <a href="#coll3" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="coll3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }}'s Monthly Purchase Statistics in 2020</h6>
            </a>
            <div class="collapse {{ !$total2020->isEmpty() ? 'show' : ' ' }}" id="coll3">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="revenue2020"></div>
                    </figure>
                </div>
            </div>
        </div>


        {{-- 2019 --}}
        <div class="card mb-4">
            <!-- Card Header - Accordion -->
            <a href="#coll4" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="coll4">
                <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }}'s Monthly Purchase Statistics in 2019</h6>
            </a>
            <div class="collapse {{ !$total2019->isEmpty() ? 'show' : ' ' }}" id="coll4">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="revenue2019"></div>
                    </figure>
                </div>
            </div>
        </div>



        {{-- 2018 --}}
        <div class="card mb-4">
            <!-- Card Header - Accordion -->
            <a href="#coll5" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="coll5">
                <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }}'s Monthly Purchase Statistics in 2018</h6>
            </a>
            <div class="collapse {{ !$total2018->isEmpty() ? 'show' : ' ' }} " id="coll5">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="revenue2018"></div>
                    </figure>
                </div>
            </div>
        </div>


        {{-- 2017 --}}
        <div class="card mb-4">
            <!-- Card Header - Accordion -->
            <a href="#coll6" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="coll6">
                <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }}'s Monthly Purchase Statistics in 2017</h6>
            </a>
            <div class="collapse {{ !$total2017->isEmpty() ? 'show' : ' ' }}" id="coll6">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="revenue2017"></div>
                    </figure>
                </div>
            </div>
        </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        // 3D CHART

        const total2017 = <?php echo json_encode($total2017); ?>;
        const bulan2017 = <?php echo json_encode($bulan2017); ?>;
        const total2018 = <?php echo json_encode($total2018); ?>;
        const bulan2018 = <?php echo json_encode($bulan2018); ?>;
        const total2019 = <?php echo json_encode($total2019); ?>;
        const bulan2019 = <?php echo json_encode($bulan2019); ?>;

        const total2020 = <?php echo json_encode($total2020); ?>;
        const bulan2020 = <?php echo json_encode($bulan2020); ?>;
        const total2021 = <?php echo json_encode($total2021); ?>;
        const bulan2021 = <?php echo json_encode($bulan2021); ?>;
        const total2022 = <?php echo json_encode($total2022); ?>;
        const bulan2022 = <?php echo json_encode($bulan2022); ?>;

        const name = <?php echo json_encode($name); ?>;
        // console.log("2017 = " + total2017);
        // console.log("2018 = " + total2018);
        // console.log("2019 = " + total2019);
        // console.log("2020 = " + total2020);
        // console.log("2021 = " + total2021);
        // console.log("2022 = " + total2022);

        // 2017
        const chart = new Highcharts.Chart({
            chart: {
                renderTo: 'revenue2017',
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
                text: '2017'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: bulan2017,
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
                data: total2017
            }]
        });

        //2018
        const chart2 = new Highcharts.Chart({
            chart: {
                renderTo: 'revenue2018',
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
                text: '2018'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: bulan2018,
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
                data: total2018
            }]
        });

        //2019
        const chart3 = new Highcharts.Chart({
            chart: {
                renderTo: 'revenue2019',
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
                text: '2019'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: bulan2019,
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
                data: total2019
            }]
        });

        // 2020
        const chart4 = new Highcharts.Chart({
            chart: {
                renderTo: 'revenue2020',
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
                text: '2020'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: bulan2020,
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
                data: total2020
            }]
        });

        // 2021
        const chart5 = new Highcharts.Chart({
            chart: {
                renderTo: 'revenue2021',
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
                text: '2021'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: bulan2021,
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
                data: total2021
            }]
        });

        // 2022
        const chart6 = new Highcharts.Chart({
            chart: {
                renderTo: 'revenue2022',
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
                text: '2022'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: bulan2022,
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
                data: total2022
            }]
        });
        // function showValues() {
        //     document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
        //     document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
        //     document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
        // }

        // // Activate the sliders
        // document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
        //     chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
        //     showValues();
        //     chart.redraw(false);
        // }));

        // showValues();
    </script>
@endsection
