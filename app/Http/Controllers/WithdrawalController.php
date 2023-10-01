<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Investment;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Illuminate\Http\RedirectResponse;
use App\Rules\Checkbalance;
use Illuminate\Support\Facades\DB;
use App\Listeners\TopupListener;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function withdraw(Request $request)
    {   
        $userId=$request->user()->id;
        $dir = User::find($userId);
        return view('pages.withdrawal', [
            'user' => $dir,
        ]);
    }
    public function store(Request $request): RedirectResponse
    {
        $wallet_type='main_wallet';
        $request->validate([
            
            'amount' => ['required', 'integer', 'min:1' ,new Checkbalance],            
        ]);

        $usera = User::where('username',$request->username)->first();
        
        DB::beginTransaction();
        try {
            //code...
             
            $transaction = Withdrawal::create([
                'user_id' => Auth::user()->id,
                
                'amount' => $request->package,
                
                'status'  => 0,
               
            
            ]);

             
            DB::commit();
            $request->session()->flash('status', 'Withdrawal Request successful!');

        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            $request->session()->flash('error', 'Something wrong!');

        }
        

        

        //Auth::login($user);

        return redirect('./withdraw');
    }
}
