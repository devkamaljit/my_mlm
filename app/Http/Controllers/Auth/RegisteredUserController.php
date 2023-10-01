<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Team;
use App\Models\Wallet;
use App\Models\Income;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'sponsor' => ['required', 'string', 'max:255' , 'exists:users,username'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'min:10','max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([

            'name' => $request->name,
            'username' => $request->username,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $teamId = $user->id;

        
 
        $team = Team::create([
            'user_id' => $teamId,
             'sponsor' => $user->byUsername($request->sponsor)->id,
            //'sponsor' => $user->directs(),
        ]);
        $wallet = Wallet::create([
            'user_id' => $teamId,
              
            //'sponsor' => $user->directs(),
        ]);
        $wallet = Income::create([
            'user_id' => $teamId,
              
            //'sponsor' => $user->directs(),
        ]);
        $this->addgen($teamId);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }


    public function addgen($userid){
        $query = "
        WITH RECURSIVE ParentHierarchy AS (
            SELECT user_id, sponsor
            FROM teams
            WHERE user_id = $userid -- Replace with the ID of the parent you want to find parents for
            UNION ALL
            SELECT p.user_id, p.sponsor
            FROM teams p
            INNER JOIN ParentHierarchy ph ON p.user_id = ph.sponsor
        )
        
            SELECT *
        FROM ParentHierarchy
        
        ";
        $ss=DB::select($query);
            //$sponsor=
         $ssa = json_decode(json_encode($ss),true);
         $sllSponsor=array_column($ssa,'sponsor' );
        //print_r($sllSponsor);
            $vls=implode(',',$sllSponsor);
         $query2= "
         UPDATE teams SET `gen` = JSON_ARRAY_APPEND(`gen`, '$', '$userid') WHERE id IN ($vls);
         ";
         DB::unprepared($query2);

         
        //$ssz=DB::table('teams')->whereIn('user_id',$sllSponsor)->update(['gen'=>function($query){$query->push('1');}]);
       
    }
}
