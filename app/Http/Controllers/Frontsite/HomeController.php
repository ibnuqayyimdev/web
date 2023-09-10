<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Models\Article;
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

        $data['articles'] = Article::with('tags')->orderBy('created_at','desc')->get();

        // dd($data);
        return view('frontsite.pages.home.index',$data);
    }

    public function articleDetail($slug){
        $data['article'] = Article::where('slug',$slug)->first();
        return view('frontsite.pages.article.detail',$data);
    }
}
