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
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
                </a>
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body" style="overflow-x: auto; overflow: scroll;">
                        <table id="example1" style="" class="table tbl-users table-responsive-sm table-hover table-bordered table-condensed table-sm bg-white">
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
                            <tbody class="">
                                @foreach ($orders as $data)
                                <tr>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            @if ($data->status == "Waiting")
                                            <form action="/admin-foresell/list/orders/{{ $data->id }}/update" method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="Already">
                                                <button type="submit" class="btn btn-dark btn-sm">Update</button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center">#{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td class="text-center">#{{ $data->userId }}</td>
                                    <td>{{ $data->productName }}</td>
                                    <td class="text-center">{{ $data->qty }}</td>
                                    <td>Rp {{ number_format($data->total, 0,",",".") }}</td>
                                    @if ($data->status == "Proccessed")
                                    <td class="text-center"><span class="badge bg-primary">{{ $data->status }}</span></td>
                                    @elseif ($data->status == "Waiting")
                                    <td class="text-center"><span class="badge bg-danger">{{ $data->status }}</span></td>
                                    @elseif ($data->status == "Already")
                                    <td class="text-center"><span class="badge bg-info">{{ $data->status }}</span></td>
                                    @elseif ($data->status == "Shipping")
                                    <td class="text-center"><span class="badge bg-warning">{{ $data->status }}</span></td>
                                    @else
                                    <td class="text-center"><span class="badge bg-success">{{ $data->status }}</span></td>
                                    @endif
                                    <td>{{ $data->paymentName }}</td>
                                    <td>{{ $data->courierName }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>
                                        <p class="fs-6">{{ $data->dateOrder }}</p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- MODAL --}}
<div class="modal fade" id="update-status" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
