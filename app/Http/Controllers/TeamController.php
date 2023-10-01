<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use App\Models\Autopool;
use App\Models\PlanSetting;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{   
    
    public function directs(Request $request)
    {
        
        $userId=$request->user()->id;
        $query=User::find($userId)->directs();


        if($request->has('search') && !empty($request->input('search'))){
            $query->whereHas(relation : 'user', callback : function($q) use ($request){
                 $q->where('name','like','%'.$request->search.'%');
            });
        }

        
        
        $a=$query->paginate(1)->withQueryString();
       // dd($a);
         
        
        return view('pages.directs', [
            'user' => $request->user(),

        ])->with('directs',$a);
        
    }

    

    public function generation(Request $request){
        $userId=$request->user()->id;
        $gen = Team::find($userId)->gen;
        $query=User::whereIn('id',$gen);
        //dd($query);

        if($request->has('search') && !empty($request->input('search'))){
            //$query->whereHas(relation : 'user', callback : function($q) use ($request){
                 $query->where('name','like','%'.$request->search.'%');
            //});
        }

        
        
        $a=$query->paginate(1)->withQueryString();
       // dd($a);
         
        
        return view('pages.generation', [
            'user' => $request->user(),

        ])->with('team',$a);
    }

}
