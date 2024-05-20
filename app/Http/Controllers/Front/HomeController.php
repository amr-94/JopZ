<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Jop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $jops = Jop::paginate(5);
        $companies = Company::all();
        return view('Front.home', compact('categories', 'jops', 'companies'));
    }
    public function jop($slug)
    {
        $categories = Category::all();
        $companies = company::all();

        $jop = Jop::where('slug', $slug)->first();
        return view('Front.jop', compact('jop', 'companies', 'categories'));
    }
    public function company($slug)
    {
        $company = Company::where('slug', $slug)->first();
        return view('Front.company', compact('company'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $companies = Company::all();
        return view('Front.allcategory', compact('category', 'categories', 'companies'));
    }

    public function post_job()
    {
        $categories = Category::all();
        $companies = Company::all();
        return view('Front.createjop', compact('categories', 'companies'));
    }
    public function create_post_jop(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'exists:categories,id',
            'company_id' => 'exists:companies,id',
            'status' => ['required', 'in:active,inactive'],
            'type' => ['required', 'in:full-time,part-time,remotly,internship,freelancer'],
            'jop_image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);
        if ($request->hasFile('jop_image')) {
            $file = $request->file('jop_image');
            $filename = time() . '.' . $file->extension();
            $file->move(public_path('files/jops'), $filename);
            $request->merge([
                'image' => $filename
            ]);
        }
        Jop::create($request->all());
        return redirect()->route('home')->with('success', 'Jop Created Successfully');
    }
    public function search(Request $request)
    {
        $categories = Category::all();
        $companies = Company::all();
        $category = $request->category_id;
        $company = $request->company_id;
        $name = $request->name;
        $query = Jop::query();
        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        if ($category) {
            $query->where('category_id', $category);
        }
        if ($company) {
            $query->where('company_id', $company);
        }
        $jops = $query->paginate(5);
        return view('Front.search', compact('jops', 'categories', 'companies'));
    }
}