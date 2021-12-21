@extends('layouts.admin.app')
@section('admin_content')
@section('title', 'Employee Create')

<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">List of Employee Table</h3>
    </div>
    <div id="main-wrapper">
        <div class="">
            <div class="">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Employee Salayr Create Form</h4>
                    </div>
                    <div class="panel-body">
                        @if(@$edit)
                        <form action="@route('salary.update', $edit->emp_id)" method="POST" enctype="multipart/form-data">
                            @method('put')
                        @else
                        <form action="@route('salary.store')" method="POST" enctype="multipart/form-data">
                            @method('post')
                        @endif
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="emp_name">Select Employee Name <span class="text-danger">*</span></label>
                                        <select name="emp_id" class="form-control" id="" >
                                            <option value="">Select Employee Name</option>
                                            @foreach ($emps as $item)
                                            <option value="{{ $item->emp_id }}">{{ $item->emp_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('emp_id'))
                                        <span class="text-danger">{{ $errors->first('emp_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div><!--name, job_id, email-->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div><!-- /Page Inner -->
@endsection

