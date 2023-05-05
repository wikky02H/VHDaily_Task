<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Exception;

class FileuploadController extends Controller
{
    public function upload(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'file' => 'required|file|max:1024|mimes:jpg,jpeg,png'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                "message" => "Validation error",
                "result" => $validatedData->errors()
            ], 400);
        }
        try {

            $fileName = date('j_F_Y') . '.' . $request->file('file')->extension();

            $path = $request->file('file')->storeAs('/public/uploads', $fileName);
            Log::info('file', [$path]);


            if ($path) {
                return response()->json([
                    "message" => 'success',
                    'path' => $path,
                ], 200);
            }
        } catch (Exception $e) {
            Log::error("getAllEmployees_error", [$e]);
            return response()->json([
                "message" => "Internal server error",
            ], 500);
        }
    }

    public function delete(Request $request, $fileName)
    {
        try {


            Log::info('file', [$fileName]);


            if (Storage::exists('public/uploads/' . $fileName)) {

                Storage::delete('public/uploads/' . $fileName);
                return response()->json([
                    "message" => "Success"
                ], 200);
            }


            return response()->json([
                "message" => "File not found"
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Internal server error"
            ], 500);
        }
    }
}
