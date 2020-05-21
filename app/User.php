<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routeNotificationForNexmo($notification)
    {
        return '355672554090';
    } 

    // if you have a $user and you wanna grab all the roles associated with them. [$user->roles]
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    // if you can assign a role to a $user. $user->roles()->save($roles)
    public function assignRole($role)
    {
        //sync will replace all the collection in the pivot table with [$role] collection
        //(by default will drop any thet is not included in the collection) thus set it to false, not to drop anything
        if(is_string($role)){
            $role = Role::whereName($role)->firstOrFail();
        }
        $this->roles()->sync($role, false); 
    }
    
    //if we wanna find all abilities of a user, we need to call it as a method (not an eloquent relationship)
    public function abilities()
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }
}
