<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormationController extends Controller
{
    use ApiResponse;

    public function dashboard()
    {
        try {
            // Sirf id aur proposed_name_1 get kar rahe hain
            $formations = Formation::where('user_id', auth()->id())
                ->select('id', 'proposed_name_1', 'current_step', 'created_at')
                ->orderBy('created_at', 'desc')
                ->get();

            return $this->successResponse($formations, 'Formations list retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to fetch dashboard data: ' . $e->getMessage(), 500);
        }
    }
    public function storeStep1(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'proposed_name_1' => 'required|string|max:255|unique:formations,proposed_name_1,' . auth()->id() . ',user_id',
                'proposed_name_2' => 'nullable|string|max:255',
                'is_llp'          => 'required|boolean',
            ]);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->first(), 422);
            }

            $formation = Formation::updateOrCreate(
                ['user_id' => auth()->id()],
                [
                    'proposed_name_1' => $request->proposed_name_1,
                    'proposed_name_2' => $request->proposed_name_2,
                    'is_llp'          => $request->is_llp,
                    'current_step'    => 1
                ]
            );

            return $this->successResponse($formation, 'Step 1: Company Name saved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to save Step 1: ' . $e->getMessage(), 500);
        }
    }
}
