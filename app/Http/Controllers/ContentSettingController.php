<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\ContentSetting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentSettingController extends Controller
{
    public function list()
    {
        $contentSettings = ContentSetting::all();

        return view('backsite.pages.content_settings.list', compact('contentSettings'));
    }

    public function create()
    {
        $data['types'] = ContentSetting::TYPE;
        return view('backsite.pages.content_settings.create', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'             => 'required|string|max:255',
            'type'             => 'required|numeric|max:255',
        ]);

        try {
            $validatedData['status'] = Helper::STATUS['ACTIVE'];
            ContentSetting::create($validatedData);
        } catch (Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return redirect()->route('content_settings.list')->with(['message' => 'Data created successfull!', 'alert-type' => 'success']);
    }

    public function updateStatus($id)
    {
        $contentSetting = ContentSetting::findOrFail($id);
        $contentSetting->status = !$contentSetting->status;
        $contentSetting->save();

        return redirect()->route('content_settings.list');
    }

    public function edit($id)
    {
        $contentSetting = ContentSetting::findOrFail($id);
        $types = ContentSetting::TYPE;
        return view('backsite.pages.content_settings.edit', compact('contentSetting', 'types'));
    }

    public function update(Request $request, $id)
    {
        $contentSetting = ContentSetting::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('content_settings.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $contentSetting->name = $request->input('name');
        $contentSetting->type = $request->input('type');
        $contentSetting->save();

        return redirect()->route('content_settings.list')->with(['message' => 'Data updated successfully!', 'alert-type' => 'success']);
    }

    public function destroy($id)
    {
        $contentSetting = ContentSetting::findOrFail($id);
        $contentSetting->delete();

        return redirect()->route('content_settings.list')->with(['message' => 'Data deleted successfull!', 'alert-type' => 'success']);
    }
}