<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Jop;
use App\Models\Jopform;
use App\Models\User;
use App\Notifications\ApplyjopNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        $jop = Jop::where('slug', $slug)->first();
        return view('Front.jop', compact('jop'));
    }
    public function alljopz()
    {
        $jops = Jop::paginate(5);
        return view('Front.Alljops', [
            'jops' => $jops
        ]);
    }
    public function company($slug)
    {
        $company = Company::where('slug', $slug)->first();

        return view('Front.company', compact('company'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('Front.allcategory', compact('category'));
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

        $category = $request->category_id;
        $company = $request->company_id;
        $name = $request->name;
        $query = Jop::query();
        if ($name !== null) {
            $query->whereAny(['name', 'slug'], 'like', '%' . $name . '%');
        }
        if ($category !== null) {
            $query->orwhere('category_id', $category);
        }
        if ($company !== null) {
            $query->orwhere('company_id', $company);
        }
        // if ($category !== null && $company !== null) {
        //     $query->orwhere('category_id', $category)
        //         ->orwhere('company_id', $company);
        // }
        $jops = $query->latest()->paginate(5);
        return view('Front.search', compact('jops'));
    }

    public function form_informations($slug)
    {

        $jop = Jop::where('slug', $slug)->first();
        return view('Front.jop_form', compact('jop'));
    }
    public function send_form_informations(Request $request, $slug)
    {

        $jop = Jop::where('slug', $slug)->first();
        $jopuser = User::where('id', $jop->user->id)->first();
        if ($request->hasfile('user_cv')) {
            $file = $request->file('user_cv');
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('files/forms'), $filename);
        }

        $applyjop = Jopform::create([
            'jop_id' => $jop->id,
            'user_id' => Auth::user()->id,
            'message' => $request->message,
            'email' => Auth::user()->email,
            'phone' => Auth::user()->phone,
            'cv' => $filename,
        ]);

        $jopuser->notify(new ApplyjopNotification($applyjop));

        return redirect()->route('home')->with('success', 'Form send Successfully');
    }

    public function tag($tag)
    {
        $jops = Jop::where('tags', 'LIKE', "%{$tag}%")->paginate(5);
        return view('Front.search', compact('jops'));
    }
}
