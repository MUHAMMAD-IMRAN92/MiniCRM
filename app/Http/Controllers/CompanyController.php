<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Mail\CompanyMail;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();


        return view('admin.company.index', [
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $validated = $request->validated();
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if ($request->logo) {

            $file = $request->logo;
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('images', $file_name, 'public');

            $company->logo = $file_name;
        }
        $company->save();
        //This section in comented because we need mailgun credentials.
        // if ($company->save()) {

        //     Mail::to($company->email)->send(new CompanyMail());
        // };
        return redirect()->to('/companies')->with('msg', 'Company Added Successfully!');
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
        $company =  Company::find($id);

        return view('admin.company.edit', [
            'company' => $company
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
        $company =  Company::find($id);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if ($request->logo) {

            $file = $request->logo;
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('images', $file_name, 'public');

            $company->logo = $file_name;
        }
        $company->update();
        return redirect()->to('/companies')->with('msg', 'Company Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('work');
        $company =  Company::find($id);
        if ($company) {
            $company->delete();
        }
        return redirect()->to('/companies')->with('msg', 'Company Deleted Successfully!');
    }
}
