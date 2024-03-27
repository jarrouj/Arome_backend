<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAbout()
    {

        $about = About::find(1);

        return response()->json($about);

    }

    public function getCategory()
    {

        $category = Category::all();

        return response()->json($category);
    }
}
