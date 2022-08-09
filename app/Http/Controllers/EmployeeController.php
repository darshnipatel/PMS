<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
class EmployeeController extends Controller
{

    public function getLeavePage()
    {
        $leaves = Leave::where('employee_id', Auth()->user()->id)->paginate(5);
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
        $leaves = Leave::paginate(5);
        return view('user.addleave', compact( 'leaves' ));
    }
}
