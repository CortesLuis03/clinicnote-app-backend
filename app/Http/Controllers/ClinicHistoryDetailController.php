<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClinicHistoryDetail;
use Exception;
use Illuminate\Http\Request;

class ClinicHistoryDetailController extends Controller
{
    public function index($id)
    {
        try {
            $clinic_history_details  = ClinicHistoryDetail::where('id_patient', $id)->get();
            return response()->json($clinic_history_details, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'id_patient' => 'required|integer',
            'timestamp_ch_detail' => 'required|date',
            'reason_ch_detail' => 'required|string',
            'weight_ch_detail' => 'required|numeric',
            'height_ch_detail' => 'required|numeric',
            'recommendation_ch_detail' => 'required|string'
        ];

        $validatedData = $request->validate($rules);

        try {
            $clinic_history_details = ClinicHistoryDetail::create($validatedData);
            return response()->json($clinic_history_details, 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $clinic_history_details = ClinicHistoryDetail::findOrFail($id);
            return response()->json($clinic_history_details, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $$rules = [
            'id_patient' => 'required|integer',
            'timestamp_ch_detail' => 'required|date',
            'reason_ch_detail' => 'required|string',
            'weight_ch_detail' => 'required|numeric',
            'height_ch_detail' => 'required|numeric',
            'recommendation_ch_detail' => 'required|string'
        ];

        $validatedData = $request->validate($rules);

        try {
            $clinic_history_details = ClinicHistoryDetail::findOrFail($id);
            $clinic_history_details->update($validatedData);
            return response()->json($clinic_history_details, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $clinic_history_details = ClinicHistoryDetail::findOrFail($id);
            $clinic_history_details->delete();
            return response()->json(null, 204);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
