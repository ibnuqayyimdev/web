<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\StudentAttachment;
use App\Models\RegistrationSchedule;
use App\Models\StudentRegistration;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['RegistrationSchedule'] = RegistrationSchedule::where('status',Helper::STATUS['ACTIVE'])->get();
        return view('backsite.pages.register-schedule.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($slug)
    {
        $data['genders'] = Helper::genderList('ARABIC');
        $data['provinces'] = \Indonesia::allProvinces();
        $data['schedule'] = RegistrationSchedule::where('slug',$slug)->first();
        // dd($data);
        return view('backsite.pages.register-schedule.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'string',
            'age' => 'required|integer',
            'gender' => 'required|integer|in:0,1',
            'place_of_birth' => 'required|string',
            'day_of_birth' => 'required|date',
            'school_of_origin' => 'required|string',
            'year_of_graduation' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'parent_name' => 'required|string',
            'photo' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            'ijasah_or_skl' => 'required|mimes:jpg,jpeg,png,pdf',
            'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            'province' => 'required|string|exists:indonesia_provinces,id',
            'cities' => 'required|string|exists:indonesia_cities,id',
            'district' => 'required|string|exists:indonesia_districts,id',
            'village' => 'required|string|exists:indonesia_villages,id',
            'schedule' => 'required|exists:registration_schedules,id',
        ]);

        DB::beginTransaction();
        try {
            $RegistrationSchedule = new StudentRegistration();
            $RegistrationSchedule->user_id = auth()->user()->id;
            $RegistrationSchedule->first_name = $request->first_name;
            $RegistrationSchedule->last_name = $request->last_name;
            $RegistrationSchedule->age = $request->age;
            $RegistrationSchedule->gender = $request->gender;
            $RegistrationSchedule->place_of_birth = $request->place_of_birth;
            $RegistrationSchedule->day_of_birth = $request->day_of_birth;
            $RegistrationSchedule->school_of_origin = $request->school_of_origin;
            $RegistrationSchedule->year_of_graduation = $request->year_of_graduation;
            $RegistrationSchedule->email = $request->email;
            $RegistrationSchedule->phone_number = $request->phone_number;
            $RegistrationSchedule->parent_name = $request->parent_name;
            $RegistrationSchedule->province_id = $request->province;
            $RegistrationSchedule->city_id = $request->cities;
            $RegistrationSchedule->district_id = $request->district;
            $RegistrationSchedule->village_id = $request->village;
            $RegistrationSchedule->zip_code = $request->zip_code;
            $RegistrationSchedule->address = $request->address;
            $RegistrationSchedule->status = StudentRegistration::STATUS['PENDING'];
            $RegistrationSchedule->registration_schedule_id = $request->schedule;
            $RegistrationSchedule->save();

            // Upload attachments
            $photo = $request->file('photo')->store('images', 'public');
            StudentAttachment::create([
                'register_id' => $RegistrationSchedule->id,
                'file_name' => 'PHOTO',
                'path' => $photo,
                'status' => Helper::STATUS['ACTIVE'],
                'type' => StudentAttachment::TYPE['PHOTO'],
            ]);

            $ijasahOrSkl = $request->file('ijasah_or_skl')->store('images', 'public');
            StudentAttachment::create([
                'register_id' => $RegistrationSchedule->id,
                'file_name' => 'IJASAH_SKL',
                'path' => $ijasahOrSkl,
                'status' => Helper::STATUS['ACTIVE'],
                'type' => StudentAttachment::TYPE['IJASAH_SKL'],
            ]);

            $ktp = $request->file('ktp')->store('images', 'public');
            StudentAttachment::create([
                'register_id' => $RegistrationSchedule->id,
                'file_name' => 'KTP',
                'path' => $ktp,
                'status' => Helper::STATUS['ACTIVE'],
                'type' => StudentAttachment::TYPE['KTP'],
            ]);

            $response = ['message' => 'Pendaftaran Berhasil Disubmit', 'alert-type' => 'success'];
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            if(env('APP_ENV') == 'local'){
                dd($e);
            }
            $response = ['message' => 'Something went wrong!', 'alert-type' => 'error'];
        }

        return redirect('register-schedule')->with($response);
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
