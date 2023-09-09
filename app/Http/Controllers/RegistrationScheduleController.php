<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrationSchedule;
use Illuminate\Support\Facades\App;

class RegistrationScheduleController extends Controller
{
    public function index()
    {
        App::setLocale('id');
        $data['registrationSchedule'] = RegistrationSchedule::all();
        return view('backsite.pages.register-schedule.index', $data);
    }

    public function create()
    {
        return view('backsite.pages.register-schedule.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:registration_schedules,slug',
            'description' => 'required|string',
            'status' => 'required|in:0,1',
            'type' => 'required|in:1,2',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'period' => 'required|string|max:255',
            'batch' => 'required|integer',
            'registration_fee' => 'required|numeric',
            'extra_attributes' => 'nullable|string',
        ]);

        try {
            RegistrationSchedule::create($validatedData);
            return redirect()->route('register-schedule.index')->with(['message' => 'Data created successfully!', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            return redirect()->route('register-schedule.create')->with(['error' => 'Something went wrong!', 'alert-type' => 'error']);
        }
    }

    public function edit(string $id)
    {
        try {
            $registrationSchedule = RegistrationSchedule::findOrFail($id);
            return view('backsite.pages.register-schedule.edit', compact('registrationSchedule'));
        } catch (\Exception $e) {
            return redirect()->route('register-schedule.index')->with(['error' => 'Something went wrong!', 'alert-type' => 'error']);
        }
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:registration_schedules,slug,' . $id,
            'description' => 'required|string',
            'status' => 'required|in:0,1',
            'type' => 'required|in:1,2',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'period' => 'required|string|max:255',
            'batch' => 'required|integer',
            'registration_fee' => 'required|numeric',
            'extra_attributes' => 'nullable|string',
        ]);

        try {
            $registrationSchedule = RegistrationSchedule::findOrFail($id);
            $registrationSchedule->update($validatedData);
            return redirect()->route('register-schedule.index')->with(['message' => 'Data updated successfully!', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            return redirect()->route('register-schedule.edit', $id)->with(['error' => 'Something went wrong!', 'alert-type' => 'error']);
        }
    }

    public function destroy(string $id)
    {
        try {
            $registrationSchedule = RegistrationSchedule::findOrFail($id);
            $registrationSchedule->delete();
            return redirect()->route('register-schedule.index')->with(['message' => 'Data deleted successfully!', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            return redirect()->route('register-schedule.index')->with(['error' => 'Something went wrong!', 'alert-type' => 'error']);
        }
    }
}
