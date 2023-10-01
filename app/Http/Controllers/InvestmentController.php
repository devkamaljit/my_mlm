<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Investment;
use App\Models\Transaction;
use App\Models\PlanSetting;
use App\Models\Autopool;
use App\Models\Wallet;
use Illuminate\Http\RedirectResponse;
use App\Rules\Checkbalance;
use Illuminate\Support\Facades\DB;
use App\Listeners\TopupListener;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    
    public function topup(Request $request)
    {   
        $userId=$request->user()->id;
        $dir = User::find($userId);
        return view('pages.investment', [
            'user' => $dir,
        ]);
    }
    public function investments(Request $request)
    {   

        $userId=$request->user()->id;
        $query = User::find($userId)->investments();

        if($request->has('search') && !empty($request->input('search'))){
            
                 $query->where('amount','like','%'.$request->search.'%');
            
        }

        
        
        $a=$query->paginate(1)->withQueryString();

        return view('pages.investments', [
            'user' => $request->user(),
        ])->with('investments',$a);
    }

    public function store(Request $request): RedirectResponse
    {
        $wallet_type='fund_wallet';
        $request->validate([
            'username' => ['required', 'string', 'max:255' , 'exists:users,username'],
            'package' => ['required', 'integer', 'min:1' ,new Checkbalance],            
        ]);

        $usera = User::where('username',$request->username)->first();
        
        //DB::beginTransaction();
        //try {
            //code...
            $invest = Investment::create([

                'user_id' => $usera->id,
                'amount' => $request->package,
                'status'  => 1
            ]);

            $transaction = Transaction::create([
                'user_id' => Auth::user()->id,
                'tx_user' => $usera->id,
                'amount' => $request->package,
                'type' => 'debit',
                'tx_type' => 'topup',
                'status'  => 1,
                'wallet'  => $wallet_type,
                'tx_id'  => $invest->id,
            
            ]);

            
            // event(new TopupListener($transaction));
            $income_aray=json_decode(PlanSetting::getSetting('incomes',[]));
            if(in_array('level',$income_aray)){
                $this->DirectIncome($transaction);
            } 

            if(in_array('autopool',$income_aray)){
                $check_exists = Autopool::isExists($usera->id,'default','1');
            
                if($check_exists->count()==0){
                    $parent=$this->getParent(1,'default','1');
                    Autopool::create([
                        'user_id'=>$usera->id,
                        'parent_id' =>  $parent,
                        'pool' =>  'default',
                        'pool_num' =>  1,
                    ]);
                }
            }
            
            //DB::commit();
            $request->session()->flash('status', 'Investment successful!');

        // } catch (\Exception $e) {
        //     //throw $th;
        //     DB::rollBack();
        //     $request->session()->flash('error', 'Something wrong!');

        // }
        

        

        //Auth::login($user);

        return redirect('./investment');
    }

    public function getParent($prnt,$type='default',$sub='1'){
       
        $found='no';
        $nodes = PlanSetting::getSetting('autopoolNode',2);
        //$i=0;
        $prnts=[$prnt];
        $parentid=$prnt;
        $last_level=Autopool::isExists($prnt,$type,$sub);
        for($i=1;$i<=100;$i++){

            $kk=Autopool::getChild($prnts,$type,$sub);
            if($kk->count()>=$nodes**$i){
                
                $last_level=$kk;
                $chils = json_decode($kk);
                $prnts = array_column($chils,'id');
                
            }else{                
                foreach($last_level as $newpr){
                    if($found=='no'){
                        if($newpr->children->count()<$nodes){
                            $found='yes'; 
                            $parentid = $newpr->id;
                        
                        }
                    }                    
                } 
                if($found=='yes'){
                    break;                                  
                }
            }
        }
        
        return $parentid;
        
    }

    public function DirectIncome($data) {
        $sponser= DB::table('teams')->where('user_id', '=',  $data->user_id)->value('sponsor');
        // $isMember = ;
        $level_commsion=DB::table('level_commision')->get();
        if (!empty($sponser)) {
            
           for ($i=0; $i < count($level_commsion); $i++) { 
               if($sponser){
                    $direct_requirede = $level_commsion[$i]->direct_required;
                    $comm = $level_commsion[$i]->type=='per' ? $data->amount*$level_commsion[$i]->commision/100:$level_commsion[$i]->commision;
                    $mydirs=0;
                    if($direct_requirede>0){
                        $mydirs = User::find($sponser)->directs->count();
                    }
                     if($mydirs>=$direct_requirede && $comm>0){
                        Transaction::create([
                            'user_id' => $sponser,
                            'tx_id' => $data->id,
                            'type' => 'credit',
                            'tx_type' => 'income',
                            'wallet' => 'main_wallet',
                            'income' => $level_commsion[$i]->source,
                            'status' => 1,
                            
                        'amount' => $comm,
                        ]);
                     }
                    
                    
                    $sponser= DB::table('teams')
                      ->where('user_id', '=',  $sponser)
                      ->value('sponsor'); 
                     
                }
            }      
    
            }
             
    
         }
         
    
    
}
