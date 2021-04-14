<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees', ['employees' => Employee::all()]);
    }

    public function show($id)
    {
        return view('employee', ['employee' => Employee::find($id)]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_name' => 'required|max:50',
            'employee_surname' => 'required|max:50',
            'project_id' => 'max:3',
        ]);

        $em = new Employee();
        $em->employee_name = $request['employee_name'];
        $em->employee_surname = $request['employee_surname'];
        $em->project_id = $request['project_id'];

        return ($em->save() !== 1) ?
            redirect('/employees')->with('status_success', 'Employee created!') :
            redirect('/employees')->with('status_error', 'Employee was not created!');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'employee_name' => 'required|max:50',
            'employee_surname' => 'required|max:50',
            'project_id' => 'max:3',
        ]);

        $em = Employee::find($id);
        $em->employee_name = $request['employee_name'];
        $em->employee_surname = $request['employee_surname'];
        $em->project_id = $request['project_id'];
        return ($em->save() !== 1) ?
            redirect('/employees/' . $id)->with('status_success', 'Employee updated!') :
            redirect('/employees/' . $id)->with('status_error', 'Employee was not updated!');
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('/employees')->with('status_success', 'Employee deleted!');
    }
}
