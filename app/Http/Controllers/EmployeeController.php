<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('modules.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designations = Designation::query()->Active()->get(['d_id', 'd_name']);
        $departments = Department::query()->Active()->get(['dep_id', 'dep_name']);
        return view('modules.employee.createOrUpdate', compact('designations', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'emp_name'=>' string | required | max:30 | min:2 ',
            'job_id' => 'required',
            'emp_email' => 'required',
            'emp_phone' => 'required',
            'department_id' => 'required',
            'designation_id' => 'required',
            'emp_salary' => 'required',
            'join_date' => 'required',
            'emp_em' => 'required',
        ]);
        if($validated){
            try{
                DB::beginTransaction();
                $emp_image = array();
                if ($request->hasFile('emp_image')) {
                    foreach ($request->emp_image as $key => $photo) {
                        $path = $photo->store('uploads/emp_image/photos');
                        array_push($emp_image, $path);
                    }

                }
                $employee = Employee::create([
                    'emp_name' => $request->emp_name,
                    'job_id' => $request->job_id,
                    'emp_email' => $request->emp_email,
                    'emp_phone' => $request->emp_phone,
                    'department_id' => $request->department_id,
                    'designation_id' => $request->designation_id,
                    'emp_salary' => $request->emp_salary,
                    'join_date' => $request->join_date,
                    'end_date' => $request->end_date,
                    'emp_em' => $request->emp_em,
                    'emp_image' => json_encode($emp_image),
                ]);

                if (!empty($employee)) {
                    DB::commit();
                    return redirect()->route('employee.index')->with('success','Employee Create successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                DB::rollBack();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
