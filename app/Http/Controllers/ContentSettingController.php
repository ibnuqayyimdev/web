<?php

namespace App\Http\Controllers;

use App\Models\ContentSetting;


use Illuminate\Http\Request;

class ContentSettingController extends Controller
{
    public function list()
    {
        $contentSettings = ContentSetting::all();

        return view('backsite.pages.content_settings.list', compact('contentSettings'));
    }

    public function create()
    {
        return view('backsite.pages.content_settings.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'             => 'required|string|max:255',
            'type'             => 'required|numeric|max:255',
            // 'extra_attributes' => 'nullable|string|max:255',
            'status'           => 'boolean'
        ]);

        ContentSetting::create($validatedData);

        return redirect()->route('content_settings.list');
    }
}
