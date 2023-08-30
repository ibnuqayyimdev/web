<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['SchoolProfile'] = SchoolProfile::first();
        return view('backsite.pages.school-profile.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // dd($request->all());
            $rules = [
                'school_name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'about' => 'required',
                'vision' => 'required',
                'mission' => 'required',

            ];
            if ($request->hasFile('photo')) {
                $rules['photo'] = 'required|file|mimes:jpg,jpeg,png|max:2048';
            }
            $request->validate($rules);

            $SchoolProfile['name'] = $request->school_name;
            $SchoolProfile['npsn'] = $request->npsn;
            $SchoolProfile['email'] = $request->email;
            $SchoolProfile['phone'] = $request->phone;
            $SchoolProfile['fax'] = $request->fax;
            $SchoolProfile['address'] = $request->address;
            $SchoolProfile['about'] = $request->about;
            $SchoolProfile['vision'] = $request->vision;
            $SchoolProfile['mission'] = $request->mission;
            $SchoolProfile['latitude'] = $request->latitude;
            $SchoolProfile['longitude'] = $request->longitude;

            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('images', 'public');
                $SchoolProfile['photo'] = $path;
            }

            $SchoolProfile = SchoolProfile::updateOrCreate([
                'name' => $request->school_name
            ], $SchoolProfile);

            $response = [
                'message' => 'Profile created successfully!',
                'alert-type' => 'success'
            ];
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $response = [
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            ];
        }

        return back()->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
