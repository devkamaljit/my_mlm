<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class TransactionController extends Controller
{
    public function all(Request $request)
    {   

        $userId=$request->user()->id;
        $dir = User::find($userId);
        return view('pages.transactions', [
            'user' => $request->user(),
        ])->with('transactions',$dir->transactions);
    }
}
