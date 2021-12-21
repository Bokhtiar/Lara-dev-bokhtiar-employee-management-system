<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->in){
            $attendance = new Attendance;
            $attendance->emp_id = $request->employee_id;
            $attendance->in = $request->in;
            $attendance->em = $request->em;
            $attendance->job_id = $request->job_id;
            $attendance->let = $request->let;
            $attendance->lon = $request->lon;
            $attendance->streetAdreess = $request->streetAdreess;
            $attendance->save();
            return response()->json([
                'attendance' => $attendance,
                'message'=> 'Good Morning, Welcome To FRESHOSFOTBD'
            ]);
        }elseif($request->out){
            $attendance = new Attendance;
            $attendance->emp_id = $request->employee_id;
            $attendance->out = $request->out;
            $attendance->em = $request->em;
            $attendance->job_id = $request->job_id;
            $attendance->let = $request->let;
            $attendance->lon = $request->lon;
            $attendance->streetAdreess = $request->streetAdreess;
            $attendance->save();
            return response()->json([
                'attendance' => $attendance,
                'message'=> 'Good Night, Thnak You'
            ]);
        }else{
            return response()->json([
                'message' => 'Please Valid Input Your Attendence Form.'
            ]);
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
        //
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
        //
    }
}
