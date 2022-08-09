<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\User;
class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::paginate(3);
        $employees = User::all();
        return view('admin.leave',compact( 'leaves', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.addleave');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      
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
        $leave = Leave::find($id);
    
        $leave->save();
        session()->flash('msg', 'Leave details updated');
        return back();
    }
    public function update_leave_status()
    {
            $leave = Leave::find($_REQUEST['leave_id']);
            $leave->status = $_REQUEST['status'];
            $leave->save();
            session()->flash('msg', 'Leave Status updated');
            return back();
    }
    public function create_csv()
    {
            //$leave = Leave::where('employee_id',$_REQUEST['employee_id'])->whereBet;
            $leave->status = $_REQUEST['status'];
            $leave->save();
            session()->flash('msg', 'Leave Status updated');
            return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave = Leave::find($id);
        $leave->delete();
        session()->flash('msg', 'Leave deleted');
        return back();
    }
}
