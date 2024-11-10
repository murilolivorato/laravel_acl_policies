<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

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

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

   /* public function role()
    {
        return $this->belongsTo(Role::class);
    }*/

    public function Roles(){
        return $this->belongsToMany(Role::class , 'user_roles' , 'user_id' , 'role_id' );
    }


    public function hasRole($role){
        if(is_string($role)){
            return $this->Roles->contains('name', $role);
        }
    }

    public function getisSuperAdminAttribute(){
        return $this->hasRole('super-admin');
    }

    public function getisManagerAttribute(){
        return $this->hasRole('manager');
    }
}
