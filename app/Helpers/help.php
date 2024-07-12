<?php

use App\Models\cartModel;
use App\Models\ProfileModel;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Else_;

if (!function_exists('getProfileModel')) {
    function getProfileModel()
    {
        if (Auth::check()) {
            return ProfileModel::where('user_id', Auth::user()->id)->first();
        }
        return null;
    }
}

if (!function_exists('getCartModel')) {
    function getCartModel()
    {
        if (Auth::check()) {
            return cartModel::where('user_id', Auth::user()->id)->get();
        }
        return collect(); // Return an empty collection if user is not authenticated
    }
}
