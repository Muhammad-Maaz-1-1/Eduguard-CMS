<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function index(){
        return view('admin.index');
    }
    public function adminLogin(){
        return view('admin.login');
    }
    public function adminCategories(){
        return view('admin.categories');
    }
    public function adminCategoriesForm(){
        return view('admin.categoriesForm');
    }
}
