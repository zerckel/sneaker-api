<?php

namespace App\Http\Controllers;

use App\Brands;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

class BrandController extends Controller
{

    public function error($message)
    {
        return response()->json([
            "error" => $message
        ], 404);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Brands[]|Collection
     */
    public function index()
    {
        return Brands::all();
    }

    public function show($id)
    {
        try {
            return response()->json([
                'brands' => DB::table('brands')
                    ->where('id', '=', $id)
                    ->get()[0]
            ]);
        } catch (Throwable $e) {
            return $this->error('ID not found');
        }
    }


    public function productFromBrand($id)
    {
        try {
            $res = DB::table('products')
                ->where('brandId', '=', $id)
                ->where('isPublished', '=', '1')
                ->get();

            if ($res->isNotEmpty()) {
                return response()->json([
                    'products' => $res
                ]);
            } else {
                return $this->error('ID not found');
            }
        } catch (Throwable $e) {
            return $this->error('ID not found');
        }
    }
}
