<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function __invoke()
    {
        $categories = Category::select('id', 'name')->get();

        return response()->json([
            'data' => $categories
        ], Response::HTTP_OK);
    }
}
