<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\StudentAttachment;
use App\Models\RegistrationSchedule;
use App\Models\StudentRegistration;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        App::setLocale('id');
        $data['studentRegistration'] = StudentRegistration::all();
        return view('backsite.pages.student-registration.list', $data);
    }

    public function detail(string $id)
    {
        try {
            $data['studentRegistration'] = StudentRegistration::findOrFail($id);
            $data['attachments'] = $data['studentRegistration']->attachments;
            $data['provinces'] = \Indonesia::allProvinces();
            return view('backsite.pages.student-registration.detail', $data);
        } catch (\Exception $e) {
            return redirect()->route('student-registration.list')->with(['error' => 'Something went wrong!', 'alert-type' => 'error']);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:1,2,3,4',
        ]);

        $studentRegistration = StudentRegistration::find($id);

        if (!$studentRegistration) {
            return redirect()->back()->with(['error' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        $studentRegistration->status = $request->status;
        $studentRegistration->save();

        return redirect()->route('student-registration.list')->with(['message' => 'Pendaftaran Berhasil Diupdate', 'alert-type' => 'success']);
    }

    public function index()
    {
        App::setLocale('id');
        $data['RegistrationSchedule'] = RegistrationSchedule::where('status', Helper::STATUS['ACTIVE'])->get();
        $data['StudentRegistration'] = StudentRegistration::with('registrationSchedule')->where('user_id', auth()->user()->id)->get();

        return view('backsite.pages.student-registration.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($slug)
    {
        $data['genders'] = Helper::genderList('ARABIC');
        $data['provinces'] = \Indonesia::allProvinces();
        $data['schedule'] = RegistrationSchedule::where('slug', $slug)->first();
        // dd($data);
        return view('backsite.pages.student-registration.create', $data);
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
            'schedule_id' => 'required|exists:registration_schedules,id',
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
            $RegistrationSchedule->registration_schedule_id = $request->schedule_id;
            $RegistrationSchedule->save();

            // Upload attachments
            $photo = $request->file('photo')->store('images', 'public');
            StudentAttachment::create([
                'register_id' => $RegistrationSchedule->id,
                'file_name' => 'PAS FOTO',
                'path' => $photo,
                'status' => Helper::STATUS['ACTIVE'],
                'type' => StudentAttachment::TYPE['PHOTO'],
            ]);

            $ijasahOrSkl = $request->file('ijasah_or_skl')->store('images', 'public');
            StudentAttachment::create([
                'register_id' => $RegistrationSchedule->id,
                'file_name' => 'IJAZAH SD',
                'path' => $ijasahOrSkl,
                'status' => Helper::STATUS['ACTIVE'],
                'type' => StudentAttachment::TYPE['IJASAH_SKL'],
            ]);

            $ktp = $request->file('ktp')->store('images', 'public');
            StudentAttachment::create([
                'register_id' => $RegistrationSchedule->id,
                'file_name' => 'KTP Orangtua',
                'path' => $ktp,
                'status' => Helper::STATUS['ACTIVE'],
                'type' => StudentAttachment::TYPE['KTP'],
            ]);

            $response = ['message' => 'Pendaftaran Berhasil Disubmit', 'alert-type' => 'success'];
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            $response = ['message' => 'Something went wrong!', 'alert-type' => 'error'];
        }

        return redirect('student-registration')->with($response);
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
        $data['genders'] = Helper::genderList('ARABIC');
        $data['provinces'] = \Indonesia::allProvinces();
        $data['StudentRegistration'] = StudentRegistration::find($id);
        // dd($data);

        return view('backsite.pages.student-registration.edit', $data);
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
