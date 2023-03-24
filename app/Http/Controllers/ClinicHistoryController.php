<?php

namespace App\Http\Controllers;

use App\Models\ClinicHistory;
use App\Http\Controllers\Controller;
use App\Models\ClinicHistoryDetail;
use Illuminate\Http\Request;

class ClinicHistoryController extends Controller
{
    public function index()
    {
        try {
            $clinicHistories = ClinicHistory::all();
            return response()->json($clinicHistories, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'id_patient' => 'required',
            'names_patient' => 'required|max:255',
            'lastnames_patient' => 'required|max:255',
            'birthday_patient' => 'required|max:255',
            'gender_patient' => 'required|in:M,F',
            'phone_patient' => 'required|max:255',
            'address_patient' => 'required|max:255',
            'city_patient' => 'required|max:255',
            'civilstatus_patient' => 'required|in:single,married,widow',
        ];

        $validatedData = $request->validate($rules);

        try {
            $clinicHistory = collect(ClinicHistory::where('id_patient',$request->input('id_patient'))->get())->first();
            if ($clinicHistory) {
                $clinicHistory->update($validatedData);
            } else {
                $clinicHistory = ClinicHistory::create($validatedData);
            }

            $rulesDetail = [
                'id_patient' => 'required|integer',
                'timestamp_ch_detail' => 'required|date',
                'reason_ch_detail' => 'required|string',
                'weight_ch_detail' => 'required|numeric',
                'height_ch_detail' => 'required|numeric',
                'recommendation_ch_detail' => 'required|string'
            ];

            $validatedDataDetail = $request->validate($rulesDetail);
            $clinicHistoryDetail = ClinicHistoryDetail::create($validatedDataDetail);

            return response()->json(compact('clinicHistory', 'clinicHistoryDetail'), 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id_patient)
    {
        try {
            $clinicHistory = collect(ClinicHistory::where('id_patient',$id_patient)->get())->first();
            return response()->json($clinicHistory, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id_patient)
    {
        $rules = [
            'names_patient' => 'required|max:255',
            'lastnames_patient' => 'required|max:255',
            'birthday_patient' => 'required|date',
            'gender_patient' => 'required|in:male,female',
            'phone_patient' => 'required|max:255',
            'address_patient' => 'required|max:255',
            'city_patient' => 'required|max:255',
            'civilstatus_patient' => 'required|in:single,married,divorced,widowed',
        ];

        $validatedData = $request->validate($rules);

        try {
            $clinicHistory = ClinicHistory::findOrFail($id_patient);
            $clinicHistory->update($validatedData);
            return response()->json($clinicHistory, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id_patient)
    {
        try {
            $clinicHistoryDetail = ClinicHistoryDetail::where('id_patient',$id_patient)->delete();
            $clinicHistory = ClinicHistory::where('id_patient',$id_patient)->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
