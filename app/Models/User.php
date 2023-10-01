<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Team;
use App\Models\Wallet;
use App\Models\Transaction;
use App\Models\Investment;
use App\Models\Income;
use App\Models\Withdrawal;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'mobile',
        'email',
        'password',
    ];
    

     
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function byUsername($user_input)
    {
        return $this->where('username', $user_input)->first();
    }

    /**
     * Get all of the teams for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
    public function team(): HasOne
    {   
        
        return $this->hasOne(Team::class,'user_id');
    }
    public function directs(): HasMany
    {
        return $this->hasMany(Team::class, 'sponsor');
    }
     
    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
     
    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class, 'user_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }
    public function autopools(): HasMany
    {
        return $this->hasMany(Autopool::class, 'user_id');
    }
    
    public function investments(): HasMany
    {
        return $this->hasMany(Investment::class, 'user_id');
    }
    public function withdrawals(): HasMany
    {
        return $this->hasMany(Withdrawal::class, 'user_id');
    }
    
    public function income(): HasOne
    {
        return $this->hasOne(Income::class, 'user_id');
    }
    
}
