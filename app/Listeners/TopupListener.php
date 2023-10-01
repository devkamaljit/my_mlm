<?php

namespace App\Listeners;

use App\Events\Topup;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Wallet;
use App\Models\User;
use App\Models\Team;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;


class TopupListener
{
    /**
     * Create the event listener.
     */
    public $transaction;

    public function __construct($transaction)
    {
        // Wallet::increment('main_wallet', 5,['name' => 'John']);
         //$sdf=json_encode($transaction);

        //dd($sdf);

        //DB::insert('insert into testing (remark) values (?)', [$transaction->amount]);

        //dd($request);
        $this->handle($transaction);
        //$this->db = DB::table('testing');
    }

    /**
     * Handle the event.
     */
    public function handle(Transaction $transaction): void
    {
        
        
       // Wallet::increment('main_wallet', 5);
        //$newid=$transaction->user_id;
        for($i=0;$i<10;$i++){
            //$sponsor =  Team::where('sponsor',$newid);
            //if ($sponsor){
              //  $newid=$sponsor->user_id;
             // $db->insert('insert into testing (remark) values (?)', [1]);
            //}
        }


    }
}
