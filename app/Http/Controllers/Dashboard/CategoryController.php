<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view(
            'dashboard.categories.index',
            [
                'categories' => $categories
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.categories.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:4'],
            // 'image' => ['required', 'image', 'mimes:jpg,png,jpeg'],
            'description' => ['required', 'min:10'],
            'status' => ['required', 'in:active,inactive']

        ]);
        if ($request->hasFile('category_image')) {
            $filename = time() . '.' . $request->category_image->extension();
            $request->category_image->move(public_path('files/categories/'), $filename);
            $request->merge([
                'image' => $filename
            ]);
        }

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'A new category added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Category = Category::where('slug', $id)->first();
        return view('dashboard.categories.show', [
            'Category' => $Category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($category)
    {
        $categories = Category::all();
        $category = Category::where('slug', $category)->first();
        return view('dashboard.categories.edit', [
            'category' => $category,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::where('slug', $id)->first();
        //delete old image
        if ($request->category_image !== null && $request->category_image !== $category->image) {
            File::delete(public_path('files/categories/' . $category->image));
        }

        $request->validate([
            'name' => ['required', 'min:4'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg'],
            'description' => ['required', 'min:10'],
            'status' => ['required', 'in:active,inactive']

        ]);
        //upload new image
        if ($request->hasFile('category_image')) {
            $filename = time() . '.' . $request->category_image->extension();
            $request->category_image->move(public_path('files/categories/'), $filename);
            $request->merge([
                'image' => $filename
            ]);
        }
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::where('slug', $id)->first();
        if ($category->image) {
            unlink(public_path('files/categories/' . $category->image));
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted');
    }
}
