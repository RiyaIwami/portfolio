<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AddController extends Controller
{

    // フォーム表示アクション
    public function showAddForm()
    {
        $categories = Category::orderBy('sort_no')->get();
        return view('add', ['categories' => $categories]);
    }
}
