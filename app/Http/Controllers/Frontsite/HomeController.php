<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Models\ContentSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index() {
        $sectionName = ContentSetting::FRONTSITE_SECTION;
        $ContentSettings = ContentSetting::whereIn('name',$sectionName)->get();
        $data = [];
        foreach ($ContentSettings as $key => $ContentSetting) {
            $key = Str::camel($ContentSetting->name);
            $data[$key] = $ContentSetting;
        }
        return view('frontsite.pages.home.index',$data);
    }
}
