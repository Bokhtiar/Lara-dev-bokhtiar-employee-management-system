
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
        <h3 class="breadcrumb-header">List of Employee Salary Table</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Employee Salary Table</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table id="example" class="display table " style="width: 100%; cellspacing: 0;">
                            <thead class="text-center">
                                <tr>
                                    <th>Index</th>
                                    <th>Name</th>
                                    <th>Job ID</th>
                                    <th>Salary</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Index</th>
                                    <th>Name</th>
                                    <th>Job ID</th>
                                    <th>Salary</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($salaries as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->emp? $item->emp->emp_name :'Data Deleted'}}</td>
                                        <td>{{ $item->emp? $item->emp->job_id : 'Data Deleted' }}</td>
                                        <td>{{ $item->emp? $item->emp->emp_salary : 'Data Deleted' }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                            @if($item->status == 1)
                                            <a type="button" href="@route('salary.status', $item->salary_id)" class="btn btn-success btn-addon btn-sm"><i class="fa fa-spin fa-refresh"></i>  Success</a>
                                            @else
                                            <a type="button" href="@route('salary.status', $item->salary_id)"  class="btn btn-warning btn-addon btn-sm"><i class="fa fa-remove" aria-hidden="true"></i> Pending</a>
                                            @endif
                                        </td>
                                        <td class="form-inline">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-4 col-lg-3 col-4">
                                                    <form class="" method="POST" action="@route('salary.destroy', $item->salary_id)">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-remove" aria-hidden="true"></i></button>
                                                    </form>
                                                </div>
                                            </div>
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
</div><!-- /Page Inner -->
@section('js')
    {{-- <script src="{{ asset('backend') }}/assets/plugins/datatables/js/jquery.datatables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/table-data.js"></script> --}}
@endsection

@endsection

