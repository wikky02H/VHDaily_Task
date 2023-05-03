<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    /* mysql query to insert record:
       ->INSERT INTO products (name, is_active, category_id) VALUES ('mango', 1, 140);
    */
    // task 1 & 2 are mention in task_10.txt
    public function insert(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "name" => "required|string|max:100",
            "is_active" => "required|Boolean",
            "category_id" => "required|int"
        ]);
        if ($validation->fails()) {
            return response()->json([
                "message" => "validation error",
                "result" => $validation->errors()
            ], 400);
        }

        try {
            $product_insert = Product::insert([
                "name" => $request->name,
                "is_active" => $request->is_active,
                "category_id" => $request->category_id
            ]);
            if ($product_insert) {
                return response()->json([
                    "message" => "Success",
                ], 200);
            } else {
                return response()->json([
                    "message" => "product insert error",
                ], 400);
            }
        } catch (Exception $e) {
            Log::error("product_insert_error", [$e]);
            return response()->json([
                "message" => "Internal server error"
            ], 404);
        }
    }

    public function getProducts(Request $request)
    {
        try {

            // $products = product::join('categories', 'products.category_id', '=', 'categories.id')
            // ->select('products.*','categories.name as category_name')
            // ->get();
            $query = Product::with('category')
                ->orderByDesc('name');
            // ->get();
            // search by active status
            $active = $request->input('is_active', true);
            $query->active($active);

            // Search by product name
            $search = $request->input('search');
            if ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            }


            $products = $query->paginate(10);
            if ($products) {
                Log::info("user", [$products]);
                return response()->json([
                    'message' => ' success',
                    'result' => $products,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'get list of product error',
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
