<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(5);
        return view('dashboard.companies.index', [
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'website' => [],
            'email' => ['string', 'email'],
            'phone' => ['required'],
            'address' => 'required',
        ]);
        if ($request->hasFile('c_logo')) {
            $filename = time() . '.' . $request->c_logo->extension();
            $request->c_logo->move(public_path('files/company'), $filename);
            $request->merge([
                'logo' => $filename
            ]);
        }
        Company::create($request->all());
        return redirect()->route('companies.index')->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $company = Company::where('slug', $id)->first();
        return view('dashboard.companies.show', [
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Company::where('slug', $id)->first();
        return view('dashboard.companies.edit', [
            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $company = Company::where('slug', $id)->first();
        //delete old logo
        if ($request->c_logo !== null && $request->c_logo !== $company->logo) {
            File::delete(public_path('files/company/' . $company->logo));
        }
        //upload new logo
        if ($request->hasFile('c_logo')) {
            $filename = time() . '.' . $request->c_logo->extension();
            $request->c_logo->move(public_path('files/company'), $filename);
            $request->merge([
                'logo' => $filename
            ]);
        }

        $company->update($request->all());
        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::where('slug', $id)->first();
        File::delete(public_path('files/company/' . $company->logo));
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
