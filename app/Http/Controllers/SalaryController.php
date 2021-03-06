<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries = Salary::Latest()->get();
        return view('modules.employee.salary.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emps = Employee::all();
        return view('modules.employee.salary.createOrUpdate', compact('emps'));

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
            'name'=>' required',
            'job_id'=>' required',
            'salary'=>' required',
            'day'=>' required',
            'month'=>' required',
            'year'=>' required',
        ]);
        if($validated){
            try{
                DB::beginTransaction();
                $salary = Salary::create([
                    'name' => $request->name,
                    'emp_id' =>$request->emp_id,
                    'job_id' => $request->job_id,
                    'salary' => $request->salary,
                    'day' => $request->day,
                    'month' => $request->month,
                    'year' => $request->year,
                ]);
                if (!empty($salary)) {
                    DB::commit();
                    return redirect()->route('salary.index')->with('success','Salary Created successfully!');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = Employee::find($id);
        return response()->json([
            'emp' => $emp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Salary::find($id)->delete();
        return redirect()->route('salary.index')->with('success','Employee Deleted successfully!');
    }


    public function status($id)
    {
        $salary = Salary::find($id);
        Salary::query()->Status($salary);
        return redirect()->route('salary.index')->with('warning','Salary Status Change successfully!');
    }
}
