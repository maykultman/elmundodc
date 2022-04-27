<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Rol::class)->withPivot('branch_id');
    }
    public function branch(){
        if(isset($this->roles[0])){
            $branch_id = $this->roles[0]->pivot->branch_id;
            $branch = Branch::find($branch_id);
            return $branch->name;
        }
    }
    // public function setPasswordAttributes($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }
}
