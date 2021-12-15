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
                        <h4 class="panel-title">Employee Create Form</h4>
                    </div>
                    <div class="panel-body">
                        @if(@$edit)
                        <form action="@route('employee.update', $edit->emp_id)" method="POST" enctype="multipart/form-data">
                            @method('put')
                        @else
                        <form action="@route('employee.store')" method="POST" enctype="multipart/form-data">
                            @method('post')
                        @endif
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="emp_name">Employee Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Employee Name" name="emp_name" value="{{ @$edit->emp_name }}">
                                        @if ($errors->has('emp_name'))
                                        <span class="text-danger">{{ $errors->first('emp_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="job_id">Employee Job ID <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Employee Job ID" name="job_id" value="{{ @$edit->job_id }}">
                                        @if ($errors->has('job_id'))
                                        <span class="text-danger">{{ $errors->first('job_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="emp_email">Employee E-mail <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="Employee E-mail" name="emp_email" value="{{ @$edit->emp_email }}">
                                        @if ($errors->has('emp_email'))
                                        <span class="text-danger">{{ $errors->first('emp_email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div><!--name, job_id, email-->

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="emp_name">Employee Department <span class="text-danger">*</span></label>
                                        <select name="department_id" id="" class="form-control">
                                            <option value="">Select Department</option>
                                            @foreach ($departments as $dep)
                                            <option value="{{ $dep->dep_id }}" {{ $dep->dep_id  == @$edit->department_id ? 'Selected' : ''}}>{{ $dep->dep_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('department_id'))
                                        <span class="text-danger">{{ $errors->first('department_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="emp_name">Employee Designation <span class="text-danger">*</span></label>
                                        <select name="designation_id" id="" class="form-control">
                                            <option value="">Select Designation</option>
                                            @foreach ($designations as $d)
                                            <option value="{{ $d->d_id }}" {{ $d->d_id  == @$edit->designation_id ? 'Selected' : ''}}>{{ $d->d_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('designation_id'))
                                        <span class="text-danger">{{ $errors->first('designation_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div><!--desingation and departnemtn-->

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="emp_image">Employee Image <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" placeholder="" name="emp_image[]" multiple >
                                        @if ($errors->has('emp_image'))
                                        <span class="text-danger">{{ $errors->first('emp_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="emp_phone">Employee Phone <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Employee Phone Number" name="emp_phone" value="{{ @$edit->emp_phone }}">
                                        @if ($errors->has('emp_phone'))
                                        <span class="text-danger">{{ $errors->first('emp_phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="emp_em">Employee EM <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Employee EM" name="emp_em" value="{{ @$edit->emp_em }}">
                                        @if ($errors->has('emp_em'))
                                        <span class="text-danger">{{ $errors->first('emp_em') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div><!--image, phone, em-->

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="emp_salary">Employee Salary <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Employee salary" name="emp_salary" value="{{ @$edit->emp_salary }}">
                                        @if ($errors->has('emp_salary'))
                                        <span class="text-danger">{{ $errors->first('emp_salary') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="join_date">Employee Join Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" placeholder="" name="join_date" value="{{ @$edit->join_date }}">
                                        @if ($errors->has('join_date'))
                                        <span class="text-danger">{{ $errors->first('join_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="end_date">Employee End Date <span class="text-danger"></span></label>
                                        <input type="date" class="form-control" placeholder="" name="end_date" value="{{ @$edit->end_date }}">
                                        @if ($errors->has('end_date'))
                                        <span class="text-danger">{{ $errors->first('end_date') }}</span>
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

