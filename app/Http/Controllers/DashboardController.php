<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {   

        $userId=$request->user()->id;
        $dir = User::find($userId);
        $setting=DB::table('plan_settings')->pluck('value','type');
        return view('dashboard', [
            'user' => $dir,
            'settings' => $setting,
        ]);
    }
}
