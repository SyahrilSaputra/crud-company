<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $data = [
            'company' => Company::all(),
        ];
        return view('index', $data);
    }
    public function addCompany()
    {
        return view('add');
    }
    public function save(Request $request)
    {
        $company = $request->validate([
            'logo' => 'required|dimensions:min-width=100px,min-height=100px',
            // 'logo' => '',
            'title' => 'required',
            'link' => 'required'
        ]);
        $file = $request->file('logo');
        $name = $request->file('logo')->getClientOriginalName();
        $file->move(public_path() . '/storage/app/public', $name);
        $com = [
            'title' => $request->title,
            'logo' => $name,
            'link' => $request->link,
        ];
        Company::create($com);
        return redirect(route('index.company'));
    }
    public function edit(Company $company)
    {
        $data = [
            'company' => $company,
        ];
        return view('edit', $data);
    }
    public function update(Company $company, Request $request)
    {
        $request->validate([
            // 'logo' => 'dimensions:min-width=100px,min-height=100px',
            'title' => 'required',
            'link' => 'required'
        ]);
        if($request->file('logo')
        {
            $company = [
                'title' => $request->title,
                'logo' => $name,
                'link' => $request->link,
            ];
            Company::where('id', $company->id)->update($company);
            $file = $request->file('logo');
            $name = $request->file('logo')->getClientOriginalName();
            $file->move(public_path() . '/storage/app/public', $name);
        }else{
            $company = [
                'title' => $request->title,
                'logo' => $name,
                'link' => $request->link,
            ];
            Company::where('id', $company->id)->update($comp);  
        }
       
        
        return redirect(route('index.company'));
    }
    public function delete($id)
    {
        Company::where('id', $id)->delete();
        return redirect(route('index.company'));
    }
}
