@extends('sb-admin.app')
@section('title', 'List Category')
@section('category', 'active')
@section('main', 'show')
@section('main-active', 'active')


@section('content')

    <h1 class="text-grey">Grafik Category {{ $categories->name }}</h1>

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

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        // 3D CHART

        const total = <?php echo json_encode($total) ?>;
        const bulan = <?php echo json_encode($bulan) ?>;
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
                text: 'Monthly Revenue of ' + name
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
