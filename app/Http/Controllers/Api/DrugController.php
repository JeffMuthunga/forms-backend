<?php

namespace App\Http\Controllers\Api;

use App\Models\Drug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DrugController extends Controller
{
    public function index() {

        $drugs = Drug::all();

        if($drugs->count()>0) {

        return response() -> json([
            "status" => 200,
            "drugs" => $drugs,
        ], 200);
    
    }else {
        return response() -> json([
            "status" => 404,
            "message" => "No records found",
        ], 404);
    }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            "referenceNo" => "required|string|max:256",
            "premisesName" => "required|string|max:256",
            "physicalAddress" => "required|string|max:256",
            "regionName" => "required|string|max:256",
            "dateAdded" => "required|date",
            "submissionDate" => "required|date",
            "status" => "boolean"
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {
            $drug = Drug::create([
                "referenceNo" => $request->referenceNo,
                "premisesName" => $request->premisesName,
                "physicalAddress" => $request->physicalAddress,
                "regionName" => $request->regionName,
                "dateAdded" => $request->dateAdded,
                "submissionDate" => $request->submissionDate,
                
            ]);
    
            if ($drug) {
                return response()->json([
                    "message" => "Drug Shop Created Successfully",
                    'drug' => $drug,
                ], 201);
            } else {
                return response()->json([
                    "message" => "Drug Shop not Created Successfully",
                ], 422); // Use 422 for unprocessable entity
            }
        }
    }
    




    public function show($id){
        $drug = Drug::find($id);

        if($drug) {
            return response()->json([
                "drug" => $drug
            ], 200);
        }else{
            return response()->json([
                "status" => 404,
                "error" => "Record Not Found"
            ], 200);
        }

    }



    public function edit($id) {
        $drug = Drug::find($id);

        if($drug) {
            return response()->json([
                "drug" => $drug
            ], 200);
        }else{
            return response()->json([
                "status" => 404,
                "error" => "Record Not Found"
            ], 200);
        }

    }

    public function update(Request $request, int $id){
        
        $validator = Validator::make($request->all(), [
            "referenceNo" => "required|string|max:256",
            "premisesName" => "required|string|max:256",
            "physicalAddress" => "required|string|max:256",
            "regionName" => "required|string|max:256",
            "dateAdded" => "required|date",
            "submissionDate" => "required|date",
            "status" => "boolean"
        ]);

        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 422);
        }else {
            $drug = Drug::find($id);
                      
            if($drug){
                $drug->update([
                    "referenceNo" => $request->referenceNo,
                    "premisesName" => $request->premisesName,
                    "physicalAddress" => $request->physicalAddress,
                    "regionName" => $request->regionName,
                    "dateAdded" => $request->dateAdded,
                    "submissionDate" => $request->submissionDate,
                    
                ]);
                return response()->json([
                    "message" => "Drug Shop Updated Successfully",
                    'drug' => $drug,
            ], 201);
            }else{
                return response()->json([
                    "message" => "Drug Shop not Found",
                ], 505);

            }
        $drug->update([
            "referenceNo" => $request->referenceNo,
                "premisesName" => $request->premisesName,
                "physicalAddress" => $request->physicalAddress,
                "regionName" => $request->regionName,
                "dateAdded" => $request->dateAdded,
                "submissionDate" => $request->submissionDate,
                "status" => $request->status
        ]);
    }
}

    public function destroy($id){
        $drug = Drug::find($id);

        if($drug){
            $drug->delete();
            return response()->json(["Message"=>"Record Deleted Successfully "],200);
        }else{
            return response()->json(["Error"=>"Record Not Found"],404);
        }
    }


}