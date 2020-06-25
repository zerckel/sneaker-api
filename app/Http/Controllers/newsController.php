<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class newsController extends Controller
{
    public function index()
    {
        return response()->json([
            'news' => DB::table('news')->get()
        ], 200);

    }

    public function getOne($id)
    {
        try {
            return response()->json([
                'news' => DB::table('news')
                    ->where('id', '=', $id)
                    ->where('isPublished', '=', 1)->get()
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'Error' => "ID not found"
            ], 404);
        }
    }
}
