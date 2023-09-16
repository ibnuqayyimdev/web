<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ContentSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    public function index() {
        $appName = env('APP_NAME');
        $appDescription = 'This is my page description';
        $appUrl = env('APP_URL');

        SEOMeta::setTitle($appName);
        SEOMeta::setDescription($appDescription);
        SEOMeta::setCanonical('https://codecasts.com.br/lesson');

        OpenGraph::setDescription($appDescription);
        OpenGraph::setTitle($appName);
        OpenGraph::setUrl($appUrl);
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Homepage');
        TwitterCard::setSite('@LuizVinicius73');

        JsonLd::setTitle('Homepage');
        JsonLd::setDescription($appDescription);
        JsonLd::addImage(asset('Logo-Ibnu-Qayyim/Logo 2.png'));

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
