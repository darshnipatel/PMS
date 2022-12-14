<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Holidays;
use App\Models\Project;
use App\Models\User;

class EmployeeController extends Controller
{
    protected $records_per_page;
    public function __construct(){

        $this->records_per_page = config('app.records_per_page');
    }

    public function getLeavePage()
    {
        $leaves = Leave::where('employee_id', Auth()->user()->id)->paginate( $this->records_per_page );
        return view('user.addleave', compact( 'leaves'));
    }
    public function addLeave(Request $request)
    {
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
            'reason' => 'required',
        ]);
       
        $input = $request->all();
        $input['employee_id'] = Auth()->user()->id;
        $input['from_date'] = date('Y-m-d h:i:s', strtotime($input['from_date'])) ;
        $input['to_date'] = date('Y-m-d h:i:s', strtotime($input['to_date'])) ;
        Leave::create($input);
        $leaves = Leave::paginate(  $this->records_per_page );
        return view('user.addleave', compact( 'leaves' ));
    }

    public function getholidaysPage()
    {
        $holidays = Holidays::all();
        return view('user.holidays', compact( 'holidays'));
    }
    public function getProjectPage()
    {
        $emp_id = Auth()->user()->id;
        $projects = Project::where('employee_id' , $emp_id)->paginate(  $this->records_per_page );
        return view('user.project', compact( 'projects'));
    }
    public function getAttendencePage()
    {
        $emp_id = Auth()->user()->id;
        $attendence = '';
        //$attendence = Attendence::where('employee_id' , $emp_id)->paginate( $this->records_per_page );
        return view('user.attendence', compact( 'attendence'));
    }
    public function getProfilePage()
    {
        $emp_id = Auth()->user()->id;
        $employee = User::where('id' , $emp_id)->get()->first();
        return view('user.profile', compact( 'employee'));
    }
    public function updateProfile(Request $request, $id)
    {
        $employee = User::find($id);

        $employee->date_of_joining = !empty($request->date_of_joining) ? date('Y-m-d', strtotime($request->date_of_joining)) : $user->date_of_joining ;
        $employee->phone = $request->phone;
        $employee->birthdate =  date('Y-m-d', strtotime($request->birthdate));
        $employee->address = $request->address;
        $employee->gender = $request->gender;
        $employee->nationality = $request->nationality;
        $employee->religion = $request->religion;
        $employee->marital_status = $request->marital_status;
        $employee->emergency_contact_name = $request->emergency_contact_name;
        $employee->emergency_contact_relationship = $request->emergency_contact_relationship;
        $employee->emergency_contact_phone = $request->emergency_contact_phone;
        $employee->bank_name = $request->bank_name;
        $employee->bank_account_no = $request->bank_account_no;
        $employee->IFSC_code = $request->IFSC_code;
        $employee->PAN_no = $request->PAN_no;

        $employee->save();
        session()->flash('msg', 'Profile details updated');
        return back();
    }
}
