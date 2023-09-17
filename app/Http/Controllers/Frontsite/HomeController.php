<?php

namespace App\Http\Controllers\Frontsite;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
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
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // dd('ok');
        $appName = env('APP_NAME');
        $appDescription = 'ibnuqayyim.sch.id';
        $appUrl = env('APP_URL');

        SEOMeta::setTitle($appName);
        SEOMeta::setDescription($appDescription);
        SEOMeta::setCanonical($appDescription);

        OpenGraph::setDescription($appDescription);
        OpenGraph::setTitle($appName);
        OpenGraph::setUrl($appUrl);
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle($appName);
        // TwitterCard::setSite('@LuizVinicius73');

        JsonLd::setTitle('Homepage');
        JsonLd::setDescription($appDescription);
        JsonLd::addImage(asset('Logo-Ibnu-Qayyim/Logo 2.png'));

        $sectionName = ContentSetting::FRONTSITE_SECTION;
        $ContentSettings = ContentSetting::whereIn('name', $sectionName)->get();
        $data = [];
        foreach ($ContentSettings as $key => $ContentSetting) {
            $key = Str::camel($ContentSetting->name);
            $data[$key] = $ContentSetting;
        }

        $data['articles'] = Article::with('tags')->where('status', Helper::STATUS['ACTIVE'])->orderBy('created_at', 'desc')->get();

        // dd($data);
        return view('frontsite.pages.home.index', $data);
    }

    public function articles()
    {
        $data['articles'] = Article::with('tags')
            ->where('status', Helper::STATUS['ACTIVE'])
            ->orderBy('created_at', 'desc')->paginate(1);
        // dd($data);
        return view('frontsite.pages.article.index', $data);
    }

    public function articleDetail($slug)
    {
        $data['article'] = Article::with('category')->where('slug', $slug)->firstOrFail();
        $data['articles'] = Article::latest()->take(5)->get();
        $data['categories'] = Category::select(
            'id',
            'name',
            DB::raw("(select count(*) from articles where category_id = categories.id) as count_articles"),
        )->where('categories.status', Helper::STATUS['ACTIVE'])->get();
        // dd($data);

        SEOMeta::setTitle($data['article']->title);
        SEOMeta::setDescription($data['article']->body);
        SEOMeta::addMeta('article:published_time', $data['article']->created_at, 'property');
        SEOMeta::addMeta('article:section', $data['article']->category, 'property');
        SEOMeta::addKeyword([$data['article']->title, 'ibnuqayyim', 'pendaftaran ibnuqayyim', 'pendaftaran ibnuqayyim jakarta', 'ibnuqayyim jakarta', 'smp ibnuqayyim']);

        OpenGraph::setDescription($data['article']->body);
        OpenGraph::setTitle($data['article']->title);
        OpenGraph::setUrl(env('APP_URL'));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');

        OpenGraph::addImage(asset('storage/' . $data['article']->thumbnail));
        OpenGraph::addImage(['url' => asset('Logo-Ibnu-Qayyim/Logo 2.png'), 'size' => 300]);
        OpenGraph::addImage(asset('Logo-Ibnu-Qayyim/Logo 2.png'), ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($data['article']->title);
        JsonLd::setDescription($data['article']->body);
        JsonLd::setType('Article');
        JsonLd::addImage(asset('storage/' . $data['article']->thumbnail));

        return view('frontsite.pages.article.detail', $data);
    }
}
