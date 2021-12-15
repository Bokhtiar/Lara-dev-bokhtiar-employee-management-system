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
        <h3 class="breadcrumb-header">List of Employee Table</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Employee Table</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table id="example" class="display table " style="width: 100%; cellspacing: 0;">
                            <thead class="">
                                <tr>
                                    <th>Index</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Job ID</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Salary</th>
                                    <th>Join Date</th>
                                    <th>EM</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Index</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Job ID</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Salary</th>
                                    <th>Join Date</th>
                                    <th>EM</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($employees as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        @php
                                        $image=json_decode($item->emp_image);
                                        @endphp

                                        @if(empty($image))
                                            <td>Image Not Selected</td>
                                        @else
                                            <td><img src="{{asset($image[0])}}" height="60px" width="60px" alt=""> </td>
                                        @endif
                                        <td>{{ $item->emp_name }}</td>
                                        <td>{{ $item->job_id }}</td>
                                        <td>{{ $item->emp_email }}</td>
                                        <td>{{ $item->emp_phone }}</td>
                                        <td>{{ $item->department_id }}</td>
                                        <td>{{ $item->designation_id }}</td>
                                        <td>{{ $item->emp_salary }}</td>
                                        <td>{{ $item->join_date }}</td>
                                        <td>{{ $item->emp_em }}</td>
                                        <td>
                                            @if($item->status == 1)
                                            <a type="button" href="@route('employee.status', $item->emp_id)" class="btn btn-success btn-addon btn-sm"><i class="fa fa-spin fa-refresh"></i>  Success</a>
                                            @else
                                            <a type="button" href="@route('employee.status', $item->emp_id)"  class="btn btn-warning btn-addon btn-sm"><i class="fa fa-remove" aria-hidden="true"></i> Pending</a>
                                            @endif
                                        </td>
                                        <td class="form-inline">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-4 col-lg-3 col-4">
                                                    <a class="btn btn-info btn-sm" href="@route('employee.edit', $item->emp_id)"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                </div>
                                                <div class="col-md-3 col-sm-4 col-lg-3 col-4">
                                                    <form class="" method="POST" action="@route('employee.destroy', $item->emp_id)">
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

