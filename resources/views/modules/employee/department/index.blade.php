@extends('layouts.admin.app')
@section('admin_content')
@section('title', 'Departments')

{{-- @section('css')
<link href="{{ asset('backend') }}/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('backend') }}/assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('backend') }}/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
<!-- Theme Styles -->
@endsection --}}
<x-notification></x-notification>
<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">List Of Department Table</h3>
    </div>
    <div class="row">
        <div class="col-sm-12 col-12 col-md-8 col-lg-8">
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-heading clearfix">
                                <h4 class="panel-title">Department Table</h4>
                            </div>
                            <div class="panel-body">
                               <div class="table-responsive">
                                <table id="example" class="display table " style="width: 100%; cellspacing: 0;">
                                    <thead class="">
                                        <tr>
                                            <th>Index</th>
                                            <th>Department Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Index</th>
                                            <th>Department Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($departments as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item->dep_name }}</td>
                                                <td>
                                                    @if($item->status == 1)
                                                    <a type="button" href="@route('department.status', $item->dep_id)" class="btn btn-success btn-addon btn-sm"><i class="fa fa-spin fa-refresh"></i>  Success</a>
                                                    @else
                                                    <a type="button" href="@route('department.status', $item->dep_id)"  class="btn btn-warning btn-addon btn-sm"><i class="fa fa-remove" aria-hidden="true"></i> Pending</a>
                                                    @endif
                                                </td>
                                                <td class="form-inline">
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-4 col-lg-3 col-4">
                                                            <a class="btn btn-info btn-sm" href="@route('department.edit', $item->dep_id)"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 col-lg-3 col-4">
                                                            <form class="" method="POST" action="@route('department.destroy', $item->dep_id)">
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
        </div>
        <div class="col-sm-12 col-12 col-md-4 col-lg-4">

            <div id="main-wrapper">
                <div class="">
                    <div class="">
                        <div class="panel panel-white">
                            <div class="panel-heading clearfix">
                                <h4 class="panel-title">Department Create Form</h4>
                            </div>
                            <div class="panel-body">
                                @if(@$edit)
                                <form action="@route('department.update', $edit->dep_id)" method="POST" enctype="multipart/form-data">
                                    @method('put')
                                @else
                                <form action="@route('department.store')" method="POST" enctype="multipart/form-data">
                                    @method('post')
                                @endif
                                    @csrf
                                    <div class="form-group">
                                        <label for="dep_name">Department Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Department Name" name="dep_name" value="{{ @$edit->dep_name }}">
                                        @if ($errors->has('dep_name'))
                                        <span class="text-danger">{{ $errors->first('dep_name') }}</span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
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

