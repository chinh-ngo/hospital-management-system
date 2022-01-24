<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['drugs'] = Drug::all();
        $data['categories'] = Category::all();
        return view('layouts.drug.index', $data);
    }

    public function add(Request $request)
    {
        $drug = new Drug;
        $drug->name = $request->name;
        $drug->category_id = $request->category_id;
        $drug->amount = $request->amount;
        $drug->save();
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Drug::findOrFail($request->id)->delete();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $drug = Drug::findOrFail($request->id);
        $drug->category_id = $request->update_category_id;
        $drug->name = $request->update_name;
        $drug->amount = $request->update_amount;
        $drug->save();

        return redirect()->back();
    }

    public function category()
    {
        $data['categories'] = Category::all();
        return view('layouts.drug.category', $data);
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category = $request->category;
        $category->save();
        return redirect()->back();
    }
    public function delete_category(Request $request)
    {
        Category::findOrFail($request->id)->delete();
        return redirect()->back();
    }
    public function update_category(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->category = $request->update_category;
        $category->save();
        return redirect()->back();
    }
}
