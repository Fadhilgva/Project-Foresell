@extends('sb-admin.app')
@section('title', 'List Category')
@section('category', 'active')
@section('main', 'show')
@section('main-active', 'active')


@section('content')

    <h1 class="text-grey">List Category</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                    <p>
                        <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>
                            Refresh</button>

                        <a href="#" class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i>
                            Filter</a>

                    </p>
                </div>
                {{-- TABLE --}}
                <div class="box-body">
                    <div class=" ">
                        <table class="table tbl-users table-responsive-sm table-hover table-bordered bg-white">
                            <thead class="table-dark">
                                <tr>
                                    <th width="100px">Action</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Total Pendapatan</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 5; $i++)
                                    <tr>
                                        <td>
                                            <div>
                                                <button href="#" class="btn btn-danger btn-sm btn-hapus"
                                                    id="delete"><i class="fa fa-trash"></i></button>

                                                <a href="#" class="btn btn-warning btn-sm btn-eye"
                                                    id="btn-detail"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </td>
                                        <td>gambar</td>
                                        <td>Elektronik</td>
                                        <td>17.000.000</td>
                                        <td>21 Maret 2020</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- MODAL --}}
    <div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
        aria-hidden="true">
        <div class="modal-dialog modal-default modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form role="form" action="#" method="get">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Dari Tanggal</label>
                                <input type="text" class="form-control datepicker" id="exampleInputEmail1"
                                    placeholder="Dari Tanggal" name="dari" autocomplete="off"
                                    value="{{ date('Y-m-d') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Sampai tanggal</label>
                                <input type="text" class="form-control datepicker" name="sampai"
                                    id="exampleInputPassword1" placeholder="dari tanggal" autocomplete="off"
                                    value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary ml-3 mb-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL CHART --}}
    <div class="modal fade p-2" id="modal-chart" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
        aria-hidden="true">
        <div class="modal-dialog modal-default modal-dialog-centered " role="document">
            <div class="modal-content">
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
                                        <span id="alpha-value" class="value"></span></td>
                                </tr>
                                <tr>
                                    <td><label for="beta">Beta Angle</label></td>
                                    <td><input id="beta" type="range" min="-45" max="45" value="0">
                                        <span id="beta-value" class="value"></span></td>
                                </tr>
                                <tr>
                                    <td><label for="depth">Depth</label></td>
                                    <td><input id="depth" type="range" min="20" max="100" value="50">
                                        <span id="depth-value" class="value"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
        $(document).ready(function() {

            // btn refresh
            $('.btn-refresh').click(function(e) {
                e.preventDefault();
                $('.preloader').fadeIn();
                location.reload();
            })

            $('.btn-filter').click(function(e) {
                e.preventDefault();

                $('#modal-filter').modal();
            })

            $('#btn-detail').click(function(e) {
                e.preventDefault();

                $('#modal-chart').modal();
            })
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
