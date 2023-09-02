<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Models\ContentSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $data['guru'] = ContentSetting::where('name','guru')->first();
        $data['galery'] = ContentSetting::where('name','galery')->first();
        $data['kegiatanSiswa'] = ContentSetting::where('name','kegiatan-siswa')->first();
        $data['fasilitasPendidikan'] = ContentSetting::where('name','fasilitas-pendidikan')->first();
        $data['testimonial'] = ContentSetting::where('name','testimonial')->first();
        return view('frontsite.pages.home.index',$data);
    }
}
