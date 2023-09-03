<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function getCityByProvinceID(Request $request) {
        $cities = \Indonesia::findProvince($request->province_id,['cities']);
        return response()->json([
            'success' => true,
            'data' => $cities
        ]);
    }

    public function getDistrictByCityID(Request $request) {
        $districts = \Indonesia::findCity($request->city_id,['districts']);
        return response()->json([
            'success' => true,
            'data' => $districts
        ]);
    }

    public function getVillageByDistrictID(Request $request) {
        $villages = \Indonesia::findDistrict    ($request->district_id,['villages']);
        return response()->json([
            'success' => true,
            'data' => $villages
        ]);
    }
}
