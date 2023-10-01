<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use App\Models\Setting;
use App\Models\PlanSetting;

class PlanSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $incms=['direct','level','roi','autopool']; // user roi_level for roi level income
        PlanSetting::create([
            'title' => 'Incomes',
            'type' => 'incomes',
            'value' => json_encode($incms),
            
        ]);

        if(in_array('level',$incms)){

            $lvl=array();
            $lvl=[
                array('commision'=>'10','type'=>'per','source'=>'direct','direct_required'=>'0'),
                array('commision'=>'2','type'=>'per','source'=>'level','direct_required'=>'0'),
            ];

            Schema::create('level_commision', function (Blueprint $table) {
                $table->id();
                $table->string('commision')->nullable();
                $table->string('type')->nullable();
                $table->string('source')->nullable();                
                $table->string('direct_required')->nullable();                
            });
            foreach ($lvl as $lvldata) {
                DB::table('level_commision')->insert($lvldata);

            }

        }
        
        if(in_array('autopool',$incms)){
            PlanSetting::create([
                'title' => 'AutoPool',
                 'type' => 'autopoolNode',
                 'value' => 2,                
            ]);
            
            DB::table('autopools')->insert([
               'user_id' => 1,
               'parent_id' => 0,
               'pool' => 'default',
               'pool_num' => 1
            ]);
           // Artisan::call('make:model autopool -m');

        }

        Schema::table('incomes', function (Blueprint $table) use ($incms) {
            for ($i=0; $i < COUNT($incms); $i++) { 
                # code...
                $table->double($incms[$i], 15, 8)->nullable()->default(0);
                $incomenm=$incms[$i];

                DB::unprepared("CREATE TRIGGER add_$incomenm AFTER INSERT ON `transactions` FOR EACH ROW UPDATE `incomes` SET $incomenm = $incomenm+new.amount WHERE new.type='credit' and new.income='$incomenm' and user_id=new.user_id");
                
                DB::unprepared("CREATE TRIGGER update0to1credit_$incomenm AFTER UPDATE ON `transactions` FOR EACH ROW UPDATE incomes SET $incomenm = $incomenm+new.amount WHERE new.status='1' AND old.status='0' AND new.type='credit' AND new.income='$incomenm'");
                DB::unprepared("CREATE TRIGGER updateMain1to0credit_$incomenm AFTER UPDATE ON `transactions` FOR EACH ROW UPDATE incomes SET $incomenm = $incomenm-new.amount WHERE new.status='0' AND old.status='1' AND new.type='credit' AND new.income='$incomenm'");
                
            }
            
        });

    }
}
