<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tags'] = Tag::all();
        return view('backsite.pages.tag.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backsite.pages.tag.create');
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
            Tag::create([
                'name' => $request->name,
                'status' => $request->has('status') ? $request->status : Helper::STATUS['ACTIVE'],
            ]);
        } catch (\Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return to_route('tag.index')->with(['message' => 'Tag created successfull', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $data['tag'] = $tag;
        return view('backsite.pages.tag.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'             => 'string|max:255',
            'status'           => 'in:0,1',
        ]);
        try {
            $tag->name = $request->name;
            $tag->status = $request->status;
            $tag->save();
        } catch (\Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return to_route('tag.index')->with(['message' => 'Tag updated successfull', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        try {
            if($tag){
                $tag->delete();
            }
        } catch (\Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return to_route('tag.index')->with(['message' => 'Tag deleted successfull', 'alert-type' => 'success']);
    }

    public function updateStatus($id)
    {
        try {
            $tag = Tag::findOrFail($id);
            $tag->status = !$tag->status;
            $tag->save();
        } catch (\Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return to_route('tag.index')->with(['message' => 'Status updated successfull', 'alert-type' => 'success']);
    }
}
