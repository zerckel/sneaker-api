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

        foreach ($data as $elem) {
            $elem->colors = unserialize($elem->colors);
            $elem->secondarypics = unserialize($elem->secondarypics);
        }

        if ($data->isEmpty()) {
            return response()->json([
                'Error' => $data
            ], 200);
        } else {
            return response()->json([
                'products' => $data
            ], 200);
        }
    }

    public function getOne($id)
    {

        try {
            $db = DB::table('products')
                ->where('id', '=', $id)
                ->where('isPublished', '=', 1)
                ->get()[0];
            $db->colors = unserialize($db->colors);
            $db->secondarypics = unserialize($db->secondarypics );

            return response()->json([
                'products' => $db
            ]);
        } catch (Throwable $e) {
            return response()->json([
                "error" => 'ID  not found'
            ], 404);
        }
    }
}
