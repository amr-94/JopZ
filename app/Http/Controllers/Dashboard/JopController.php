<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Jop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class JopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jops = Jop::paginate(5);
        return view('dashboard.jops.index', compact('jops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Auth::user()->categories()->get();
        $companies = Auth::user()->companies()->get();
        return view('dashboard.jops.create', compact('categories', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'category_id' => 'exists:categories,id',
            // 'company_id' => 'exists:companies,id',
            'status' => ['required', 'in:active,inactive'],
            'type' => ['required', 'in:full-time,part-time,remotly,internship'],
            'jop_image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);
        if ($request->hasFile('jop_image')) {
            $filename = time() . '.' . $request->jop_image->extension();
            $request->jop_image->move(public_path('files/jops'), $filename);
            $request->merge([
                'image' => $filename
            ]);
        }
        Jop::create($request->all());
        return redirect()->route('jops.index')->with('success', 'Jop Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jop = Jop::where('slug', $id)->first();
        $tags = explode(',', $jop->tags);
        return view('dashboard.jops.show', compact('jop', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jop = Jop::where('slug', $id)->first();
        $categories = Auth::user()->categories()->get();
        $companies = Auth::user()->companies()->get();
        return view('dashboard.jops.edit', compact('jop', 'categories', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $jop = Jop::where('slug', $id)->first();
        //delete old image
        if ($request->jop_image !== null &&  $request->jop_image !== $jop->image) {
            File::delete(public_path('files/jops/' . $jop->image));
        }
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'category_id' => 'required',
            // 'company_id' => 'required',
        ]);
        if ($request->hasFile('jop_image')) {
            $filename = time() . '.' . $request->jop_image->extension();
            $request->jop_image->move(public_path('files/jops/'), $filename);
            $request->merge([
                'image' => $filename
            ]);
        }

        $jop->update($request->all());
        return redirect()->route('jops.index')->with('success', 'Jop Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jop = Jop::where('slug', $id)->first();
        $jop->delete();
        return redirect()->route('jops.index')->with('success', 'Jop Deleted Successfully');
    }

    public function trash()
    {
        $jops = Auth::user()->jops()->onlyTrashed()->paginate(5);
        return view('dashboard.jops.trash', compact('jops'));
    }
    public function forcedestroy($slug)
    {
        $jop = Auth::user()->jops()->where('slug', $slug)->onlyTrashed()->first();
        if ($jop->image !== null) {
            File::delete(public_path('files/jops/' . $jop->image));
        }
        $jop->forceDelete();
        return redirect()->route('jops.trash')->with('success', 'Jop Deleted Successfully');
    }
    public function restore($slug)
    {
        $jop = Auth::user()->jops()->where('slug', $slug)->onlyTrashed()->first();
        $jop->restore();
        return redirect()->route('jops.trash')->with('success', 'Jop Restored Successfully');
    }
}