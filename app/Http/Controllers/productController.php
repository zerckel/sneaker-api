<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class productController extends Controller
{
    public function index()
    {

        if (isset($_GET['sort']) && $_GET['sort'] === "random" && isset($_GET['max'])) {

            $data = DB::table('products')
                ->get()->take($_GET['max']);


        } elseif (isset($_GET['search'])) {

            $data = DB::table('products')->where([
                ["name", "LIKE", '%' . $_GET['search'] . '%'],
                ["isPublished", "=", 1]
            ])->get();

        } else {

            $data = DB::table('products')
                ->get();
        }

        if ($data->isNotEmpty()) {
            return response()->json([
                'products' => $data
            ], 204);
        } else {
            return response()->json([
                'error' => $data
            ], 200);
        }
    }

    public function getOne($id){

        try {
            return response()->json([
                'products' => DB::table('products')
                    ->where('id', '=', $id)
                    ->where('isPublished', '=', 1)
                    ->get()[0]
            ]);
        } catch (Throwable $e) {
            return response()->json([
                "error" => 'ID  not found'
            ], 404);        }
    }
}
