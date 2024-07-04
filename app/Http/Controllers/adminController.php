<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
    public function adminLogin()
    {
        return view('admin.login');
    }
    public function adminCategories()
    {
        $categoryModel= categoryModel::get();
        return view('admin.categories',compact('categoryModel'));
    }
    public function adminCategoriesForm()
    {
        return view('admin.categoriesForm');
    }
    public function adminCategoriesFormSubmit(Request $request)
    {
        $categoryModel = new categoryModel();
        $categoryModel->name = $request->name;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = rand(0, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $categoryModel->image = $filename;
        }
        $categoryModel->description = $request->description;
        $categoryModel->save();
        return redirect()->route('admin_categories');
    }
}
