<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::latest()->get(['dep_id', 'dep_name','status']);
        return view('modules.employee.department.index', compact('departments'));
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
            'dep_name'=>' string | required | unique:departments| max:30 | min:2 ',
        ]);

        if($validated){
            try{
                DB::beginTransaction();
                $department = Department::create([
                    'dep_name' => $request->dep_name,
                ]);
                if (!empty($department)) {
                    DB::commit();
                    return redirect()->route('department.index')->with('success','Department Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                DB::rollBack();
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Department::find($id);
        $departments = Department::latest()->get(['dep_id', 'dep_name','status']);
        return view('modules.employee.department.index', compact('departments', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'dep_name'=>' string | required | unique:departments| max:30 | min:2 ',
        ]);

        if($validated){
            try{
                DB::beginTransaction();
                $department = Department::find($id);
                $departmentUpdate = $department->update([
                    'dep_name' => $request->dep_name,
                ]);
                if (!empty($departmentUpdate)) {
                    DB::commit();
                    return redirect()->route('department.index')->with('success','Department Update successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                DB::rollBack();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::find($id)->delete();
        return redirect()->route('department.index')->with('success','Department Deleted successfully!');
    }


    public function status($id)
    {
        $department = Department::find($id);
        Department::query()->Status($department);
        return redirect()->route('department.index')->with('warning','Department Status Change successfully!');
    }
}
