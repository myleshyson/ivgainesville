<?php

namespace App;

use App\Permission;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = ['name'];


/**
     * Give Permssion to Role
     * @param  Permission $permission [description]
     * @return [type]                 [description]
     */
    public function givePermissionTo(Permission $permission)
    {
    	$this->permissions()->save($permission);
    }
    
	/**
	 * Belongs To Many Permission Object
	 * @return Collection
	 */
	public function permissions()
    {
    	return $this->belongsToMany(Permission::class);
    }
	/**
	 * Belongs To Many User Object
	 * @return Collection
	 */

    public function users()
    {
    	return $this->belongsToMany(User::class, 'role_user');
    }

}
