<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('home.index-profile', compact('users'));
    }

    public function create()
    {
        return view('home.create-profile');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'date_of_birth' => 'required|string',
            'gender' => 'required|string',
        ]);

        $user = User::create($request->except('_token'));

        return redirect()->route('get-create-medical-record', ['id' => $user->id]);
    }

    public function createMedicalRecord($id)
    {
        return view('home.create-medical-record', compact('id'));
    }

    public function createPostMedicalRecord(Request $request, $id){
        $request->validate([
            'medical_condition' => 'required|string',
            'allergies' => 'required|string',
            'weight' => 'required|string',
            'height' => 'required|string',
            'blood_type' => 'required|string',
        ]);

        $medicalRecord = new MedicalRecord();
        $medicalRecord->user_id = (int)$id;
        $medicalRecord->medical_condition = $request->medical_condition;
        $medicalRecord->allergies = $request->allergies;
        $medicalRecord->weight = (double)$request->weight;
        $medicalRecord->height = (double)$request->height;
        $medicalRecord->blood_type = $request->blood_type;

        $medicalRecord->save();
        // dd($payload);

        return redirect()->route('profile');
    }
}
