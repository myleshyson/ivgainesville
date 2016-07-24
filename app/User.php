<?php

namespace App;

use App\Article;
use App\Role;
use App\SmallGroup;
use App\UserPhoto;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }

    public function assignRole($role)
    {
        return $this->roles()->save(Role::whereName($role)->firstOrFail());
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function photo()
    {
        return $this->hasOne(UserPhoto::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function delete()
    {   
       $photo = $this->photo;

       File::delete($photo->path);

       parent::delete();
    }   
        


    
}
