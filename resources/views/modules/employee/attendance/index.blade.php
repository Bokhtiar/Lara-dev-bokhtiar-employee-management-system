@extends('layouts.admin.app')
@section('title', 'Employee')
@section('admin_content')

@section('css')
<link href="{{ asset('backend') }}/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('backend') }}/assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('backend') }}/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
<!-- Theme Styles -->
@endsection
<x-notification></x-notification>
<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">List of Employee Attendace</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Employee Attendace Table</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table id="example" class="display table " style="width: 100%; cellspacing: 0;">
                            <thead class="text-center">
                                <tr>
                                    <th>Index</th>
                                    <th>Name</th>
                                    <th>IN-Time</th>
                                    <th>OUT-Time</th>
                                    <th>Address</th>
                                    <th>EM</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Index</th>
                                    <th>Name</th>
                                    <th>IN-Time</th>
                                    <th>OUT-Time</th>
                                    <th>Address</th>
                                    <th>EM</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($attendances as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->emp ? $item->emp->emp_name : 'Data Not Found'}}</td>
                                        <td>{{ $item->in }}</td>
                                        <td>{{ $item->out }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->em }}</td>
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
</div><!-- /Page Inner -->
@section('js')
    {{-- <script src="{{ asset('backend') }}/assets/plugins/datatables/js/jquery.datatables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/table-data.js"></script> --}}
@endsection

@endsection

