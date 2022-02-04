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
                                        <label for="emp_name">Select Employee  <span class="text-danger">*</span></label>
                                        <select name="emp_id" class="form-control" id="employee_id" >
                                            <option value="">Select Employee Name</option>
                                            @foreach ($emps as $item)
                                            <option value="{{ $item->emp_id }}">{{ $item->emp_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('emp_id'))
                                        <span class="text-danger">{{ $errors->first('emp_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="">Employee Name</label>
                                        <input type="text" class="form-control" name="name" value="" id="name">
                                        <input type="hidden" class="form-control" name="emp_id" value="" id="emp_id">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Employee Salary</label>
                                        <input type="number" class="form-control" name="salary" id="salary">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Employee Job ID</label>
                                        <input type="text" class="form-control" name="job_id" id="job_id">
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                            <select class="form-control" name="year">
                                                @for ($year = date('Y'); $year > date('Y') - 100; $year--)
                                                <option value="{{$year}}">
                                                        {{$year}}
                                                </option>
                                                @endfor
                                          </select>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                            <select class="form-control" name="month">
                                                @foreach(range(1,12) as $month)

                                                        <option value="{{$month}}">
                                                                {{date("M", strtotime('2016-'.$month))}}
                                                        </option>
                                                @endforeach
                                          </select>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                            <select class="form-control" name="day">
                                                @foreach(range(1,31) as $day)
                                                        <option value="{{strlen($day)==1 ? '0'.$day : $day}}">
                                                                {{strlen($day)==1 ? '0'.$day : $day}}
                                                        </option>
                                                @endforeach
                                          </select>
                                        </div>
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


@section('js')
    <script>
        $('#employee_id').on('change', function(e){
            var emp = e.target.value
            $.ajax({
                url: '/employee/find/'+emp,
                type: 'GET',
                dataType: 'json',
                success:function(response){
                    $('#name').val(response.emp.emp_name),
                    $("#salary").val(response.emp.emp_salary),
                    $("#job_id").val(response.emp.job_id)
                    $("#emp_id").val(response.emp.emp_id)
                }
            })
        })
    </script>
@endsection

@endsection

