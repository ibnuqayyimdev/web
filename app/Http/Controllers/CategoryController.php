<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::all();
        return view('backsite.pages.category.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backsite.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'status'           => 'in:0,1',
        ]);
        try {
            Category::create([
                'name' => $request->name,
                'status' => $request->has('status') ? $request->status : Helper::STATUS['ACTIVE'],
                'description' => $request->description,
            ]);
        } catch (\Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return to_route('category.index')->with(['message' => 'Category created successfull', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $data['category'] = $category;
        return view('backsite.pages.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'             => 'string|max:255',
            'description'      => 'string|max:255',
            'status'           => 'in:0,1',
        ]);
        try {
            $category->name = $request->name;
            $category->status = $request->status;
            $category->description = $request->description;
            $category->save();
        } catch (\Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return to_route('category.index')->with(['message' => 'Category updated successfull', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            if ($category) {
                $category->delete();
            }
        } catch (\Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return to_route('category.index')->with(['message' => 'Category deleted successfull', 'alert-type' => 'success']);
    }

    public function updateStatus($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->status = !$category->status;
            $category->save();
        } catch (\Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return to_route('category.index')->with(['message' => 'Status updated successfull', 'alert-type' => 'success']);
    }
}
