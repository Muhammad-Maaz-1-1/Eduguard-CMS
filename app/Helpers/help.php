<?php

use App\Models\ProfileModel;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getProfileModel')) {
    function getProfileModel() {
        if (Auth::check()) {
            return ProfileModel::where('user_id', Auth::user()->id)->first();
        }
        return null;
    }
}
