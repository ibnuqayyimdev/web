<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function list()
    {
        $data['banners'] = Banner::all();
        return view('backsite.pages.banner.list', $data);
    }

    public function create()
    {
        return view('backsite.pages.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_name' => 'required|string',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        $imagePath = $request->file('path')->store('banners', 'public');

        $imageName = basename($imagePath);

        Banner::create([
            'file_name' => $request->input('file_name'),
            'path' => 'banners/' . $imageName,
            'status' => $request->input('status'),
        ]);

        return redirect()->route('banner.list')->with(['message' => 'Data created successfull!', 'alert-type' => 'success']);
    }

    public function edit($id)
    {
        $data['banner'] = Banner::findOrFail($id);

        return view('backsite.pages.banner.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'file_name' => 'required|string',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        $banner = Banner::findOrFail($id);

        if ($request->hasFile('path')) {

            $newImagePath = $request->file('path')->store('banners', 'public');
            $newImageName = basename($newImagePath);

            $banner->update([
                'file_name' => $request->input('file_name'),
                'path' => 'banners/' . $newImageName,
                'status' => $request->input('status'),
            ]);

            if ($banner->path) {
                Storage::delete($banner->path);
            }
        } else {
            $banner->update([
                'file_name' => $request->input('file_name'),
                'status' => $request->input('status'),
            ]);
        }

        return redirect()->route('banner.list')->with(['message' => 'Data updated successfull!', 'alert-type' => 'success']);
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('banner.list')->with(['message' => 'Data deleted successfull!', 'alert-type' => 'success']);
    }
}
