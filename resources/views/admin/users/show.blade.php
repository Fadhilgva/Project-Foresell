@extends('sb-admin.app')
@section('title', 'User Statistic')
@section('users', 'active')
@section('main', 'show')
@section('main-active', 'active')


@section('content')

    {{-- 2022 --}}
    <div class="card mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="collapseCardExample">
            <h5 class="m-0 font-weight-bold text-primary">Grafik {{ $user->name }} 2022</h5>
        </a>
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
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
                                    <td><input id="alpha" type="range" min="0" max="45" value="0">
                                        <span id="alpha-value" class="value"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="beta">Beta Angle</label></td>
                                    <td><input id="beta" type="range" min="-45" max="45" value="0">
                                        <span id="beta-value" class="value"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="depth">Depth</label></td>
                                    <td><input id="depth" type="range" min="20" max="100" value="50">
                                        <span id="depth-value" class="value"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </figure>
            </div>
        </div>
    </div>

    {{-- 2021 --}}
    <div class="card mb-6">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="collapseCardExample2">
            <h5 class="m-0 font-weight-bold text-primary">Grafik {{ $user->name }} 2021</h5>
        </a>
        <div class="collapse show" id="collapseCardExample2">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="revenue2021"></div>
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

        const total2022 = <?php echo json_encode($total2022) ?>;
        const bulan2022 = <?php echo json_encode($bulan2022) ?>;
        const total2021 = <?php echo json_encode($total2021) ?>;
        const bulan2021 = <?php echo json_encode($bulan2021) ?>;

        const name = <?php echo json_encode($name) ?>;


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
                text: 'Total Order ' + name + ' ' + '2022'
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

        //2021
        const chart2 = new Highcharts.Chart({
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
                text: 'Total Order ' + name + ' ' + '2021'
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
    </script>
@endsection
