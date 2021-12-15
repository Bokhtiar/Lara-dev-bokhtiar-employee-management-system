<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::latest()->get(['d_id', 'd_name', 'status']);
        return view('modules.employee.designation.index', compact('designations'));
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
            'd_name'=>' string | required | unique:designations| max:30 | min:2 ',
        ]);

        if($validated){
            try{
                DB::beginTransaction();
                $d = Designation::create([
                    'd_name' => $request->d_name,
                ]);
                if (!empty($d)) {
                    DB::commit();
                    return redirect()->route('designation.index')->with('success','Designation Created successfully!');
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
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Designation::find($id);
        $designations = Designation::latest()->get(['d_id', 'd_name', 'status']);
        return view('modules.employee.designation.index', compact('designations', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'd_name'=>' string | required | unique:designations| max:30 | min:2 ',
        ]);

        if($validated){
            try{
                DB::beginTransaction();
                $d = Designation::find($id);
                $dUpdate = $d->update([
                    'd_name' => $request->d_name,
                ]);
                if (!empty($dUpdate)) {
                    DB::commit();
                    return redirect()->route('designation.index')->with('success','Designation Update successfully!');
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
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Designation::find($id)->delete();
        return redirect()->route('designation.index')->with('success','designation Deleted successfully!');
    }


    public function status($id)
    {
        $designation = Designation::find($id);
        Designation::query()->Status($designation);
        return redirect()->route('designation.index')->with('warning','Designation Status Change successfully!');
    }


}
