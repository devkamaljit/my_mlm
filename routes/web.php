<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/directs', [TeamController::class, 'directs'])->name('team.directs');
    Route::get('/generation', [TeamController::class, 'generation'])->name('team.generation');
    Route::get('/investment', [InvestmentController::class, 'topup'])->name('investment.topup');
    Route::post('/investment', [InvestmentController::class, 'store'])->name('investment.topup');
    Route::get('/investments', [InvestmentController::class, 'investments'])->name('investment.investments');
    Route::get('/transactions', [TransactionController::class, 'all'])->name('transactions.all');
   
    Route::get('/withdraw', [WithdrawalController::class, 'withdraw'])->name('withdrawal.withdraw');
    Route::post('/withdraw', [WithdrawalController::class, 'store'])->name('withdrawal.withdraw');
});

require __DIR__.'/auth.php';
