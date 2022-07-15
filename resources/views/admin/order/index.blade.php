@extends('sb-admin.app')
@section('title', 'List Orders')
@section('orders', 'active')
@section('main', 'show')
@section('main-active', 'active')

@push('script')
    <script src="{{ asset('/vendor/admin_store/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/vendor/admin_store/datatables/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>
@endpush

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
@endpush
@section('content')

    <h1 class="text-grey">List Orders</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header mb-2">
                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>
                                Refresh</button>

                            {{-- <a href="#" class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i>
                                Filter</a> --}}
                        </div>
                    </div>
                </div>
                {{-- TABLE --}}
                <div class="box-body">
                    <div class="">
                        <table id="example1" style="overflow: scroll;"
                            class="table tbl-users table-responsive-sm table-hover table-bordered table-sm">
                            <thead class="table-dark">
                                <tr>
                                    <th width="100">Action</th>
                                    <th>Order ID</th>
                                    <th>Name</th>
                                    <th>User ID</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th>Courier</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $data)
                                <tr>
                                    <td>
                                        <div>
                                            <a href="/admin-foresell/list/toko//confirm"
                                                class="btn btn-danger btn-sm btn-hapus" id="delete"><i
                                                    class="fa fa-trash"></i></a>

                                            <a href="/admin-foresell/list/toko//show" class="btn btn-warning btn-sm btn-eye"
                                                id=""><i class="fa fa-eye"></i></a>

                                            {{-- <a href="#" class="btn btn-warning btn-sm btn-pen" id="btn-detail"><i
                                                        class="fa fa-pen"></i></a> --}}
                                        </div>
                                    </td>
                                    <td>#{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>#{{ $data->userId }}</td>
                                    <td>{{ $data->productName }}</td>
                                    <td>{{ $data->qty }}</td>
                                    <td>Rp {{ $data->total }}</td>
                                    @if ($data->status == "Proccessed")
                                        <td><span class="badge bg-primary">{{ $data->status }}</span></td>
                                    @elseif ($data->status == "Waiting")
                                        <td><a href="#" class="btn"><span id="update-status" class="badge bg-danger">{{ $data->status }}</span></a></td>
                                    @elseif ($data->status == "Already")
                                        <td><span class="badge bg-info">{{ $data->status }}</span></td>
                                    @elseif ($data->status == "Shipping")
                                        <td><span class="badge bg-warning">{{ $data->status }}</span></td>
                                    @else
                                        <td><span class="badge bg-success">{{ $data->status }}</span></td>
                                    @endif
                                    <td>{{ $data->paymentName }}</td>
                                    <td>{{ $data->courierName }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>{{ $data->dateOrder }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- MODAL --}}
    <div class="modal fade" id="update-status" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
        aria-hidden="true">
        <div class="modal-dialog modal-default modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Update Status</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="" method="post">

                    </form>


                </div>
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

            $('#update-status').click(function(e) {
                e.preventDefault();

                $('#update-status').modal();
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
                name: "Penjualan",
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
