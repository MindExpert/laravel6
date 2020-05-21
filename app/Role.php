<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    //A Roles -> has certain Abilities [$moderator->abilities] 
   public function abilities()
   {
        return $this->belongsToMany(Ability::class)->withTimestamps();
   }

   //and can allow a new ability
   public function allowTo($ability)
   {
        if(is_string($ability)){
            $ability = Ability::whereName($role)->firstOrFail();
        }
       $this->abilities()->sync($ability, false);
   }
}