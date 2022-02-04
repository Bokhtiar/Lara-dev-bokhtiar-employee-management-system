<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
    public function inoutbtn(Request $request , $id= !null )
    {
    $puchinbtn =  Attendance::where('emp_id',  $request->id)->where('date',  Carbon::today()->toDateString())->whereNotNull('in')->first();
    $puchoutbtn =  Attendance::where('emp_id', $request->id)->where('date',  Carbon::today()->toDateString())->whereNotNull('out')->first();
        if($puchinbtn  && $puchoutbtn){
            return response()->json([
                'punchinbtn' => false,
                'punchoutbtn' => false,
                'is_success' => 'Attendance Complete For Today',
            ]);
        }elseif($puchinbtn){
            return response()->json([
                'punchinbtn' => false,
                'punchoutbtn' => true,
                'is_success' => 'Already Punched In ',
            ]);
        // }elseif($puchoutbtn){
        //     return response()->json([
        //         'is_success' => 'attendence  Already Punchout Complete',
        //     ]);
        }
        else{
            return response()->json([
                'punchinbtn' => true,
                'punchoutbtn' => false,
                'is_success' => false,
            ]);
        }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inout(Request $request)
    {
        if($request->in){
            $attendance = new Attendance;
            $attendance->emp_id = $request->employee_id;
            $attendance->in = $request->in;
            $attendance->lat = $request->lat;
            $attendance->lon = $request->lon;
            $attendance->remarks = $request->remarks;
            $attendance->date =  Carbon::today()->toDateString();
            $attendance->time = date('H:i:s', time());
            $attendance->streetAdreess = $request->streetAdreess;
            $attendance->save();
            return response()->json([
                'attendance' => $attendance,
                'message'=> 'Good Morning, Punchin Successfull'
            ]);
        }elseif($request->out){
            $attendance = new Attendance;
            $attendance->emp_id = $request->employee_id;
            $attendance->out = $request->out;
            $attendance->lat = $request->lat;
            $attendance->lon = $request->lon;
            $attendance->remarks = $request->remarks;
            $attendance->date =  Carbon::today()->toDateString();
            $attendance->time = date('H:i:s', time());
            $attendance->streetAdreess = $request->streetAdreess;
            $attendance->save();
            return response()->json([
                'attendance' => $attendance,
                'message'=> 'Good Evening, Punchout Successfull, Thnak You'
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
