<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TriggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        DB::unprepared("CREATE TRIGGER `fundCredit` AFTER INSERT ON `transactions` FOR EACH ROW UPDATE `wallets` SET fund_wallet = fund_wallet+new.amount WHERE new.type='credit' and new.wallet='fund_wallet' and user_id=new.user_id");
        DB::unprepared("CREATE TRIGGER `fundDebit` AFTER INSERT ON `transactions` FOR EACH ROW UPDATE `wallets` SET fund_wallet = fund_wallet-new.amount WHERE new.type='debit' and new.wallet='fund_wallet' and user_id=new.user_id");
        DB::unprepared("CREATE TRIGGER `mainCredit` AFTER INSERT ON `transactions` FOR EACH ROW UPDATE `wallets` SET main_wallet = main_wallet+new.amount WHERE new.type='credit' and new.wallet='main_wallet' and user_id=new.user_id");
        DB::unprepared("CREATE TRIGGER `mainDebit` AFTER INSERT ON `transactions` FOR EACH ROW UPDATE `wallets` SET main_wallet = main_wallet-new.amount WHERE new.type='debit' and new.wallet='main_wallet' and user_id=new.user_id");
        
        DB::unprepared("CREATE TRIGGER `updateFund0to1credit` AFTER UPDATE ON `transactions` FOR EACH ROW UPDATE wallets SET fund_wallet = fund_wallet+new.amount WHERE new.status='1' AND old.status='0' AND new.type='credit' AND new.wallet='fund_wallet' and user_id=new.user_id");
        DB::unprepared("CREATE TRIGGER `updateFund1to0credit` AFTER UPDATE ON `transactions` FOR EACH ROW UPDATE wallets SET fund_wallet = fund_wallet-new.amount WHERE new.status='0' AND old.status='1' AND new.type='credit' AND new.wallet='fund_wallet' and user_id=new.user_id");
        DB::unprepared("CREATE TRIGGER `updateFund0to1debit` AFTER UPDATE ON `transactions` FOR EACH ROW UPDATE wallets SET fund_wallet = fund_wallet-new.amount WHERE new.status='1' AND old.status='0' AND new.type='debit' AND new.wallet='fund_wallet' and user_id=new.user_id");
        DB::unprepared("CREATE TRIGGER `updateFund1to0debit` AFTER UPDATE ON `transactions` FOR EACH ROW UPDATE wallets SET fund_wallet = fund_wallet+new.amount WHERE new.status='0' AND old.status='1' AND new.type='debit' AND new.wallet='fund_wallet' and user_id=new.user_id");
        
        DB::unprepared("CREATE TRIGGER `updateMain0to1credit` AFTER UPDATE ON `transactions` FOR EACH ROW UPDATE wallets SET main_wallet = main_wallet+new.amount WHERE new.status='1' AND old.status='0' AND new.type='credit' AND new.wallet='main_wallet' and user_id=new.user_id");
        DB::unprepared("CREATE TRIGGER `updateMain1to0credit` AFTER UPDATE ON `transactions` FOR EACH ROW UPDATE wallets SET main_wallet = main_wallet-new.amount WHERE new.status='0' AND old.status='1' AND new.type='credit' AND new.wallet='main_wallet' and user_id=new.user_id");
        DB::unprepared("CREATE TRIGGER `updateMain0to1debit` AFTER UPDATE ON `transactions` FOR EACH ROW UPDATE wallets SET main_wallet = main_wallet-new.amount WHERE new.status='1' AND old.status='0' AND new.type='debit' AND new.wallet='main_wallet' and user_id=new.user_id");
        DB::unprepared("CREATE TRIGGER `updateMain1to0debit` AFTER UPDATE ON `transactions` FOR EACH ROW UPDATE wallets SET main_wallet = main_wallet+new.amount WHERE new.status='0' AND old.status='1' AND new.type='debit' AND new.wallet='main_wallet' and user_id=new.user_id");

        DB::unprepared("CREATE TRIGGER `fundDebitWithdrawal` AFTER INSERT ON `withdrawals` FOR EACH ROW UPDATE `wallets` SET main_wallet = main_wallet-new.amount WHERE user_id=new.user_id");
        DB::unprepared("CREATE TRIGGER `updateFund0to1Withdrawal` AFTER UPDATE ON `withdrawals` FOR EACH ROW UPDATE wallets SET main_wallet = main_wallet+new.amount WHERE new.status='2' AND old.status!='2' AND user_id=new.user_id");
        DB::unprepared("CREATE TRIGGER `updateFund1to0Withdrawal` AFTER UPDATE ON `withdrawals` FOR EACH ROW UPDATE wallets SET main_wallet = main_wallet-new.amount WHERE new.status!='2' AND old.status='2' AND user_id=new.user_id");
        
    }
}
