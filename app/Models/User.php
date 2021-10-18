<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = [];

    public function accountBook()
    {
        return $this->hasMany(AccountBook::class);
    }

    public function getFullIncomes(){
        $income = 0;
        foreach ($this->accountBook as $account)
        {
            $income += $account->income;
        }
        return $income;
    }

    public function getFullExpenses(){
        $expens = 0;
        foreach ($this->accountBook as $account)
        {
            $expens += $account->expenses;
        }
        return $expens;
    }

    public function getFullSum()
    {
        $sum = 0;
        foreach ($this->accountBook as $account)
        {
            $sum += $account->sum;
        }
        return $sum;
    }
}
