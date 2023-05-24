<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Exception
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //task-1
    public function insert(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|min:5',
  +'is_active' => 'required|boolean',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'message' => 'validation error',
                'result' => $validation->errors(),
            ], 400);
        }
        try {
            $category = Category::insert([
                'name' => $request->name,
                'is_active' => $request->is_active,
            ]);
            if ($category) {
                Log::info('user', [$category]);
                return response()->json([
                    'message' => 'category insert successfully',
                    'result' => $category,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'category insert error',
                ], 404);
            }
        } catch (Exception $e) {
            Log::error('error', [$e]);
            return response()->json([
                'message' => 'Internal server error',
            ], 500);
        }
    }
//task-2
    public function bulkInsert()
    {
        try {
            $category = [
                ['name' => 'Category 1', 'is_active' => true],
                ['name' => 'Category 2', 'is_active' => true],
                ['name' => 'Category 3', 'is_active' => true],
                ['name' => 'Category 4', 'is_active' => true],
                ['name' => 'Category 5', 'is_active' => true],
                ['name' => 'Category 6', 'is_active' => true],
                ['name' => 'Category 7', 'is_active' => true],
                ['name' => 'Category 8', 'is_active' => true],
                ['name' => 'Category 9', 'is_active' => true],
                ['name' => 'Category 10', 'is_active' => true],
            ];

            Category::insert($category);

            if ($category) {
                Log::info("user", [$category]);
                return response()->json([
                    'message' => 'bulkInsert successfully',
                    'result' => $category,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'bulkInsert error',
                ], 404);
            }
        } catch (Exception $e) {
            Log::error('error', [$e]);
            return response()->json([
                "message" => "Internal server error",
            ], 500);
        }
    }
//task-3
    public function get()
    {
        try {
            $category = Category::all();
            if ($category) {
                Log::info("user", [$category]);
                return response()->json([
                    'message' => ' success',
                    'result' => $category,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'get category error',
                ], 404);
            }
        } catch (Exception $e) {
            Log::error('error', [$e]);
            return response()->json([
                "message" => "Internal server error",
            ], 500);
        }
    }
//task-4
    public function update()
    {
        try {
            $update = Category::whereIn('id', [1, 2])->update(['is_active' => false]);
            if ($update) {
                Log::info("user", [$update]);
                return response()->json([
                    'message' => ' success',
                    'result' => $update,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'update category error',
                ], 404);
            }
        } catch (Exception $e) {
            Log::error('error', [$e]);
            return response()->json([
                "message" => "Internal server error",
            ], 500);
        }
    }
//task-5
    public function delete()
    {
        try {
            $delete = Category::where('is_active', false)->delete();
            if ($delete) {
                Log::info("user", [$delete]);
                return response()->json([
                    'message' => ' success',
                    'result' => $delete,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'delete category error',
                ], 404);
            }
        } catch (Exception $e) {
            Log::error('error', [$e]);
            return response()->json([
                "message" => "Internal server error",
            ], 500);
        }
    }
}
