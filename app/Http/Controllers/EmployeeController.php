<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emploies = Employee::all();


        return view('admin.employee.index', [
            'emploies' => $emploies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.employee.create', [
            'companies' => $companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();
        $employee = new Employee();
        $employee->first_name = $request->fname;
        $employee->last_name = $request->lname;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->company_id = $request->company;

        $employee->save();

        return redirect()->to('/employees')->with('msg', 'Employee Added Successfully!');
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
        $employee =  Employee::find($id);
        $companies = Company::all();
        return view('admin.employee.edit', [
            'employee' => $employee,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $validated = $request->validated();
        $employee = Employee::find($id);
        $employee->first_name = $request->fname;
        $employee->last_name = $request->lname;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->company_id = $request->company;

        $employee->update();

        return redirect()->to('/employees')->with('msg', 'Employee Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee =  Employee::find($id);
        if ($employee) {
            $employee->delete();
        }
        return redirect()->to('/employees')->with('msg', 'Employee Deleted Successfully!');
    }
}
